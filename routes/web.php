<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;

Route::get('/', [ArtikelController::class, 'index']);
Route::get('/artikel/create', [artikelController::class, 'create'])->name('artikel.create');
Route::post('/artikel', [artikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel', [artikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [artikelController::class, 'show'])->name('artikel.show');
Route::view('/layanan', 'layanan')->name('layanan');

