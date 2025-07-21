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

    <!-- Alpine.js & Intersect Plugin -->
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.plugin(window.intersect)
        })
    </script>

    <title>Struktur Organisasi - Kemahasiswaan Unsoed</title>

    <style>
        .tree-line {
            position: absolute;
            background-color: #d1d5db;
        }

        .dark .tree-line {
            background-color: #4b5563;
        }

        .card-item {
            padding: 20px;
            margin-top: 50px;
        }

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
            height: 40px;
        }

        .dark .tree li::before, .dark .tree li::after {
            border-top-color: #4b5563;
        }
        
        .tree li::after {
            right: 50%;
            left: 50%;
            border-left: 2px solid #d1d5db;
        }

        .dark .tree li::after {
            border-left-color: #4b5563;
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

        .dark .tree li:last-child::before {
            border-right-color: #4b5563;
        }

        .tree li:first-child::after {
            border-left: 2px solid #d1d5db;
            border-radius: 5px 0 0 0;
        }

        .dark .tree li:first-child::after {
            border-left-color: #4b5563;
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

        .dark .tree ul ul::before {
            border-left-color: #4b5563;
        }

        .tree > ul > li > ul > li {
        flex: 1;
        }
        
    </style>
</head>

<body class="bg-gray-100 dark:bg-gray-800">
    <x-navbar />

    <main class="container mx-auto px-4 py-12">
        <div class="text-center mb-12" x-data="{ visible: false }" x-intersect="visible = true">
            <h1 :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'"
                class="text-4xl font-bold text-red-700 dark:text-red-500 transition-all duration-700 ease-out translate-y-10 opacity-0">
                Struktur Organisasi
            </h1>
            <p :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'"
                class="text-lg text-gray-600 dark:text-gray-400 mt-2 transition-all duration-700 ease-out delay-200 translate-y-10 opacity-0">
                Hierarki Kepengurusan Bidang Kemahasiswaan
            </p>
        </div>

        <div class="tree overflow-x-auto pb-8">
            <ul x-data="{ visible: false }" x-intersect="visible = true" class="transition-all duration-700">
                <li>
                    <!-- Level 1 -->
                    <div :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                        class="card-item bg-white dark:bg-gray-900 rounded-lg shadow-xl p-4 text-center min-w-[200px] transition-all duration-500 ease-out transform hover:scale-105 hover:shadow-2xl scale-90 opacity-0">
                        <img src="/image/avatar.jpg" alt="Foto Profil"
                            class="w-20 h-20 mx-auto rounded-full mb-3 border-2 border-red-200 dark:border-red-800">
                        <h3 class="font-bold text-lg text-gray-800 dark:text-white">nama</h3>
                        <p class="text-sm text-red-600 dark:text-red-400">Wakil Rektor Bidang Kemahasiswaan & Alumni</p>
                    </div>

                    <!-- Level 2 -->
                    <ul :class="visible ? 'opacity-100' : 'opacity-0'" class="transition-opacity duration-1000 delay-300 opacity-0">
                        <li>
                            <div :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                                class="card-item bg-white dark:bg-gray-900 rounded-lg shadow-xl p-4 text-center min-w-[200px] transition-all duration-500 ease-out transform hover:scale-105 hover:shadow-2xl scale-90 opacity-0">
                                <img src="/image/avatar.jpg" alt="Foto Profil"
                                    class="w-20 h-20 mx-auto rounded-full mb-3 border-2 border-red-200 dark:border-red-800">
                                <h3 class="font-bold text-lg text-gray-800 dark:text-white">Koordinator</h3>
                                <p class="text-sm text-red-600 dark:text-red-400">Nama Pejabat</p>
                            </div>
                        </li>
                        <li>
                            <div :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                                class="card-item bg-white dark:bg-gray-900 rounded-lg shadow-xl p-4 text-center min-w-[200px] transition-all duration-500 ease-out transform hover:scale-105 hover:shadow-2xl scale-90 opacity-0">
                                <img src="/image/avatar.jpg" alt="Foto Profil"
                                    class="w-20 h-20 mx-auto rounded-full mb-3 border-2 border-red-200 dark:border-red-800">
                                <h3 class="font-bold text-lg text-gray-800 dark:text-white">Sub Koordinator</h3>
                                <p class="text-sm text-red-600 dark:text-red-400">Nama Pejabat</p>
                            </div>

                            <!-- Level 3 -->
                            <ul :class="visible ? 'opacity-100' : 'opacity-0'" class="transition-opacity duration-1000 delay-500 opacity-0">
                                <li>
                                    <div :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                                        class="card-item bg-white dark:bg-gray-900 rounded-lg shadow-xl p-4 text-center min-w-[180px] transition-all duration-500 ease-out transform hover:scale-105 hover:shadow-2xl scale-90 opacity-0">
                                        <img src="/image/avatar.jpg" alt="Foto Profil"
                                            class="w-20 h-20 mx-auto rounded-full mb-3 border-2 border-red-200 dark:border-red-800">
                                        <h3 class="font-bold text-md text-gray-800 dark:text-white">Staff 1</h3>
                                        <p class="text-xs text-red-600 dark:text-red-400">Minat, Penalaran, dan Informasi Kemahasiswaan</p>
                                    </div>
                                </li>
                                <li>
                                    <div :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                                        class="card-item bg-white dark:bg-gray-900 rounded-lg shadow-xl p-4 text-center min-w-[180px] transition-all duration-500 ease-out transform hover:scale-105 hover:shadow-2xl scale-90 opacity-0">
                                        <img src="/image/avatar.jpg" alt="Foto Profil"
                                            class="w-20 h-20 mx-auto rounded-full mb-3 border-2 border-red-200 dark:border-red-800">
                                        <h3 class="font-bold text-md text-gray-800 dark:text-white">Staff 2</h3>
                                        <p class="text-xs text-red-600 dark:text-red-400">Kesejahteraan Mahasiswa dan Alumni</p>
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
