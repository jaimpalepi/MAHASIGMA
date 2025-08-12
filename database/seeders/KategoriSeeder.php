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
       
        Schema::disableForeignKeyConstraints();

        kategori::truncate();

        Schema::enableForeignKeyConstraints();

        kategori::firstOrCreate(['name' => 'Informasi']);
        kategori::firstOrCreate(['name' => 'Prestasi']);
        kategori::firstOrCreate(['name' => 'Kegiatan']);
    }
}