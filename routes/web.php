<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataController;

// Public routes
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/pendataan', [DashboardController::class, 'pendataan'])->name('pendataan');
    Route::get('/history', [DashboardController::class, 'history'])->name('history');
    Route::get('/statistik', [DashboardController::class, 'statistik'])->name('statistik');
    Route::get('/about', [DashboardController::class, 'about'])->name('about');
    
    // Data management routes
    Route::post('/data/balita', [DataController::class, 'storeBalita'])->name('data.balita.store');
    Route::post('/data/ibu-hamil', [DataController::class, 'storeIbuHamil'])->name('data.ibu-hamil.store');
    Route::post('/data/lansia', [DataController::class, 'storeLansia'])->name('data.lansia.store');
    
    // Export routes
    Route::get('/export/balita', [DataController::class, 'exportBalita'])->name('export.balita');
    Route::get('/export/ibu-hamil', [DataController::class, 'exportIbuHamil'])->name('export.ibu-hamil');
    Route::get('/export/lansia', [DataController::class, 'exportLansia'])->name('export.lansia');
});
