<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/reports/public/detail', [FrontendController::class, 'getPublicReportDetail'])->name('get-public-report-detail');
Route::get('/reports/{slug}/public', [FrontendController::class, 'showPublicReportDetail'])->name('show-public-report-detail');
Route::view('/about-us', 'components.pages.frontend.about-us')->name('about-us');
Route::get('/reports/public', [FrontendController::class, 'publicReport'])->name('public-report');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware([
    'auth',
    'verified'
])->group(function () {

    // Reporter
    Route::middleware([
        'role:Reporter'
    ])->name('reporter.')->group(function () {
        Route::resource('reports', ReportController::class)->only(
            'index',
            'create',
            'store'
        );
        Route::get('reports/{slug}', [ReportController::class, 'show'])->name('reports.show');
        Route::get('reports/{reportId}/witness/{witnessId}', [ReportController::class, 'showWitnessDetail'])->name('reports.show-witnees-detail');
    });

    // Departement
    Route::middleware([
        'role:Departement'
    ])->name('departement.')->prefix('departement')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

    Route::middleware([
        'role:Adminisrator'
    ])->name('adminisrator.')->prefix('adminisrator')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/reports', [ReportController::class, 'getAdminReportsList'])->name('reports.getAdminReportsList');
        Route::get('/reports/{slug}', [ReportController::class, 'getDetailedReport'])->name('reports.getDetailedReport');
        Route::get('reports/{reportId}/evidence/{evidenceId}', [ReportController::class, 'getDetailedEvidence'])->name('reports.getDetailedEvidence');
        Route::get('reports/{reportId}/witness/{witnessId}', [ReportController::class, 'getDetailedWitness'])->name('reports.getDetailedWitness');
        Route::get('reports/{slug}/edit', [ReportController::class, 'edit'])->name('reports.edit');
        Route::get('reports/{slug}/disposisi', [ReportController::class, 'createDisposisi'])->name('reports.disposisi.create');
        Route::post('reports/{reportId}/disposisi', [ReportController::class, 'storeDisposisi'])->name('reports.disposisi.store');
        Route::put('reports/{reportId}/disposisi', [ReportController::class, 'updateDisposisi'])->name('reports.disposisi.update');
        Route::resource('reports', ReportController::class)->only(
            'destroy',
            'update'
        );
    });
});

require __DIR__ . '/auth.php';
