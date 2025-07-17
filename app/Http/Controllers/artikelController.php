<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artikel;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    public function create()
    {
        return view('artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'cover' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'isi' => 'required',
        ]);

        $coverPath = $request->file('cover')->store('covers', 'public');

        artikel::create([
            'judul' => $request->judul,
            'cover' => $coverPath,
            'isi' => $request->isi,
        ]);

        return redirect()->route('artikel.create')->with('success', 'Artikel berhasil disimpan!');

    }
    public function index()
{
    $artikels = artikel::latest()->get();
    $unggulan = artikel::where('is_featured', true)->latest()->take(5)->get();
    return view('artikel.index', compact('unggulan', 'artikels'));
}

public function show($id)
{
    $artikel = artikel::findOrFail($id);
    return view('artikel.show', compact('artikel'));
}
}

