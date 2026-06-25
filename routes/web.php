<?php

use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/report', [ReportController::class, 'index'])
    ->name('report.generate');

Route::get('/report/usavi-gatha', [ReportController::class, 'usaviGatha'])
    ->name('report.usavi-gatha');
Route::get('/test-font', function () {
    return public_path('fonts/IskoolaPota-Regular.ttf');
});

require __DIR__.'/auth.php';