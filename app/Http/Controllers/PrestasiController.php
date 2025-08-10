<?php

namespace App\Http\Controllers;

use App\Models\artikel;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = artikel::whereHas('kategori', function ($query) {
            $query->where('name', 'Prestasi');
        })->latest()->paginate(5);

        return view('prestasi.index', compact('prestasi'));
    }
}