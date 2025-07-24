<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect()->route('beasiswa');
});

route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
route::post('/login', [AuthController::class, 'login'])->name('login');

route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
route::post('/register', [AuthController::class, 'register'])->name('register');

route::get('/tes_up', [BeasiswaController::class, 'tes'])->name('tes');
route::post('/tes_up', [BeasiswaController::class, 'tes_store'])->name('apply.store');

route::get('/beasiswa', [BeasiswaController::class, 'beasiswa'])->name('beasiswa');
route::get('/beasiswa/{id}', [BeasiswaController::class, 'beasiswa_detail'])->name('beasiswa.detail');

route::get('/beasiswa-all', [BeasiswaController::class, 'beasiswaAll'])->name('beasiswa.all');


route::get('/beasiswa-create', [BeasiswaController::class, 'beasiswa_create'])->name('beasiswa.create');
route::post('/beasiswa-store', [BeasiswaController::class, 'beasiswa_store'])->name('beasiswa.store');
Route::get('/beasiswa/{id}/edit', [BeasiswaController::class, 'edit'])->name('beasiswa.edit');
Route::put('/beasiswa/{id}', [BeasiswaController::class, 'update'])->name('beasiswa.update');

route::get('/applicant', [BeasiswaController::class, 'applicant'])->name('applicant');
route::get('/applicant-detail/{id}', [BeasiswaController::class, 'applicant_detail'])->name('applicant.detail');

route::get('/beasiswa-table', [BeasiswaController::class, 'beasiswa_table'])->name('beasiswa.table');
route::get('beasiswa-delete/{id}', [BeasiswaController::class, 'beasiswa_delete'])->name('beasiswa.delete');

route::get('/apply-create/{id}', [BeasiswaController::class, 'apply_create'])->name('apply.create');
route::post('/apply-store', [BeasiswaController::class, 'apply_store'])->name('apply.store');

route::get('/apply-delete/{id}', [BeasiswaController::class, 'apply_delete'])->name('apply.delete');

route::get('/logout', [AuthController::class, 'logout'])->name('logout');