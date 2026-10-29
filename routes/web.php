<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\loansController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('request.index'));

// ===== Login / Logout =====
// name('login') WAJIB ada, karena middleware auth melempar tamu ke route bernama 'login'.
// guest = yang sudah login tidak perlu melihat halaman login lagi
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ===== Rute yang mengubah data: WAJIB login (middleware auth) =====
Route::middleware('auth')->group(function () {
    // Semua aksi request & kategori KECUALI index dan show (create, store, edit, update, destroy)
    Route::resource('buku', EquipmentController::class)->except(['index', 'show']);
    Route::resource('kategori', KategoriController::class)->except(['index', 'show']);

    // Sirkulasi proses
    Route::get('/equipment/{id}/pinjam', [EquipmentController::class, 'create'])->name('action.form');
    Route::post('/action/{id}/pinjam', [EquipmentController::class, 'store'])->name('loans.pinjam');
    Route::get('/category', [EquipmentController::class, 'index'])->name('loans.index');
    Route::patch('/equipment/{id}/kembali', [EquipmentController::class, 'index'])->name('loans');
});

// ===== Rute baca-saja (katalog): boleh dilihat tanpa login =====
// Harus DITARUH SETELAH grup di atas, supayacreate tidak ditangkap sebagai anomali
Route::resource('loans', equipmentController::class)->only(['index', 'show']);
Route::resource('category', categoryController::class)->only(['index', 'show']);