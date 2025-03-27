<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk dashboard setelah login
Route::get('/dashboard/tendik', function () {
    return 'Selamat datang, Tendik!';
})->name('tendik.dashboard')->middleware('auth');

Route::get('/dashboard/siswa', function () {
    return 'Selamat datang, Siswa!';
})->name('siswa.dashboard')->middleware('auth');
