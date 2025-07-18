<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\TentangKamiController; // <-- Tambahkan ini

Route::get('/', [ArtikelController::class, 'index']);
Route::get('/artikel/create', [artikelController::class, 'create'])->name('artikel.create');
Route::post('/artikel', [artikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel', [artikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [artikelController::class, 'show'])->name('artikel.show');
Route::view('/layanan', 'layanan')->name('layanan');
Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');


// Route untuk Tentang Kami
Route::get('/visi-misi', [TentangKamiController::class, 'visimisi'])->name('tentang.visimisi');
Route::get('/struktur-organisasi', [TentangKamiController::class, 'struktur'])->name('tentang.struktur');