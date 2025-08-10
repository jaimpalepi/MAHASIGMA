<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>MAHASIGMA</title>
</head>

<body>
    <x-navbar />
    <!-- Header Section -->
    <div class="bg-[url('/public/image/bg-layanan.jpg')] bg-cover bg-center bg-no-repeat py-40 px-4 md:px-20">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Layanan Mahasiswa</h1>
        </div>
    </div>


    <!-- Main -->
    <div x-data="{ layanan: 'kemahasiswaan' }" class="px-4 md:px-20 py-10 grid md:grid-cols-3 gap-8 max-w-7xl mx-auto">
        <!-- Kartu Tombol -->
        <div class="flex flex-col space-y-4">
            <a @click="layanan = 'kemahasiswaan'"
                class="bg-gray-200 hover:bg-gray-300 text-black px-4 py-3 rounded font-semibold text-left cursor-pointer">
                Informasi Kemahasiswaan
            </a>
            <a @click="layanan = 'beasiswa'"
                class="bg-gray-200 hover:bg-gray-300 text-black px-4 py-3 rounded font-semibold text-left cursor-pointer">
                Beasiswa
            </a>
            <a @click="layanan = 'proposal'"
                class="bg-gray-200 hover:bg-gray-300 text-black px-4 py-3 rounded font-semibold text-left cursor-pointer">
                Proposal Kegiatan
            </a>
            <a @click="layanan = 'dispensasi'"
                class="bg-gray-200 hover:bg-gray-300 text-black px-4 py-3 rounded font-semibold text-left cursor-pointer">
                Surat Dispensasi
            </a>
        </div>


        <!-- Info Kemahasiswaan -->
        <div class="md:col-span-2 bg-gray-200 p-6 rounded transition duration-300">
            <!-- Informasi Kemahasiswaan -->
            <div x-show="layanan === 'kemahasiswaan'" x-transition>
                <h2 class="text-xl font-bold mb-3">Informasi Kemahasiswaan</h2>
                <p class="text-sm mb-4">UNSOED menyediakan berbagai fasilitas penunjang mahasiswa, mulai dari
                    organisasi, pelatihan, hingga kegiatan sosial dan akademik.</p>
            </div>

            <!-- Beasiswa -->
            <div x-show="layanan === 'beasiswa'" x-transition>
                <h2 class="text-xl font-bold mb-3">Beasiswa</h2>
                <p class="text-sm mb-4">Tersedia berbagai jenis beasiswa seperti KIP-Kuliah, PPA, dan beasiswa dari
                    mitra industri yang mendukung pembiayaan studi mahasiswa.</p>
                <a href="{{ route('beasiswa') }}"
                    class="flex px-[15px] py-[7px] bg-blue-500 w-fit rounded-md text-white font-semibold text-[17px] hover:bg-blue-600 hover:scale-[1.05] transition-all ease-in-out">Portal
                    Beasiswa UNSOED</a>
            </div>

            <!-- Proposal Kegiatan -->
            <div x-show="layanan === 'proposal'" x-transition>
                <h2 class="text-xl font-bold mb-3">Proposal Kegiatan</h2>
                <p class="text-sm mb-4">Mahasiswa dapat mengajukan proposal kegiatan organisasi untuk mendapatkan
                    dukungan dan pendanaan dari universitas.</p>
            </div>

            <!-- Surat Dispensasi -->
            <div x-show="layanan === 'dispensasi'" x-transition>
                <h2 class="text-xl font-bold mb-3">Surat Dispensasi</h2>
                <p class="text-sm mb-4">
                    Layanan ini memfasilitasi pengajuan surat dispensasi bagi mahasiswa yang mengikuti kegiatan di luar
                    kampus yang berbenturan dengan jadwal kuliah.
                </p>

                @auth
                    <a href="{{ route('dispen.index') }}" class="text-blue-600 hover:underline text-sm font-medium">
                        Lihat Dispensasi →
                    </a>
                @else
                    <a href="{{ route('dispen.create') }}" class="text-blue-600 hover:underline text-sm font-medium">
                        Ajukan Dispensasi →
                    </a>
                @endauth
            </div>

        </div>
    </div>
    <x-footer />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
