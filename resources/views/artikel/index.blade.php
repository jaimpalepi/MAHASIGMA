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

<body class="bg-gray-50">
    @livewireStyles
    <x-navbar-artikel />

    @if($unggulan->isNotEmpty())
    <div x-data="{
        active: 0,
        total: {{ $unggulan->count() }},
        next() {
            this.active = (this.active + 1) % this.total
        },
        prev() {
            this.active = (this.active - 1 + this.total) % this.total
        }
    }"
    class="relative w-full overflow-hidden h-64 md:h-96"
    >
        <div class="flex transition-transform duration-700 ease-in-out"
            :style="'transform: translateX(-' + (active * 100) + '%)'">
            @foreach ($unggulan as $artikel)
                <a href="{{ route('artikel.show', $artikel->id) }}"
                class="w-full flex-shrink-0 h-64 md:h-96 relative block">
                    <img src="{{ asset('storage/' . $artikel->cover) }}"
                        alt="{{ $artikel->judul }}"
                        class="w-full h-full object-cover object-center rounded-lg">

                    <div class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center text-center px-4">
                        <h2 class="text-xl md:text-3xl font-bold text-white leading-tight">{{ $artikel->judul }}</h2>
                        <p class="text-sm text-gray-200 mt-1">Klik untuk membaca selengkapnya</p>
                    </div>
                </a>

            @endforeach
        </div>

        <button @click="prev"
                class="absolute top-1/2 left-3 transform -translate-y-1/2 bg-white/50 hover:bg-white p-2 rounded-full">
            &#10094;
        </button>
        <button @click="next"
                class="absolute top-1/2 right-3 transform -translate-y-1/2 bg-white/50 hover:bg-white p-2 rounded-full">
            &#10095;
        </button>

        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2">
            <template x-for="i in total" :key="i">
                <div @click="active = i - 1"
                    :class="active === (i - 1) ? 'bg-white' : 'bg-gray-400'"
                    class="w-3 h-3 rounded-full cursor-pointer"></div>
            </template>
        </div>
    </div>
    @endif

    <div class="max-w-7xl mx-auto px-4 py-8">
        
        @if($heroArtikel)
        <div class="mb-12">
            <h2 class="text-3xl font-bold text-gray-800 border-b-4 border-red-600 pb-2 mb-6 inline-block">Informasi Terbaru</h2>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2">
                    <a href="{{ route('artikel.show', $heroArtikel->id) }}" class="block group">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-shadow duration-300 group-hover:shadow-2xl">
                            @if ($heroArtikel->cover)
                                <img src="{{ asset('storage/' . $heroArtikel->cover) }}" alt="{{ $heroArtikel->judul }}" class="w-full h-96 object-cover">
                            @endif
                            <div class="p-6">
                                <h3 class="text-3xl font-bold text-gray-900 mb-2 group-hover:text-red-700 transition-colors duration-300">{{ $heroArtikel->judul }}</h3>
                                <p class="text-sm text-gray-500 mb-4">{{ $heroArtikel->created_at->format('d M Y') }}</p>
                                <p class="text-gray-700 text-base line-clamp-3">{{ Str::limit(strip_tags($heroArtikel->isi), 200) }}</p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="space-y-6">
                    @foreach($secondaryArtikels as $artikel)
                    <a href="{{ route('artikel.show', $artikel->id) }}" class="block group">
                        <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-shadow duration-300 group-hover:shadow-xl flex items-center">
                             @if ($artikel->cover)
                                <img src="{{ asset('storage/' . $artikel->cover) }}" alt="{{ $artikel->judul }}" class="w-32 h-full object-cover flex-shrink-0">
                            @endif
                            <div class="p-4">
                                <h4 class="font-semibold text-lg text-gray-800 group-hover:text-red-700 transition-colors duration-300">{{ $artikel->judul }}</h4>
                                <p class="text-xs text-gray-500 mt-1">{{ $artikel->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

            </div>
        </div>
        @endif

        <div class="my-12 px-4">

            <h2 class="text-3xl font-bold text-gray-800 border-b-4 border-red-600 pb-2 mb-6 inline-block">
                Acara Mendatang
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-start">

                <div class="md:col-span-1">
                    <img src="{{ asset('image/unnamed.png') }}" alt="Ilustrasi Acara" class="w-full h-auto object-cover rounded-lg shadow-lg">
                </div>

                <div class="md:col-span-2">
                    <ol class="relative border-s border-gray-200">
                        
                        {{-- Loop untuk setiap item acara --}}
                        @forelse($acara as $item)
                        <li class="mb-10 ms-6">
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                                <svg class="w-2.5 h-2.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                </svg>
                            </span>
                            
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900">
                                <a href="{{ route('artikel.show', $item->id) }}" class="hover:text-red-700 transition-colors duration-300">{{ $item->judul }}</a>
                                
                                @if($loop->first)
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm ms-3">Terbaru</span>
                                @endif
                            </h3>
                            
                            <time class="block mb-2 text-sm font-normal leading-none text-gray-400">
                            Diterbitkan pada {{ $item->created_at->translatedFormat('d F Y') }}
                            </time>
                            
                            <p class="mb-4 text-base font-normal text-gray-500">
                                {!! Str::limit(strip_tags($item->isi), 120) !!}
                            </p>
                            
                            <a href="{{ route('artikel.show', $item->id) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700">
                                Selengkapnya <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/></svg>
                            </a>
                        </li>
                        @empty
                        {{-- Pesan jika tidak ada acara yang ditemukan --}}
                        <li class="ms-4">
                            <p class="text-gray-500">Belum ada acara yang dijadwalkan.</p>
                        </li>
                        @endforelse

                    </ol>
                </div>
            </div>
        </div>

        <div>
            <div class="flex items-center justify-between mb-6 border-b-4 border-red-600 pb-2">
    <h2 class="text-3xl font-bold text-gray-800">Semua Informasi</h2>

    @auth
    <a href="{{ route('artikel.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition text-sm font-medium">
        + Tambah Artikel
    </a>
    @endauth
</div>
            <livewire:artikel-index />
        </div>
    </div>

    <x-footer />
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        document.addEventListener('livewire:initialized', () => {
            let componentElement = null;

            Livewire.hook('element.init', ({ component, el }) => {
                if(component.name === 'artikel-index') {
                    componentElement = el;
                }
            });

            Livewire.on('scroll-to-top-of-component', () => {
                if(componentElement) {
                    componentElement.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
@livewireScripts
</body>
</html>