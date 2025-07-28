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

    <x-navbar />

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="mb-12">
            <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">Prestasi & Karya Mahasiswa</h1>
            <p class="mt-4 max-w-4xl text-lg text-gray-500">Jelajahi berita prestasi terbaru dan lihat rekapitulasi pencapaian mahasiswa dari tahun ke tahun.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12 items-start">
            
            {{-- KOLOM KIRI: BERITA PRESTASI --}}
            <div class="lg:col-span-2">
                <h2 class="text-2xl font-bold text-gray-800 border-b-2 border-red-200 pb-2 mb-6">Berita Prestasi</h2>
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
                @livewire('statistik-prestasi')
            </div>
        </div>
    </main>

    <x-footer />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @livewireScripts
</body>
</html>