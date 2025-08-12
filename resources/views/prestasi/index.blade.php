<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi Mahasiswa | Kemahasiswaan Unsoed</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>
<body class="bg-gray-50">

    <x-navbar-artikel />

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-12">
            <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">Prestasi & Karya Mahasiswa</h1>
            <p class="mt-4 max-w-4xl text-lg text-gray-500">Jelajahi berita prestasi terbaru dan lihat rekapitulasi pencapaian mahasiswa dari tahun ke tahun.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
            
            {{-- KOLOM KIRI: BERITA PRESTASI --}}
            <div class="lg:col-span-2">
                <div class="flex items-center justify-between mb-6 border-b-2 border-red-200 pb-2">
                    <h2 class="text-2xl font-bold text-gray-800">Berita Prestasi</h2>
                    @auth
                    <a href="{{ route('artikel.create', ['kategori' => 'Prestasi']) }}"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition text-sm font-medium">
                        + Tambah Artikel
                    </a>
                    @endauth
                </div>
                
                @if($prestasi->count())
                    <div class="space-y-6">
                        @foreach ($prestasi as $item)
                            <div class="flex items-start space-x-4 group">
                                <img src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->judul }}" class="w-24 h-24 object-cover rounded-lg flex-shrink-0">
                                <div class="flex-1 border-b border-gray-200 pb-6 group-last:border-b-0">
                                    <p class="text-sm text-gray-500 mb-1">{{ $item->created_at->translatedFormat('d F Y') }}</p>
                                    <h3 class="font-semibold text-lg text-gray-900 leading-tight">
                                        {{-- LINK INI AKAN MENGARAH KE HALAMAN DETAIL ARTIKEL --}}
                                        <a href="{{ route('artikel.show', $item->id) }}" class="hover:text-red-700 transition-colors">{{ $item->judul }}</a>
                                    </h3>
                                    @auth
                                    <div class="mt-2">
                                        <a href="{{ route('artikel.edit', $item->id) }}" class="text-gray-500 hover:text-yellow-600 text-sm font-medium transition-colors duration-300">
                                            ✎ Edit
                                        </a>
                                    </div>
                                    @endauth
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-8">
                        {{ $prestasi->links() }}
                    </div>
                @else
                    <p class="text-gray-500">Belum ada berita prestasi untuk ditampilkan.</p>
                @endif
            </div>

            {{-- KOLOM KANAN: STATISTIK INTERAKTIF --}}
            <div class="lg:col-span-1 sticky top-8">
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm">
                <div class="h-[80vh] overflow-y-auto p-1">
                    @livewire('statistik-prestasi')
                </div>
            </div>
        </div>
        </div>
    </main>

    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @livewireScripts
</body>
</html>