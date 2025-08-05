<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\kategori;
use Illuminate\Http\Request;

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

     /**
     * Menyediakan data event untuk FullCalendar.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function events(Request $request)
    {
        $kategoriKegiatan = kategori::where('name', 'Kegiatan')->first();

        if (!$kategoriKegiatan) {
            return response()->json([]);
        }

        $kegiatan = artikel::where('kategori_id', $kategoriKegiatan->id)
            ->whereNotNull('tanggal_mulai')
            ->latest()
            ->get();

        $colors = [
            '#ef4444', '#f97316', '#eab308', '#22c55e', '#3b82f6', '#8b5cf6',
            '#ec4899', '#14b8a6', '#64748b', '#f43f5e', '#d946ef', '#0ea5e9'
        ];

        $events = $kegiatan->values()->map(function ($item, $index) use ($colors) {
            return [
                'title' => $item->judul,
                'start' => $item->tanggal_mulai,
                'end' => $item->tanggal_selesai ? \Carbon\Carbon::parse($item->tanggal_selesai)->addDay()->toDateString() : null,
                'url' => route('artikel.show', $item->id),
                // Memberikan warna berdasarkan urutan kegiatan
                'color' => $colors[$index % count($colors)],
            ];
        });

        return response()->json($events);
    }
}