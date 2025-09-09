<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Admin Dashboard | Kemahasiswaan UNSOED</title>
    
    {{-- Menggunakan Vite untuk memuat aset CSS dan JS --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Jika Anda memindahkan file CSS & JS template ke folder public, gunakan ini --}}
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet" /> --}}
    {{-- <script src="{{ asset('js/index.js') }}" defer></script> --}}

</head>
<body
    x-data="{ page: 'ecommerce', 'loaded': true, 'darkMode': false, 'stickyMenu': false, 'sidebarToggle': false, 'scrollTop': false }"
    x-init="
            darkMode = JSON.parse(localStorage.getItem('darkMode'));
            $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
    :class="{'dark bg-gray-900': darkMode === true}"
>
    <!-- ===== Preloader akan kita lewati dulu agar lebih simpel ===== -->
    {{-- @include('admin.partials.preloader') --}}

    <!-- ===== Page Wrapper Start ===== -->
    <div class="flex h-screen overflow-hidden">
        <!-- ===== Sidebar Start ===== -->
        {{-- Memuat sidebar dari file partial --}}
        @include('admin.partials.sidebar')
        <!-- ===== Sidebar End ===== -->

        <!-- ===== Content Area Start ===== -->
        <div class="relative flex flex-1 flex-col overflow-x-hidden overflow-y-auto">
            <!-- ===== Header Start ===== -->
            {{-- Memuat header dari file partial --}}
            @include('admin.partials.header')
            <!-- ===== Header End ===== -->

            <!-- ===== Main Content Start ===== -->
            <main>
                <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
                    {{-- Ini adalah area di mana konten halaman spesifik akan ditampilkan --}}
                    @yield('content')
                </div>
            </main>
            <!-- ===== Main Content End ===== -->
        </div>
        <!-- ===== Content Area End ===== -->
    </div>
    <!-- ===== Page Wrapper End ===== -->
</body>
</html>
