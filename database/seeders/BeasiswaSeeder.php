<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Beasiswa;
use Carbon\Carbon;

class BeasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Beasiswa 1
        Beasiswa::create([
            'title' => 'Beasiswa Pendidikan Indonesia',
            'cover' => 'documents/cover/default.jpg',
            'description' => 'Beasiswa untuk mahasiswa berprestasi di seluruh Indonesia. Terbuka untuk semua jenjang S1.',
            'official_website' => 'https://beasiswa.kemdikbud.go.id/',
            'contact_person' => '+6281234567890',
            'pdf' => null,
            'provider' => 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi',
            'jenjang' => 'S1',
            'amount' => 'Biaya Pendidikan Penuh',
            'quota' => 1000,
            'qualifications' => [
                'Mahasiswa aktif S1',
                'IPK minimal 3.5',
                'Memiliki prestasi akademik/non-akademik'
            ],
            'benefits' => [
                'Biaya UKT Penuh',
                'Uang saku bulanan',
                'Pelatihan kepemimpinan'
            ],
            'open' => Carbon::now()->subMonth(),
            'deadline' => Carbon::now()->addMonth(),
            'status' => 'Available'
        ]);

        // Beasiswa 2
        Beasiswa::create([
            'title' => 'Beasiswa Djarum Plus',
            'cover' => 'documents/cover/default2.jpg',
            'description' => 'Selain mendapatkan dana beasiswa selama satu tahun, Beswan Djarum (sebutan bagi penerima Djarum Beasiswa Plus) juga mendapatkan berbagai macam pelatihan soft skills.',
            'official_website' => 'https://djarumbeasiswaplus.org/',
            'contact_person' => '+6289876543210',
            'pdf' => null,
            'provider' => 'Djarum Foundation',
            'jenjang' => 'S1',
            'amount' => 'Rp 1.000.000 per bulan',
            'quota' => 500,
            'qualifications' => [
                'Mahasiswa semester 4',
                'IPK minimal 3.2',
                'Aktif berorganisasi'
            ],
            'benefits' => [
                'Dana beasiswa selama 1 tahun',
                'Pelatihan soft skills (Nation Building, Character Building, Leadership Development)',
                'Jejaring dengan Beswan Djarum dari seluruh Indonesia'
            ],
            'open' => Carbon::now()->subWeeks(2),
            'deadline' => Carbon::now()->addWeeks(6),
            'status' => 'Available'
        ]);

        // Beasiswa 3
        Beasiswa::create([
            'title' => 'Beasiswa Bank Indonesia',
            'cover' => 'documents/cover/default3.jpg',
            'description' => 'Beasiswa bagi mahasiswa jenjang S1 yang memiliki prestasi akademik yang baik serta aktif dalam kegiatan sosial kemasyarakatan yang bermanfaat bagi masyarakat dan lingkungan.',
            'official_website' => 'https://www.bi.go.id/id/karier/beasiswa.aspx',
            'contact_person' => '+622129810000',
            'pdf' => null,
            'provider' => 'Bank Indonesia',
            'jenjang' => 'S1',
            'amount' => 'Rp 1.500.000 per bulan',
            'quota' => 200,
            'qualifications' => [
                'Mahasiswa minimal semester 3',
                'IPK minimal 3.25',
                'Memiliki pengalaman organisasi',
                'Tidak sedang menerima beasiswa lain'
            ],
            'benefits' => [
                'Tunjangan studi per bulan',
                'Kesempatan bergabung dalam komunitas Generasi Baru Indonesia (GenBI)',
                'Pelatihan dan pengembangan diri'
            ],
            'open' => Carbon::now(),
            'deadline' => Carbon::now()->addMonths(2),
            'status' => 'Available'
        ]);
    }
}
