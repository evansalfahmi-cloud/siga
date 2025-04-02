<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\TendikMiddleware;

// Rute login & logout
Route::get('/', function () {
return redirect()->route('login'); // Redirect ke login jika akses ke root
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute dashboard (hanya untuk pengguna yang login)
Route::middleware([AuthMiddleware::class])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute menambah data hanya bisa diakses oleh tendik
Route::post('/dashboard/tambah', [DashboardController::class, 'store'])
        ->name('dashboard.store')
        ->middleware(TendikMiddleware::class);


});

Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware([TendikMiddleware::class])->group(function () {
        Route::post('/dashboard/tambah', [DashboardController::class, 'store'])->name('dashboard.store');
        Route::delete('/dashboard/hapus/{id}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
    });
});

