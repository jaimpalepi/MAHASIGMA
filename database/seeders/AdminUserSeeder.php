<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'role' => 'admin',
            'nim' => 'H1D023109', // NIM default untuk admin
            'jurusan_id' => 1, // Sesuaikan dengan ID jurusan pertama
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'), // Ganti 'password' dengan password yang aman
        ]);
    }
}
