<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $reports = Report::select('reports.title', 'reports.description', 'reports.slug', 'reports.created_at', 'reports.status', 'users.name as user_name', 'categories.name as category_name')
            ->join('users', 'reports.user_id', '=', 'users.id')
            ->join('categories', 'reports.category_id', '=', 'categories.id')
            ->latest()->take(3)->get();

        return view('components.pages.frontend.home', compact('reports'));
    }

    public function showPublicReportDetail(Request $request)
    {
        // kodeunik
        // name user, jika anonim maka tampilkan anonim  @@
        // created at @@
        // status lapran @@
        // didisposisikan, jika belum maka tetap tampilkan
        // kategori @@
        // title @@
        // deskripsi @@
        // is_anonim @@
        // seluruh evidence, kalau tidakk ada maka tampilkan pesan
        // lokasi @@
        if ($request->has('keyword')) {
            $report = Report::with(['user', 'category', 'evidences', 'reportDivisions'])->where('unic_code', $request->keyword)->first();
        }

        if ($report) {
            return view('components.pages.frontend.detail', compact('report'));
        }

        Alert::toast('Tidak ada laporan yang sesuai!', 'error');
        return redirect()->route('index');
    }
}
