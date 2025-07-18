<nav class="bg-red-700 text-white px-6 py-3 shadow">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        <!-- Logo dan Title -->
        <div class="flex items-center space-x-3">
            <img src="\image\logo_unsoed.png" class="h-8 me-3" alt="Logo" />
            <div>
                <p class="font-bold text-lg leading-tight">KEMAHASISWAAN</p>
                <p class="text-sm uppercase">Universitas Jenderal Soedirman</p>
            </div>
        </div>

        <!-- Menu -->
        <div class="hidden md:flex space-x-6 text-sm font-semibold items-center">
            <a href="{{route('artikel.index')}}" class="flex items-center space-x-1 hover:underline">
                <svg class="w-4 h-4 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 2L2 7v11h16V7l-8-5z"/></svg>
                <span>Beranda</span>
            </a>
            <div class="relative group">
                <button class="hover:underline flex items-center">
                    Tentang Kami
                    <svg class="ml-1 w-3 h-3 fill-white" viewBox="0 0 20 20"><path d="M5.23 7.21l4.77 4.77 4.77-4.77L15.77 8.7l-5.77 5.77L4.23 8.7z"/></svg>
                </button>
                <!-- Dropdown contoh -->
                <div class="absolute left-0 mt-1 hidden group-hover:block bg-white text-black rounded shadow w-40 z-10">
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Visi Misi</a>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Struktur</a>
                </div>
            </div>
            <a href="{{route('layanan')}}" class="hover:underline">Layanan</a>
            <a href="#" class="hover:underline">Kegiatan</a>
            <a href="#" class="hover:underline">Prestasi</a>
            <a href="#" class="hover:underline">Tracer Study</a>
            <a href="#" class="hover:underline">Career Portal</a>
        </div>
    </div>
</nav>
