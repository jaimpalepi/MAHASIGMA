<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Layanan;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Layanan::create([
            'layanan' => 'Informasi Kemahasiswaan',
            'text' => 'UNSOED menyediakan berbagai fasilitas penunjang mahasiswa, mulai dari organisasi, pelatihan, hingga kegiatan sosial dan akademik.',
            'link' => null,
        ]);

        Layanan::create([
            'layanan' => 'Surat Dispensasi',
            'text' => 'Layanan ini memfasilitasi pengajuan surat dispensasi bagi mahasiswa yang mengikuti kegiatan di luar kampus yang berbenturan dengan jadwal kuliah.',
            'link' => '/dispen',
        ]);

        Layanan::create([
            'layanan' => 'Beasiswa',
            'text' => 'Tersedia berbagai jenis beasiswa seperti KIP-Kuliah, PPA, dan beasiswa dari mitra industri yang mendukung pembiayaan studi mahasiswa.',
            'link' => '/beasiswa',
        ]);

        Layanan::create([
            'layanan' => 'Proposal Kegiatan',
            'text' => 'Mahasiswa dapat mengajukan proposal kegiatan organisasi untuk mendapatkan dukungan dan pendanaan dari universitas.',
            'link' => null,
        ]);
    }
}
