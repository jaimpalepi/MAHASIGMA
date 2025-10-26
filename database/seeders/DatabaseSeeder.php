<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            JurusanSeeder::class,
            RequirementSeeder::class,
            AdminUserSeeder::class,
            KategoriSeeder::class,
            FakultasSeeder::class,
            KegiatanSeeder::class,
            BeasiswaSeeder::class,
            HeroSeeder::class,
            SettingsTableSeeder::class,
            LayananSeeder::class,
        ]);
    }
}
