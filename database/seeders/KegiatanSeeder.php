<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\artikel;
use App\Models\kategori;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cari ID untuk kategori 'Kegiatan'
        $kegiatanId = kategori::where('name', 'Kegiatan')->value('id');

        // Jika kategori 'Kegiatan' tidak ditemukan, tampilkan error.
        if (!$kegiatanId) {
            $this->command->error('Kategori "Kegiatan" tidak ditemukan. Pastikan migrasi untuk kategori sudah dijalankan.');
            return;
        }

        // Loop untuk membuat 10 artikel kegiatan
        for ($i = 1; $i <= 10; $i++) {
            // Membuat tanggal mulai acak antara 2023 dan 2025
            $startDate = Carbon::create(2023, 1, 1);
            $endDate = Carbon::create(2025, 12, 31);
            $tanggalMulai = Carbon::createFromTimestamp(mt_rand($startDate->timestamp, $endDate->timestamp));
            
            // Tanggal selesai adalah 1 sampai 5 hari setelah tanggal mulai
            $tanggalSelesai = $tanggalMulai->copy()->addDays(rand(1, 5));

            // Membuat placeholder untuk gambar cover
            $imageName = 'cover_kegiatan_' . uniqid() . '.png';
            $imagePath = storage_path('app/public/covers/' . $imageName);
            if (!Storage::disk('public')->exists('covers')) {
                Storage::disk('public')->makeDirectory('covers');
            }
            $image = imagecreatetruecolor(1200, 800);
            $backgroundColor = imagecolorallocate($image, 230, 230, 230);
            $textColor = imagecolorallocate($image, 100, 100, 100);
            imagefill($image, 0, 0, $backgroundColor);
            imagestring($image, 5, 450, 390, 'Placeholder Kegiatan', $textColor);
            imagepng($image, $imagePath);
            imagedestroy($image);

            // Buat artikel di database
            artikel::create([
                'judul' => 'Contoh Kegiatan Mahasiswa ke-' . $i,
                'cover' => 'covers/' . $imageName,
                'isi'   => '<p>Ini adalah deskripsi untuk contoh kegiatan mahasiswa ke-' . $i . '. Konten ini dibuat secara otomatis untuk keperluan seeding.</p>',
                'kategori_id' => $kegiatanId,
                'fakultas_id' => null, // Kegiatan tidak terikat fakultas
                'is_featured' => (rand(1, 10) > 8), // 20% kemungkinan jadi unggulan
                'tanggal_mulai' => $tanggalMulai,
                'tanggal_selesai' => $tanggalSelesai,
                'created_at' => $tanggalMulai,
                'updated_at' => $tanggalMulai,
            ]);
        }
    }
}