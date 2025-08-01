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
            ->get();

        $events = $kegiatan->map(function ($item) {
            return [
                'title' => $item->judul,
                'start' => $item->tanggal_mulai,
                // Tambahkan 1 hari ke tanggal selesai agar event mencakup hari terakhir
                'end' => $item->tanggal_selesai ? \Carbon\Carbon::parse($item->tanggal_selesai)->addDay()->toDateString() : null,
                'url' => route('artikel.show', $item->id), // Link ke halaman detail artikel
                'color' => '#dc2626', // Warna event (merah)
            ];
        });

        return response()->json($events);
    }
}