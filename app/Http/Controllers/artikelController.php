<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artikel;
use Illuminate\Support\Facades\Storage;
use App\Models\kategori;
use App\Models\Fakultas;

class ArtikelController extends Controller
{
    public function create(Request $request)
    {
        $kategoris = kategori::all();
        $fakultas = Fakultas::all();
        $kategoriInputName = $request->input('kategori');
        $selectedKategori = null;
        if ($kategoriInputName) {
            $selectedKategori = kategori::where('name', $kategoriInputName)->first();
        }

        return view('artikel.create', compact('kategoris', 'fakultas', 'selectedKategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'cover' => 'required|image|mimes:jpg,jpeg,png|max:4048',
            'isi' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'fakultas_id' => 'nullable|exists:fakultas,id',
            'tanggal_mulai' => 'nullable|required_if:kategori_id,3|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
        ]);

        $coverPath = $request->file('cover')->store('covers', 'public');

        artikel::create([
            'judul' => $request->judul,
            'cover' => $coverPath,
            'isi' => $request->isi,
            'kategori_id' => $request->kategori_id,
            'fakultas_id' => $request->kategori_id == 2 ? $request->fakultas_id : null,
            'tanggal_mulai' => $request->kategori_id == 3 ? $request->tanggal_mulai : null,
            'tanggal_selesai' => $request->kategori_id == 3 ? $request->tanggal_selesai : null,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil ditambahkan!');
}

public function index()
    {
        $unggulan = artikel::where('is_featured', true)->latest()->take(5)->get();

        $heroArtikel = artikel::latest()->first();

        $secondaryArtikels = $heroArtikel ? artikel::latest()->where('id', '!=', $heroArtikel->id)->take(3)->get() : collect();

        $allArtikels = Artikel::latest()->get();
        return view('artikel.index', compact('unggulan', 'heroArtikel', 'secondaryArtikels', 'allArtikels'));
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

