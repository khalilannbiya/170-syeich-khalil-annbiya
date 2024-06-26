<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Witness;
use App\Models\Category;
use App\Models\Division;
use App\Models\Evidence;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ReportPostRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

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
        $report = Report::with(['user', 'category', 'division', 'evidences', 'witnesses'])->where('user_id', auth()->user()->id)->where('slug', $slug)->firstOrFail();

        return view('components.pages.frontend.detail', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $statuses = [
            'diterima', 'ditolak', 'sedang diproses', 'selesai'
        ];

        $divisions = Division::all();

        $report = Report::with('division')->where('slug', $slug)->firstOrFail();
        return view('components.pages.dashboard.reports.edit', compact('statuses', 'report', 'divisions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        try {
            DB::beginTransaction();

            $report->status = $request->status;
            $report->update();

            DB::commit();

            Alert::toast('Berhasil ubah status', 'success');
            return redirect()->route(strtolower(auth()->user()->role->name) . '.reports' . (strtolower(auth()->user()->role->name) == 'adminisrator' ? '.getAdminReportsList' : '.getDepartementReportsList'));
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal ubah status: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report->delete();

        Alert::toast('Berhasil menghapus data laporan', 'success');
        if (Auth::user()->role_id == 1) {
            return redirect()->route('adminisrator.reports.getAdminReportsList');
        } else {
            return redirect()->route('departement.reports.getDepartementReportsList');
        }
    }

    public function showWitnessDetail(string $reportId, string $witnessId)
    {
        $report = Report::with('witnesses')->where('id', $reportId)->where('user_id', Auth::user()->id)->firstOrFail();
        $witness = $report->witnesses->where('id', $witnessId)->firstOrFail();

        return view('components.pages.frontend.witness-detail', compact('witness'));
    }

    public function getAdminReportsList()
    {
        if (request()->ajax()) {
            $reports = Report::with('category')->latest();
            return DataTables::of($reports)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="wrapper-action">
                        <a href="' . route('adminisrator.reports.getDetailedReport', $item->slug) . '">
                            Detail
                        </a>
                        <a href="' . route('adminisrator.reports.edit', $item->slug) . '">
                            Edit
                        </a>
                        <div>
                            <form action="' . route('adminisrator.reports.destroy', $item->id) . '" method="post">
                            ' . method_field('delete') . csrf_field() . '
                            <button type="submit">Hapus</button>
                            </form>
                        </div>
                    </div>
                ';
                })
                ->editColumn('created_at', function ($item) {
                    return $item->created_at->format('H:i, d-m-Y');
                })
                ->make();
        }

        return view('components.pages.dashboard.reports.index');
    }

    public function getDetailedReport(string $slug)
    {
        $report = Report::with(['user', 'category', 'division', 'evidences', 'witnesses'])->where('slug', $slug)->firstOrFail();
        return view('components.pages.dashboard.reports.show', compact('report'));
    }

    public function getDetailedEvidence($reportId, $evidenceId)
    {
        $evidence = Evidence::with('report')->where('id', $evidenceId)->where('report_id', $reportId)->firstOrFail();
        return view('components.pages.dashboard.reports.detail-evidence', compact('evidence'));
    }

    public function getDetailedWitness($reportId, $witnessId)
    {
        $witness = Witness::with('report')->where('id', $witnessId)->where('report_id', $reportId)->firstOrFail();
        return view('components.pages.dashboard.reports.detail-witness', compact('witness'));
    }

    public function updateDisposisi(Request $request, string $reportId)
    {
        // Validasi request
        $request->validate([
            'disposition' => 'required',
        ]);

        try {

            DB::beginTransaction();

            $report = Report::with('division')->find($reportId);
            $report->division_id = $request->disposition;

            $report->status = "sedang diproses";
            $report->update();

            DB::commit();

            Alert::toast('Sukses mengubah disposisi', 'success');
            return redirect()->route('adminisrator.reports.getAdminReportsList');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal mengubah disposisi: ' . $e->getMessage()]);
        }
    }

    public function getDepartementReportsList()
    {
        if (request()->ajax()) {
            $user = User::find(Auth::user()->id);
            $reports = Report::with('category')->where('division_id', $user->division_id)->latest();
            return DataTables::of($reports)
                ->addColumn('action', function ($item) {
                    return '
                    <div class="wrapper-action">
                        <a href="' . route('departement.reports.getDetailedReport', $item->slug) . '">
                            Detail
                        </a>
                        <a href="' . route('departement.reports.edit', $item->slug) . '">
                            Edit
                        </a>
                        <div>
                            <form action="' . route('departement.reports.destroy', $item->id) . '" method="post">
                            ' . method_field('delete') . csrf_field() . '
                            <button type="submit">Hapus</button>
                            </form>
                        </div>
                    </div>
                ';
                })
                ->editColumn('created_at', function ($item) {
                    return $item->created_at->format('H:i, d-m-Y');
                })
                ->make();
        }

        return view('components.pages.dashboard.reports.index');
    }
}
