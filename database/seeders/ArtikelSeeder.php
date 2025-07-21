<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\artikel; 
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

        // Gunakan factory untuk membuat 10 artikel
        for ($i = 0; $i < 10; $i++) {
            // Membuat gambar dummy menggunakan placeholder
            $imageName = 'cover_' . uniqid() . '.png';
            $imagePath = storage_path('app/public/covers/' . $imageName);
            
            $image = imagecreatetruecolor(1200, 800);
            $backgroundColor = imagecolorallocate($image, 230, 230, 230); // Abu-abu muda
            $textColor = imagecolorallocate($image, 100, 100, 100); // Abu-abu tua
            imagefill($image, 0, 0, $backgroundColor);
            imagestring($image, 5, 450, 390, '1200x800 Placeholder', $textColor);
            imagepng($image, $imagePath);
            imagedestroy($image);

            artikel::create([
                'judul' => 'Contoh Judul Artikel ke-' . ($i + 1),
                'cover' => 'covers/' . $imageName,
                'isi'   => '<p>Ini adalah isi konten untuk contoh artikel ke-' . ($i + 1) . '. Konten ini dibuat secara otomatis untuk keperluan testing dan pengembangan. Anda dapat mengedit atau menghapus artikel ini sesuai kebutuhan.</p>' .
                           '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>',
                'is_featured' => (3 < $i && $i <= 6), // 3 artikel akan menjadi unggulan
                'created_at' => now()->subDays($i),
                'updated_at' => now()->subDays($i),
            ]);
        }
    }
}