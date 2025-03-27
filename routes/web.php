<?php

// Rute login & logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute dashboard (hanya untuk pengguna yang login)
Route::middleware([\App\Http\Middleware\AuthMiddleware::class])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Rute menambah data hanya bisa diakses oleh tendik
    Route::post('/dashboard/tambah', [DashboardController::class, 'store'])
        ->name('dashboard.store')
        ->middleware('tendik'); // Middleware untuk membatasi akses hanya ke tendik
});