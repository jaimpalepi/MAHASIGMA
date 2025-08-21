<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\DispenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\KegiatanController;

// Route::get('/', function () {
//     return redirect()->route('beasiswa');
// });

route::get('/login1701', [AuthController::class, 'showLogin'])->name('show.login');
route::post('/login1701', [AuthController::class, 'login'])->name('login');

route::get('/register1701', [AuthController::class, 'showRegister'])->name('show.register');
route::post('/register1701', [AuthController::class, 'register'])->name('register');

// route::get('/tes_up', [BeasiswaController::class, 'tes'])->name('tes');
// route::post('/tes_up', [BeasiswaController::class, 'tes_store'])->name('apply.store');

route::get('/beasiswa', [BeasiswaController::class, 'beasiswa'])->name('beasiswa');
route::get('/beasiswa/{id}', [BeasiswaController::class, 'beasiswa_detail'])->name('beasiswa.detail');

route::get('/edit-hero', [BeasiswaController::class, 'edit_hero'])->name('hero.edit')->Middleware('checklogin');
route::post('/edit-hero', [BeasiswaController::class, 'update_hero'])->name('hero.update')->Middleware('checklogin');

route::get('/beasiswa-all', [BeasiswaController::class, 'beasiswaAll'])->name('beasiswa.all');

route::get('/beasiswa-create', [BeasiswaController::class, 'beasiswa_create'])->name('beasiswa.create')->Middleware('checklogin');
route::post('/beasiswa-store', [BeasiswaController::class, 'beasiswa_store'])->name('beasiswa.store')->Middleware('checklogin');
Route::get('/beasiswa/{id}/edit', [BeasiswaController::class, 'edit'])->name('beasiswa.edit')->Middleware('checklogin');
Route::put('/beasiswa/{id}', [BeasiswaController::class, 'update'])->name('beasiswa.update')->Middleware('checklogin');

// route::get('/applicant', [BeasiswaController::class, 'applicant'])->name('applicant');
// route::get('/applicant-detail/{id}', [BeasiswaController::class, 'applicant_detail'])->name('applicant.detail');

// route::get('my-application', [BeasiswaController::class, 'my_application'])->name('my.application');

route::get('/beasiswa-table', [BeasiswaController::class, 'beasiswa_table'])->name('beasiswa.table')->Middleware('checklogin');
route::get('beasiswa-delete/{id}', [BeasiswaController::class, 'beasiswa_delete'])->name('beasiswa.delete')->Middleware('checklogin');

// route::get('/apply-create/{id}', [BeasiswaController::class, 'apply_create'])->name('apply.create');
// route::post('/apply-store', [BeasiswaController::class, 'apply_store'])->name('apply.store');

// route::get('/apply-delete/{id}', [BeasiswaController::class, 'apply_delete'])->name('apply.delete');

route::post('/logout', [AuthController::class, 'logout'])->name('logout')->Middleware('checklogin');

Route::middleware(['auth'])->group(function () {
    Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/artikel/{artikel}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
    Route::get('/admin/settings', [AdminController::class, 'showSettings'])->name('admin.settings');
    Route::post('/admin/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');

});

Route::get('/', [ArtikelController::class, 'index']);
Route::get('/artikel', [artikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{id}', [artikelController::class, 'show'])->name('artikel.show');
Route::get('/layanan', [LayananController::class, 'layanan'])->name('layanan');
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
Route::get('/dispen/{id}', [DispenController::class, 'show'])->name('dispen.show');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return 'Halo, ' . auth()->user()->name;
    });
});

route::name('admin.')->prefix('admin')->group(function (){
    route::get('/adminControlPanel', [AdminController::class, 'index'])->name('index');
    route::get('/ACP-Layanan', [AdminController::class, 'layanan'])->name('layanan');
});

route::name('layanan.')->prefix('layanan')->middleware(['auth', 'checklogin'])->group(function (){
    route::get('/detail/{id}', [LayananController::class, 'detail'])->name('detail');

    route::get('/add', [LayananController::class, 'add'])->name('add');
    route::post('/store', [LayananController::class, 'store'])->name('store');

    route::get('/edit/{id}', [LayananController::class, 'edit'])->name('edit');
    route::post('/update', [LayananController::class, 'update'])->name('update');

    route::get('/delete/{id}', [LayananController::class, 'delete'])->name('delete');
});