<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet" />

    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.plugin(window.intersect)
        })
    </script>

    <title>Struktur Organisasi - Kemahasiswaan Unsoed</title>

    <style>
        /* CSS ini menjaga layout pohon dan garis-garisnya */
        .tree ul {
            padding-top: 50px;
            position: relative;
            display: flex;
            justify-content: center;
        }

        .tree li {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 1rem;
            position: relative;
        }

        .tree li::before, .tree li::after {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 2px solid #d1d5db;
            width: 50%;
            height: 50px; /* Disesuaikan agar pas */
        }

        
        .tree li::after {
            right: auto; /* Direset */
            left: 50%;
            border-left: 2px solid #d1d5db;
        }

        .tree li:only-child::after, .tree li:only-child::before {
            display: none;
        }

        .tree li:first-child::before, .tree li:last-child::after {
            border: 0 none;
        }

        .tree li:last-child::before {
            border-right: 2px solid #d1d5db;
            border-radius: 0 5px 0 0;
        }

        .tree li:first-child::after {
            border-radius: 5px 0 0 0;
        }

        .tree ul ul::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 2px solid #d1d5db;
            width: 0;
            height: 50px;
        }


        .card-item {
            padding: 1rem;
            margin-top: 50px;
        }
        
    </style>
</head>

<body class="bg-gray-100 ">
    <x-navbar />

    <main class="container mx-auto px-4 py-12">
        <div class="text-center mb-12" x-data="{ visible: false }" x-intersect="visible = true">
            <h1 :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'"
                class="text-4xl font-bold text-red-700  transition-all duration-700 ease-out">
                Struktur Organisasi
            </h1>
            <p :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'"
                class="text-lg text-gray-600 mt-2 transition-all duration-700 ease-out delay-200">
                Biro Akademik dan Kemahasiswaan Universitas Jenderal Soedirman
            </p>
        </div>

        <div class="tree overflow-x-auto pb-8">
            <ul x-data="{ visible: false }" x-intersect="visible = true" class="transition-all duration-700">
                <li>
                    <div :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                        class="card-item bg-white  rounded-lg shadow-xl p-4 text-center min-w-[280px] transition-all duration-500 ease-out transform hover:scale-105 hover:shadow-2xl">
                        <h3 class="font-bold text-lg text-gray-800">BIRO AKADEMIK & KEMAHASISWAAN</h3>
                    </div>

                    <ul :class="visible ? 'opacity-100' : 'opacity-0'" class="transition-opacity duration-1000 delay-300">
                        <li>
                            <div :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                                class="card-item bg-white rounded-lg shadow-xl p-4 text-center min-w-[220px] transition-all duration-500 ease-out delay-200 transform hover:scale-105 hover:shadow-2xl">
                                <h3 class="font-bold text-lg text-gray-800">BAGIAN AKADEMIK</h3>
                            </div>

                            <ul :class="visible ? 'opacity-100' : 'opacity-0'" class="transition-opacity duration-1000 delay-500">
                                <li>
                                    <div :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                                        class="card-item bg-white rounded-lg shadow-xl p-4 text-center min-w-[180px] transition-all duration-500 ease-out delay-300 transform hover:scale-105 hover:shadow-2xl">
                                        <p class="font-semibold text-sm text-red-600">Subbag Akademik & Evaluasi</p>
                                    </div>
                                </li>
                                <li>
                                    <div :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                                        class="card-item bg-white rounded-lg shadow-xl p-4 text-center min-w-[180px] transition-all duration-500 ease-out delay-400 transform hover:scale-105 hover:shadow-2xl">
                                        <p class="font-semibold text-sm text-red-600">Subbag Registrasi & Statistik</p>
                                    </div>
                                </li>
                                 <li>
                                    <div :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                                        class="card-item bg-white rounded-lg shadow-xl p-4 text-center min-w-[180px] transition-all duration-500 ease-out delay-500 transform hover:scale-105 hover:shadow-2xl">
                                        <p class="font-semibold text-sm text-red-600">Subbag Sarana Pendidikan</p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                                class="card-item bg-white rounded-lg shadow-xl p-4 text-center min-w-[320px] transition-all duration-500 ease-out delay-200 transform hover:scale-105 hover:shadow-2xl">
                                <h3 class="font-bold text-lg text-gray-800">BAGIAN PENGEMBANGAN KEMAHASISWAAN & ALUMNI</h3>
                            </div>

                             <ul :class="visible ? 'opacity-100' : 'opacity-0'" class="transition-opacity duration-1000 delay-500">
                                <li>
                                    <div :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                                        class="card-item bg-white rounded-lg shadow-xl p-4 text-center min-w-[220px] transition-all duration-500 ease-out delay-300 transform hover:scale-105 hover:shadow-2xl">
                                        <p class="font-semibold text-sm text-red-600">Subbag Minat, Bakat, Penalaran, & Informasi Kemahasiswaan</p>
                                    </div>
                                </li>
                                <li>
                                    <div :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                                        class="card-item bg-white rounded-lg shadow-xl p-4 text-center min-w-[220px] transition-all duration-500 ease-out delay-400 transform hover:scale-105 hover:shadow-2xl">
                                        <p class="font-semibold text-sm text-red-600">Subbag Kesejahteraan Mahasiswa & Alumni</p>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </main>

    <x-footer />
    <script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>
</body>

</html>