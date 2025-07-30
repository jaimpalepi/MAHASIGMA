<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;
use App\Models\artikel;
use App\Models\Dispen;

// Beranda
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Beranda', route('artikel.index'));
});

// Beranda > Prestasi
Breadcrumbs::for('prestasi.index', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Prestasi', route('prestasi.index'));
});

// Beranda > Layanan
Breadcrumbs::for('layanan', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Layanan', route('layanan'));
});

// Beranda > Visi & Misi
Breadcrumbs::for('tentang.visimisi', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Visi & Misi', route('tentang.visimisi'));
});

// Beranda > Struktur Organisasi
Breadcrumbs::for('tentang.struktur', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Struktur Organisasi', route('tentang.struktur'));
});

// Beranda > Hasil Pencarian
Breadcrumbs::for('artikel.search', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Hasil Pencarian', route('artikel.search'));
});

// Beranda > [Judul Artikel]
Breadcrumbs::for('artikel.show', function (BreadcrumbTrail $trail, $artikel) {
    $trail->parent('home');
    $trail->push($artikel->judul, route('artikel.show', $artikel->id));
});

// Beranda > Layanan > Dispensasi
Breadcrumbs::for('dispen.index', function (BreadcrumbTrail $trail) {
    $trail->parent('layanan');
    $trail->push('Dispensasi', route('dispen.index'));
});

// Beranda > Layanan > Dispensasi > [Detail]
Breadcrumbs::for('dispen.show', function (BreadcrumbTrail $trail, $dispen) {
    $trail->parent('dispen.index');
    $trail->push('Detail: ' . $dispen->nama_acara, route('dispen.show', $dispen->id));
});

// Beranda > Layanan > Dispensasi > Buat Pengajuan
Breadcrumbs::for('dispen.create', function (BreadcrumbTrail $trail) {
    $trail->parent('dispen.index');
    $trail->push('Buat Pengajuan', route('dispen.create'));
});