<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hero::create([
            'heroImage' => json_encode('image/unnamed.png'),
            'bigText' => 'Selamat Datang',
            'smallText' => 'Temukan informasi terbaru seputar kegiatan, beasiswa, dan prestasi mahasiswa di sini.',
        ]);
    }
}