<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\DivisionPostRequest;
use App\Http\Requests\DivisionUpdateRequest;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $divisions = Division::all();
            return DataTables::of($divisions)
                ->addColumn('action', function ($item) {
                    return '
                <div class="wrapper-action">
                    <a href="' . route('adminisrator.divisions.show', $item->id) . '">
                        Detail
                    </a>
                    <a href="' . route('adminisrator.divisions.edit', $item->id) . '">
                        Edit
                    </a>
                    <div>
                        <form action="' . route('adminisrator.divisions.destroy', $item->id) . '" method="post">
                        ' . method_field('delete') . csrf_field() . '
                        <button type="submit">Hapus</button>
                        </form>
                    </div>
                </div>
            ';
                })
                ->make();
        }

        return view('components.pages.dashboard.divisions.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.pages.dashboard.divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DivisionPostRequest $request)
    {
        try {
            DB::beginTransaction();

            Division::create($request->validated());

            DB::commit();

            Alert::toast('Sukses menambahkan divisi!', 'success');
            return redirect()->route('adminisrator.divisions.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal menambahkan divisi: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Division $division)
    {
        return view('components.pages.dashboard.divisions.show', compact('division'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Division $division)
    {
        return view('components.pages.dashboard.divisions.edit', compact('division'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DivisionUpdateRequest $request, Division $division)
    {
        try {
            DB::beginTransaction();

            $division->update($request->validated());

            DB::commit();

            Alert::toast('Sukses update divisi!', 'success');
            return redirect()->route('adminisrator.divisions.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal update divisi: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Division $division)
    {
        $division->delete();

        Alert::toast('Sukses hapus divisi!', 'success');
        return redirect()->route('adminisrator.divisions.index');
    }
}
