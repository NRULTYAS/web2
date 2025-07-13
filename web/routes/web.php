<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('dashboard'); // halaman landing
});

// ================= AUTH =================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ================= ADMIN =================
Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/siswa/{id}/terima', [AdminController::class, 'terima'])->name('admin.terima');
    Route::post('/admin/siswa/{id}/tolak', [AdminController::class, 'tolak'])->name('admin.tolak');
});

// ================= SISWA =================
Route::middleware('auth')->group(function () {
    Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
    Route::post('/daftar', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::post('/siswa/update', [SiswaController::class, 'update'])->name('siswa.update'); // ← gunakan POST
    Route::get('/siswa/pengumuman', [SiswaController::class, 'pengumuman'])->name('siswa.pengumuman');
});
