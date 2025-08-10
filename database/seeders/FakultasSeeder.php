<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fakultas;
use Illuminate\Support\Facades\Schema;

class FakultasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Fakultas::truncate();
        Schema::enableForeignKeyConstraints();

        $fakultas = [
            ['nama' => 'Fakultas Pertanian'],
            ['nama' => 'Fakultas Biologi'],
            ['nama' => 'Fakultas Ekonomi dan Bisnis'],
            ['nama' => 'Fakultas Peternakan'],
            ['nama' => 'Fakultas Hukum'],
            ['nama' => 'Fakultas Ilmu Sosial dan Ilmu Politik'],
            ['nama' => 'Fakultas Kedokteran'],
            ['nama' => 'Fakultas Teknik'],
            ['nama' => 'Fakultas Ilmu-Ilmu Kesehatan'],
            ['nama' => 'Fakultas Ilmu Budaya'],
            ['nama' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam'],
            ['nama' => 'Fakultas Perikanan dan Ilmu Kelautan'],
        ];

        foreach ($fakultas as $data) {
            Fakultas::create($data);
        }
    }
}