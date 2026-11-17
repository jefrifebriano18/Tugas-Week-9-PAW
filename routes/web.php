<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Publik (guest)
Route::get('/', fn () => redirect()->route('login'));
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Wajib login (semua role)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');
    Route::get('/materi', fn () => view('halaman', ['judul' => 'Lihat Materi']))->name('materi.lihat');
});

// Khusus admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', fn () => 'Halaman Admin');
    Route::get('/pengguna', fn () => view('halaman', ['judul' => 'Manajemen Pengguna']))->name('pengguna');
});

// Khusus dosen
Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen', fn () => 'Dashboard Dosen');
});

// Khusus mahasiswa
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa', fn () => 'Dashboard Mahasiswa');
});

// Admin dan dosen: kelola materi dan nilai
Route::middleware(['auth', 'role:admin,dosen'])->group(function () {
    Route::get('/kelola-materi', fn () => 'Kelola Materi');
    Route::get('/kelola-nilai', fn () => view('halaman', ['judul' => 'Kelola Nilai']))->name('nilai.kelola');
});

// Admin dan mahasiswa: lihat nilai pribadi
Route::middleware(['auth', 'role:admin,mahasiswa'])->group(function () {
    Route::get('/nilai-saya', fn () => view('halaman', ['judul' => 'Nilai Pribadi']))->name('nilai.saya');
});