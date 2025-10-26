<?php

// namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Illuminate\Database\Seeder;
// use App\Models\artikel;
// use App\Models\kategori;
// use App\Models\Fakultas;
// use Illuminate\Support\Facades\Storage;
// use Carbon\Carbon;

// class ArtikelSeeder extends Seeder
// {
//     public function run(): void
//     {
//         artikel::truncate();
//         Storage::disk('public')->deleteDirectory('covers');
//         Storage::disk('public')->makeDirectory('covers');

//         $infoId = kategori::where('name', 'Informasi')->value('id');
//         $prestasiId = kategori::where('name', 'Prestasi')->value('id');
//         $fakultasIds = Fakultas::pluck('id')->all();

//         if (!$infoId || !$prestasiId || empty($fakultasIds)) {
//             $this->command->error('Pastikan KategoriSeeder dan FakultasSeeder sudah dijalankan.');
//             return;
//         }

//         $totalArtikel = 30;
//         $jumlahPrestasi = floor($totalArtikel * 0.7);
//         $jumlahInformasi = $totalArtikel - $jumlahPrestasi;

//         $daftarKategori = array_merge(
//             array_fill(0, $jumlahPrestasi, $prestasiId),
//             array_fill(0, $jumlahInformasi, $infoId)
//         );

//         shuffle($daftarKategori);

//         foreach ($daftarKategori as $index => $kategoriId) {
//             $fakultasUntukArtikelIni = null;
//             $tanggalArtikel = now()->subDays($index);

//             if ($kategoriId == $prestasiId) {
//                 $fakultasUntukArtikelIni = $fakultasIds[array_rand($fakultasIds)];
//                 $startDate = Carbon::create(2023, 1, 1);
//                 $endDate = Carbon::create(2025, 12, 31);
//                 $randomTimestamp = mt_rand($startDate->timestamp, $endDate->timestamp);
//                 $tanggalArtikel = Carbon::createFromTimestamp($randomTimestamp);
//             }
            
//             $imageName = 'cover_' . uniqid() . '.png';
//             $imagePath = storage_path('app/public/covers/' . $imageName);
//             $image = imagecreatetruecolor(1200, 800);
//             $backgroundColor = imagecolorallocate($image, 230, 230, 230);
//             $textColor = imagecolorallocate($image, 100, 100, 100);
//             imagefill($image, 0, 0, $backgroundColor);
//             imagestring($image, 5, 450, 390, '1200x800 Placeholder', $textColor);
//             imagepng($image, $imagePath);
//             imagedestroy($image);

//             artikel::create([
//                 'judul' => 'Contoh Judul Artikel ke-' . ($index + 1),
//                 'cover' => 'covers/' . $imageName,
//                 'isi'   => '<p>Ini adalah isi konten untuk contoh artikel ke-' . ($index + 1) . '. Konten ini dibuat secara otomatis.</p>',
//                 'kategori_id' => $kategoriId,
//                 'fakultas_id' => $fakultasUntukArtikelIni,
//                 'is_featured' => (rand(1, 10) > 7),
//                 'created_at' => $tanggalArtikel,
//                 'updated_at' => $tanggalArtikel,
//             ]);
//         }
//     }
// }