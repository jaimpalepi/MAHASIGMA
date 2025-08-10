<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet" />
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.plugin(window.intersect)
        })
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <title>Visi Misi - Kemahasiswaan Unsoed</title>
</head>

<body class="bg-gray-100">
    <x-navbar />

    <main class="container mx-auto px-4 py-12">
        <!-- Judul dan Deskripsi -->
        <div class="text-center mb-25" x-data="{ visible: false }" x-intersect="visible = true">
            <h1
                :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'"
                class="text-4xl font-bold text-red-700 transition-all duration-700 ease-out translate-y-10 opacity-0">
                Visi & Misi
            </h1>
            <p
                :class="visible ? 'translate-y-0 opacity-100' : 'translate-y-10 opacity-0'"
                class="text-lg text-gray-600 mt-2 transition-all duration-700 ease-out delay-200 translate-y-10 opacity-0">
                Arah dan Tujuan Bidang Kemahasiswaan Universitas Jenderal Soedirman
            </p>
        </div>

        <!-- Grid Visi & Misi -->
        <div class="grid md:grid-cols-2 gap-10">
            <!-- VISI -->
            <div x-data="{ visible: false }" x-intersect="visible = true"
                :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                class="bg-white rounded-lg shadow-2xl p-8 transform transition-all duration-700 ease-out hover:-translate-y-2 scale-90 opacity-0">
                <div class="flex items-center mb-6">
                    <div class="bg-red-100 p-3 rounded-full mr-4">
                        <svg class="w-8 h-8 text-red-700 " fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-semibold text-gray-800 ">Visi</h2>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    Tahun 2034 Unsoed “Diakui dunia sebagai pusat pengembangan sumber daya perdesaan dan kearifan lokal”.
                </p>
            </div>

            <!-- MISI -->
            <div x-data="{ visible: false }" x-intersect="visible = true"
                :class="visible ? 'scale-100 opacity-100' : 'scale-90 opacity-0'"
                class="bg-whiterounded-lg shadow-2xl p-8 transform transition-all duration-700 ease-out hover:-translate-y-2 delay-200 scale-90 opacity-0">
                <div class="flex items-center mb-6">
                    <div class="bg-red-100 
                    p-3 rounded-full mr-4">
                        <svg class="w-8 h-8 text-red-700" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                            </path>
                        </svg>
                    </div>
                    <h2 class="text-3xl font-semibold text-gray-800">Misi</h2>
                </div>
                <ul class="space-y-4 text-gray-700">
                    <li class="flex items-start"><span class="text-red-500 mr-2 mt-1">&#10003;</span>Menyelenggarakan pembelajaran berkualitas tinggi untuk menghasilkan lulusan yang berkarakter, berkualitas, dan berdaya saing tinggi.</li>
                    <li class="flex items-start"><span class="text-red-500 mr-2 mt-1">&#10003;</span>Mengembangkan penelitian dan inovasi unggul untuk pengembangan ilmu dan peningkatan daya saing bangsa.</li>
                    <li class="flex items-start"><span class="text-red-500 mr-2 mt-1">&#10003;</span>Mengembangkan program pemberdayaan masyarakat dan transfer teknologi berkualitas tinggi untuk meningkatkan kesejahteraan masyarakat.</li>
                    <li class="flex items-start"><span class="text-red-500 mr-2 mt-1">&#10003;</span>Meningkatkan kualitas kerjasama dengan mitra untuk meningkatkan kemandirian dan partisipasi institusi pada pengembangan masyarakat.</li>
                    <li class="flex items-start"><span class="text-red-500 mr-2 mt-1">&#10003;</span>Mengembangkan tata pamong universitas yang baik.</li>
                </ul>
            </div>
        </div>
    </main>

    <x-footer />
    <script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>
</body>

</html>
