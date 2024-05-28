<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'components.pages.frontend.home')->name('index');
Route::view('/about-us', 'components.pages.frontend.about-us')->name('about-us');
Route::view('/public-report', 'components.pages.frontend.public-reports')->name('public-report');
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
        Route::get('reports/{slug}', [ReportController::class, 'show'])->name('reports.show');
        Route::get('reports/{reportId}/witness/{witnessId}', [ReportController::class, 'showWitnessDetail'])->name('reports.show-witnees-detail');
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
