<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::create(['name' => 'Teknik Informatika']);
        Jurusan::create(['name' => 'Sistem Informasi']);
        Jurusan::create(['name' => 'Teknik Elektro']);
        Jurusan::create(['name' => 'Manajemen']);
        Jurusan::create(['name' => 'Akuntansi']);
        Jurusan::create(['name' => 'Hukum']);
    }
}
