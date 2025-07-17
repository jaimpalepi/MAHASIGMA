<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Requirements;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Requirements::create(['name' => 'Kartu Tanda Penduduk (KTP)']);
        Requirements::create(['name' => 'Kartu Tanda Mahasiswa (KTM)']);
        Requirements::create(['name' => 'Transkrip Nilai Terakhir']);
        Requirements::create(['name' => 'Surat Keterangan Tidak Mampu (SKTM)']);
        Requirements::create(['name' => 'Surat Rekomendasi Dosen']);
    }
}
