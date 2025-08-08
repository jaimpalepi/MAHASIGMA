<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\DispenController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KegiatanController;

Route::middleware(['auth'])->group(function () {
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/artikel/{artikel}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
    Route::get('/dispen/{id}', [DispenController::class, 'show'])->name('dispen.show');
});

Route::get('/', [ArtikelController::class, 'index']);
Route::get('/artikel', [artikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [artikelController::class, 'show'])->name('artikel.show');
Route::view('/layanan', 'layanan')->name('layanan');
Route::get('/search', function () {return view('artikel.search-results'); })->name('artikel.search');
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::get('/kegiatan/events', [KegiatanController::class, 'events'])->name('kegiatan.events');

// Route untuk Tentang Kami
Route::get('/visi-misi', [TentangKamiController::class, 'visimisi'])->name('tentang.visimisi');
Route::get('/struktur-organisasi', [TentangKamiController::class, 'struktur'])->name('tentang.struktur');

// Route dispen
Route::get('/dispen', [DispenController::class, 'index'])->name('dispen.index');
Route::get('/dispen/create', [DispenController::class, 'create'])->name('dispen.create');
Route::post('/dispen', [DispenController::class, 'store'])->name('dispen.store');

//Route Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return 'Halo, ' . auth()->user()->name;
    });
});
