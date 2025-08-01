<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\kategori;

class KegiatanController extends Controller
{
    /**
     * Menampilkan halaman daftar artikel kegiatan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Mengambil ID kategori 'Kegiatan'
        $kategoriKegiatan = kategori::where('name', 'Kegiatan')->first();

        // Jika kategori tidak ditemukan, kembalikan view dengan koleksi kosong
        if (!$kategoriKegiatan) {
            $kegiatan = collect();
        } else {
            // Mengambil semua artikel dengan kategori 'Kegiatan', diurutkan dari yang terbaru
            $kegiatan = artikel::where('kategori_id', $kategoriKegiatan->id)
                ->latest()
                ->paginate(10); // Menampilkan 10 kegiatan per halaman
        }

        return view('kegiatan.index', compact('kegiatan'));
    }
}