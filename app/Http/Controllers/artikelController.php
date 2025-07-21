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

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
}


    public function index()
{
     // Mengambil artikel unggulan untuk carousel (ini sudah ada)
    $unggulan = artikel::where('is_featured', true)->latest()->take(5)->get();

    // Mengambil 1 artikel paling baru untuk ditampilkan sebagai "hero"
    $heroArtikel = artikel::latest()->first();

    // Mengambil 3 artikel berikutnya (setelah hero) untuk daftar sekunder
    // Jika hanya ada sedikit artikel, pastikan tidak error
    $secondaryArtikels = $heroArtikel ? artikel::latest()->where('id', '!=', $heroArtikel->id)->take(3)->get() : collect();

    // Paginate sisa artikel (selain 4 artikel teratas) untuk grid utama
    // Menampilkan 9 artikel per halaman
    $artikels = artikel::latest()->skip(4)->paginate(9);

    return view('artikel.index', compact('unggulan', 'heroArtikel', 'secondaryArtikels', 'artikels'));
}

public function show($id)
{
    $artikel = Artikel::findOrFail($id);
    $randomArtikel = Artikel::inRandomOrder()
                           ->where('id', '!=', $id)
                           ->limit(3)
                           ->get();

    return view('artikel.show', compact('artikel', 'randomArtikel'));
}

public function edit($id)
{
    $artikel = Artikel::findOrFail($id);
    return view('artikel.edit', compact('artikel'));
}

public function update(Request $request, $id)
{
    $artikel = Artikel::findOrFail($id);

    $request->validate([
        'judul' => 'required|string|max:255',
        'isi' => 'required|string',
        'cover' => 'nullable|image|max:2048',
    ]);

    $artikel->judul = $request->judul;
    $artikel->isi = $request->isi;

    if ($request->hasFile('cover')) {
        $path = $request->file('cover')->store('covers', 'public');
        $artikel->cover = $path;
    }

    $artikel->save();

    return redirect()->route('artikel.show', $artikel->id)->with('success', 'Artikel berhasil diperbarui.');
}

}

