<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\artikel;
use App\Models\kategori;
use App\Models\Fakultas;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        artikel::truncate();
        Storage::disk('public')->deleteDirectory('covers');
        Storage::disk('public')->makeDirectory('covers');

        $infoId = kategori::where('name', 'Informasi')->value('id');
        $prestasiId = kategori::where('name', 'Prestasi')->value('id');

        $fakultasIds = Fakultas::pluck('id')->all();

        if (!$infoId || !$prestasiId) {
            $this->command->warn('Pastikan kategori "Informasi" dan "Prestasi" ada. Jalankan KategoriSeeder.');
            return;
        }
        if (empty($fakultasIds)) {
            $this->command->warn('Tidak ada data fakultas. Jalankan FakultasSeeder terlebih dahulu.');
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            $imageName = 'cover_' . uniqid() . '.png';
            $imagePath = storage_path('app/public/covers/' . $imageName);

            $image = imagecreatetruecolor(1200, 800);
            $backgroundColor = imagecolorallocate($image, 230, 230, 230);
            $textColor = imagecolorallocate($image, 100, 100, 100);
            imagefill($image, 0, 0, $backgroundColor);
            imagestring($image, 5, 450, 390, '1200x800 Placeholder', $textColor);
            imagepng($image, $imagePath);
            imagedestroy($image);

            $kategoriUntukArtikelIni = ($i < 5) ? $infoId : $prestasiId;
            $fakultasUntukArtikelIni = null;

            if ($kategoriUntukArtikelIni == $prestasiId) {
                $fakultasUntukArtikelIni = $fakultasIds[array_rand($fakultasIds)];
            }

            artikel::create([
                'judul' => 'Contoh Judul Artikel ke-' . ($i + 1),
                'cover' => 'covers/' . $imageName,
                'isi'   => '<p>Ini adalah isi konten untuk contoh artikel ke-' . ($i + 1) . '. Konten ini dibuat secara otomatis.</p>' .
                           '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
                'kategori_id' => $kategoriUntukArtikelIni,
                'fakultas_id' => $fakultasUntukArtikelIni,
                'is_featured' => (3 < $i && $i <= 6),
                'created_at' => now()->subDays($i),
                'updated_at' => now()->subDays($i),
            ]);
        }
    }
}