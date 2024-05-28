<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Witness;
use App\Models\Category;
use App\Models\Evidence;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReportPostRequest;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $reports = Report::select('reports.title', 'reports.description', 'reports.created_at', 'reports.status', 'reports.slug', 'users.name as user_name', 'categories.name as category_name')
            ->join('users', 'reports.user_id', '=', 'users.id')
            ->join('categories', 'reports.category_id', '=', 'categories.id')->where('user_id', auth()->user()->id)
            ->latest();


        if ($request->has('keyword')) {
            $reports = $reports->where('title', 'like', '%' . $request->keyword . '%')
                ->orWhere('unic_code', $request->keyword);
        }

        $reports = $reports->paginate(6);
        return view('components.pages.frontend.history', compact('reports'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('components.pages.frontend.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportPostRequest $request)
    {
        try {
            DB::beginTransaction();

            $randomNumber = $this->generateUniqueCode();
            $report = $this->createReport($request, $randomNumber);
            $this->storeEvidences($request, $report);
            $this->storeWitnesses($request, $report);

            DB::commit();

            Alert::toast('Sukses membuat laporan!', 'success');
            return redirect()->route('reporter.reports.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal membuat laporan: ' . $e->getMessage()]);
        }
    }

    private function generateUniqueCode()
    {
        do {
            $randomNumber = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        } while (Report::where('unic_code', $randomNumber)->exists());

        return $randomNumber;
    }

    private function createReport($request, $randomNumber)
    {
        return Report::create([
            'user_id' => auth()->user()->id,
            'category_id' => (int)$request->category,
            'title' => Str::title($request->title),
            'description' => $request->description,
            'location' => $request->location,
            'status' => 'diterima',
            'time' => $request->time,
            'unic_code' => $randomNumber,
            'is_private' => $request->is_private ? $request->is_private : '0',
            'is_anonymous' => $request->is_anonymous ? $request->is_anonymous : '0',
            'slug' => Str::slug($request->title . ' ' . $randomNumber, '-')
        ]);
    }

    private function storeEvidences($request, $report)
    {
        if ($request->has('evidences')) {
            foreach ($request->evidences as $key => $__) {
                if ($request->has("evidences.$key.title") && $request->input("evidences.$key.title") !== null) {
                    if ($request->hasFile("evidences.$key.photo")) {
                        $file = $request->file("evidences.$key.photo");
                        $path = $file->storePublicly("gallery", "public");

                        Evidence::create([
                            'report_id' => $report->id,
                            'url' => $path,
                            'title' => $request->input("evidences.$key.title"),
                            'description' => $request->input("evidences.$key.description"),
                        ]);
                    }
                }
            }
        }
    }

    private function storeWitnesses($request, $report)
    {
        if ($request->has('witnesses')) {
            foreach ($request->witnesses as $key => $__) {
                if ($request->has("witnesses.$key.name") && $request->input("witnesses.$key.name") !== null) {
                    Witness::create([
                        'report_id' => $report->id,
                        'name' => $request->input("witnesses.$key.name"),
                        'phone' => $request->input("witnesses.$key.phone"),
                        'address' => $request->input("witnesses.$key.address"),
                        'description' => $request->input("witnesses.$key.description"),
                    ]);
                }
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $report = Report::with(['user', 'category', 'reportDivisions', 'evidences', 'witnesses'])->where('user_id', auth()->user()->id)->where('slug', $slug)->firstOrFail();

        return view('components.pages.frontend.detail', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function showWitnessDetail(string $reportId, string $witnessId)
    {
        $report = Report::with('witnesses')->where('id', $reportId)->where('user_id', Auth::user()->id)->firstOrFail();
        $witness = $report->witnesses->where('id', $witnessId)->firstOrFail();

        return view('components.pages.frontend.witness-detail', compact('witness'));
    }
}
