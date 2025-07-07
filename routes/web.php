<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/tes_up', [BeasiswaController::class, 'tes'])->name('tes');
route::post('/tes_up', [BeasiswaController::class, 'tes_store'])->name('apply.store');

route::get('/beasiswa', [BeasiswaController::class, 'beasiswa'])->name('beasiswa');

route::get('/beasiswa_create', [BeasiswaController::class, 'beasiswa_create'])->name('beasiswa.create');
route::post('/beasiswa_store', [BeasiswaController::class, 'beasiswa_store'])->name('beasiswa.store');

route::get('/apply_create/{id}', [BeasiswaController::class, 'apply_create'])->name('apply.create');
route::get('/apply_store', [BeasiswaController::class, 'apply_store'])->name('apply.store');