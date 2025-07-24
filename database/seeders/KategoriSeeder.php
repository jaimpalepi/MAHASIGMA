<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\kategori;
use Illuminate\Support\Facades\Schema; // 1. Import Schema

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 2. Nonaktifkan pengecekan foreign key untuk sementara
        Schema::disableForeignKeyConstraints();

        // 3. Kosongkan tabel dengan aman
        kategori::truncate();

        // 4. Aktifkan kembali pengecekan foreign key
        Schema::enableForeignKeyConstraints();

        // 5. Gunakan firstOrCreate untuk menghindari duplikasi jika seeder dijalankan lagi
        kategori::firstOrCreate(['name' => 'Informasi']);
        kategori::firstOrCreate(['name' => 'Prestasi']);
    }
}