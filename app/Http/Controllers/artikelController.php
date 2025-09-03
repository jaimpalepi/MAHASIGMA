<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\artikel;
use Illuminate\Support\Facades\Storage;
use App\Models\kategori;
use App\Models\Fakultas;
use App\Models\Setting;

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
            $upcomingEventsCount = Setting::where('key', 'upcoming_events_count')->first()->value ?? 3;

            $acara = Artikel::whereHas('kategori', function ($query) {
                $query->where('name', 'Kegiatan');
            })->latest()
            ->take($upcomingEventsCount) // Gunakan variabel di sini
            ->get();

            return view('artikel.index', compact('unggulan', 'heroArtikel', 'secondaryArtikels', 'allArtikels', 'acara'));
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
        $kategoris = kategori::all();
        $fakultas = Fakultas::all(); 
        return view('artikel.edit', compact('artikel', 'kategoris', 'fakultas'));
    }

    public function update(Request $request, $id)
        {
            $artikel = Artikel::findOrFail($id);

            $request->validate([
            'judul' => 'required|string|max:255',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:4048', // Cover tidak wajib diisi saat update
            'isi' => 'required',
            'kategori_id' => 'required|exists:kategoris,id',
            'fakultas_id' => 'nullable|exists:fakultas,id',
            'tanggal_mulai' => 'nullable|required_if:kategori_id,3|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            ]);

            $dataToUpdate = $request->only(['judul', 'isi', 'kategori_id', 'fakultas_id', 'tanggal_mulai', 'tanggal_selesai']);

            if ($request->kategori_id != 2) {
                $dataToUpdate['fakultas_id'] = null;
            }

            if ($request->kategori_id != 3) {
                $dataToUpdate['tanggal_mulai'] = null;
                $dataToUpdate['tanggal_selesai'] = null;
            }

            if ($request->hasFile('cover')) {
                if ($artikel->cover) {
                    Storage::disk('public')->delete($artikel->cover);
                }
                $dataToUpdate['cover'] = $request->file('cover')->store('covers', 'public');
            }

            $artikel->update($dataToUpdate);

            return redirect()->route('artikel.show', $artikel->id)->with('success', 'Artikel berhasil diperbarui.');
        }
    
    public function destroy(artikel $artikel)
    {
        // Ambil nama kategori SEBELUM artikel dihapus
        $kategoriName = $artikel->kategori->name;

        // Hapus file cover dari storage
        if ($artikel->cover) {
            Storage::disk('public')->delete($artikel->cover);
        }

        // Hapus artikel dari database
        $artikel->delete();
        
        // Tentukan tujuan redirect berdasarkan nama kategori
        $redirectRoute = match ($kategoriName) {
            'Kegiatan' => 'kegiatan.index',
            'Prestasi' => 'prestasi.index',
            default => 'artikel.index',
        };

        return redirect()->route($redirectRoute)->with('success', 'Artikel berhasil dihapus.');
    }

}

