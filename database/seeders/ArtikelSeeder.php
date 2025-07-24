<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\artikel;
use App\Models\kategori; // Import model kategori
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Bersihkan direktori cover lama sebelum seeding
        Storage::disk('public')->deleteDirectory('covers');
        Storage::disk('public')->makeDirectory('covers');

        // 1. Ambil ID untuk 'Informasi' dan 'Prestasi' secara spesifik
        $infoId = kategori::where('name', 'Informasi')->value('id');
        $prestasiId = kategori::where('name', 'Prestasi')->value('id');

        // 2. Pengecekan untuk memastikan kedua kategori ada
        if (!$infoId || !$prestasiId) {
            $this->command->warn('Pastikan kategori "Informasi" dan "Prestasi" ada di database. Jalankan KategoriSeeder terlebih dahulu.');
            return;
        }

        // Gunakan loop yang sudah ada untuk membuat 10 artikel
        for ($i = 0; $i < 10; $i++) {
            // Membuat gambar dummy menggunakan placeholder
            $imageName = 'cover_' . uniqid() . '.png';
            $imagePath = storage_path('app/public/covers/' . $imageName);

            $image = imagecreatetruecolor(1200, 800);
            $backgroundColor = imagecolorallocate($image, 230, 230, 230);
            $textColor = imagecolorallocate($image, 100, 100, 100);
            imagefill($image, 0, 0, $backgroundColor);
            imagestring($image, 5, 450, 390, '1200x800 Placeholder', $textColor);
            imagepng($image, $imagePath);
            imagedestroy($image);

            // 3. Logika untuk menentukan kategori ID
            // Jika $i kurang dari 5 (artikel 1-5), gunakan ID 'Informasi'.
            // Jika tidak, gunakan ID 'Prestasi' (artikel 6-10).
            $kategoriUntukArtikelIni = ($i < 5) ? $infoId : $prestasiId;

            artikel::create([
                'judul' => 'Contoh Judul Artikel ke-' . ($i + 1),
                'cover' => 'covers/' . $imageName,
                'isi'   => '<p>Ini adalah isi konten untuk contoh artikel ke-' . ($i + 1) . '. Konten ini dibuat secara otomatis.</p>' .
                           '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
                
                // 4. Tetapkan ID kategori sesuai logika di atas
                'kategori_id' => $kategoriUntukArtikelIni,

                'is_featured' => (3 < $i && $i <= 6),
                'created_at' => now()->subDays($i),
                'updated_at' => now()->subDays($i),
            ]);
        }
    }
}