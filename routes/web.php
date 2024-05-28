<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/reports/public/detail', [FrontendController::class, 'showPublicReportDetail'])->name('show-public-report-detail');
Route::view('/about-us', 'components.pages.frontend.about-us')->name('about-us');
Route::view('/reports/public', 'components.pages.frontend.public-reports')->name('public-report');
Route::view('/detail', 'components.pages.frontend.detail')->name('detail');
Route::view('/history', 'components.pages.frontend.history')->name('history');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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
    });

    // Departement
    Route::middleware([
        'role:Departement'
    ])->name('departement.')->prefix('departement')->group(function () {
    });

    Route::middleware([
        'role:Adminisrator'
    ])->name('adminisrator.')->prefix('adminisrator')->group(function () {
    });
});

require __DIR__ . '/auth.php';
