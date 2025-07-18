<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TentangKamiController extends Controller
{
    /**
     * Menampilkan halaman Visi dan Misi.
     *
     * @return \Illuminate\View\View
     */
    public function visimisi()
    {
        return view('visimisi');
    }

    /**
     * Menampilkan halaman Struktur Organisasi.
     *
     * @return \Illuminate\View\View
     */
    public function struktur()
    {
        return view('struktur');
    }
}