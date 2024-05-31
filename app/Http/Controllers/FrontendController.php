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
            ->where('reports.is_private', 0)
            ->latest()->take(3)->get();

        return view('components.pages.frontend.home', compact('reports'));
    }

    public function publicReport()
    {
        $reports = Report::select('reports.title', 'reports.description', 'reports.slug', 'reports.created_at', 'reports.status', 'users.name as user_name', 'categories.name as category_name')
            ->join('users', 'reports.user_id', '=', 'users.id')
            ->join('categories', 'reports.category_id', '=', 'categories.id')
            ->where('reports.is_private', 0)
            ->latest()->paginate(6);

        return view('components.pages.frontend.public-reports', compact('reports'));
    }

    public function getPublicReportDetail(Request $request)
    {
        if ($request->has('keyword')) {
            $report = Report::where('unic_code', $request->keyword)->first();
        }

        if ($report) {
            return redirect()->route('show-public-report-detail', $report->slug);
        }

        Alert::toast('Tidak ada laporan yang sesuai!', 'error');
        return redirect()->route('index');
    }

    public function showPublicReportDetail(string $slug)
    {
        $report = Report::with(['user', 'category', 'evidences', 'division'])->where('slug', $slug)->firstOrFail();

        return view('components.pages.frontend.detail-public', compact('report'));
    }
}
