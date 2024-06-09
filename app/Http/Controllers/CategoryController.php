<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\CategoryPostRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $categories = Category::all();
            return DataTables::of($categories)
                ->addColumn('action', function ($item) {
                    return '
                <div class="wrapper-action">
                    <a href="' . route('adminisrator.categories.edit', $item->id) . '">
                        Edit
                    </a>
                    <div>
                        <form action="' . route('adminisrator.categories.destroy', $item->id) . '" method="post">
                        ' . method_field('delete') . csrf_field() . '
                        <button type="submit">Hapus</button>
                        </form>
                    </div>
                </div>
            ';
                })
                ->make();
        }
        return view('components.pages.dashboard.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('components.pages.dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryPostRequest $request)
    {
        try {
            DB::beginTransaction();

            Category::create($request->validated());

            DB::commit();

            Alert::toast('Sukses menambahkan kategori!', 'success');
            return redirect()->route('adminisrator.categories.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal menambahkan kategori: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('components.pages.dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryPostRequest $request, Category $category)
    {
        try {
            DB::beginTransaction();

            $category->update($request->validated());

            DB::commit();

            Alert::toast('Sukses update kategori!', 'success');
            return redirect()->route('adminisrator.categories.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withErrors(['error' => 'Gagal update kategori: ' . $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        Alert::toast('Sukses hapus kategori!', 'success');
        return redirect()->route('adminisrator.categories.index');
    }

    public function getDataCategoryForDepatement()
    {
        if (request()->ajax()) {
            $categories = Category::all();
            return DataTables::of($categories)
                ->make();
        }
        return view('components.pages.dashboard.categories.index-departement');
    }
}
