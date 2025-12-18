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
    <style>
    .scrollbar-hide::-webkit-scrollbar { display: none; }
    .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
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

        <div x-data="{
                isDown: false,
                startX: 0,
                scrollLeftVal: 0,
                kegiatanScroll(direction) {
                    this.$nextTick(() => {
                        const container = this.$refs.kegiatanContainer;
                        if (!container) return;
                        // Find a card (.snap-start) and compute its width + gap to scroll one card at a time
                        const firstItem = container.querySelector('.snap-start');
                        let scrollAmount;
                        if (firstItem) {
                            const style = getComputedStyle(container);
                            // Try common gap properties; fallback to 24px
                            const gap = parseFloat(style.columnGap) || parseFloat(style.gap) || 24;
                            scrollAmount = firstItem.offsetWidth + gap;
                        } else {
                            scrollAmount = Math.floor(container.offsetWidth * 0.75);
                        }

                        const newLeft = direction === 'left' ? container.scrollLeft - scrollAmount : container.scrollLeft + scrollAmount;
                        container.scrollTo({ left: newLeft, behavior: 'smooth' });
                    });
                },

                pointerDown(e) {
                    this.isDown = true;
                    this.startX = (e.type && e.type.includes && e.type.includes('touch')) ? e.touches[0].clientX : e.clientX;
                    this.scrollLeftVal = this.$refs.kegiatanContainer.scrollLeft;
                    this.$refs.kegiatanContainer.classList.add('cursor-grabbing');
                    if (e.pointerId && this.$refs.kegiatanContainer.setPointerCapture) {
                        this.$refs.kegiatanContainer.setPointerCapture(e.pointerId);
                    }
                },
                pointerMove(e) {
                    if (!this.isDown) return;
                    const x = (e.type && e.type.includes && e.type.includes('touch')) ? e.touches[0].clientX : e.clientX;
                    const walk = this.startX - x;
                    this.$refs.kegiatanContainer.scrollLeft = this.scrollLeftVal + walk;
                },
                pointerUp(e) {
                    this.isDown = false;
                    this.$refs.kegiatanContainer.classList.remove('cursor-grabbing');
                    if (e.pointerId && this.$refs.kegiatanContainer.releasePointerCapture) {
                        this.$refs.kegiatanContainer.releasePointerCapture(e.pointerId);
                    }
                }
            }" class="my-12 px-4">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-3xl font-bold text-gray-800 border-b-4 border-red-600 pb-2 inline-block">
                    Kegiatan
                </h2>
                @if($acara->isNotEmpty())
                <!-- <div class="hidden sm:flex space-x-2">
                    <button @click="kegiatanScroll('left')" aria-label="Scroll Left" class="bg-white hover:bg-gray-100 text-gray-800 p-2 rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button @click="kegiatanScroll('right')" aria-label="Scroll Right" class="bg-white hover:bg-gray-100 text-gray-800 p-2 rounded-full shadow-md focus:outline-none focus:ring-2 focus:ring-red-500 transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div> -->
                @endif
            </div>

            @if($acara->isNotEmpty())
                <div x-ref="kegiatanContainer"
                     @pointerdown="pointerDown($event)" @pointermove="pointerMove($event)" @pointerup="pointerUp($event)" @pointercancel="pointerUp($event)" @pointerleave="pointerUp($event)"
                     @touchstart.prevent="pointerDown($event)" @touchmove.prevent="pointerMove($event)" @touchend="pointerUp($event)"
                     class="flex overflow-x-auto snap-x snap-mandatory space-x-6 pb-4 -mb-4 scrollbar-hide"
                     :class="isDown ? 'cursor-grabbing' : 'cursor-grab'"
                     style="touch-action: pan-y;">
                    @foreach($acara as $item)
                    <div class="snap-start flex-shrink-0 w-80 md:w-96 bg-white rounded-lg shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-2">
                        @if ($item->cover)
                            <a href="{{ route('artikel.show', $item->id) }}">
                                <img src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->judul }}" class="w-full h-48 object-cover">
                            </a>
                        @endif
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                                <a href="{{ route('artikel.show', $item->id) }}" class="hover:text-red-700 transition-colors duration-300">
                                    {{ Str::limit($item->judul, 60) }}
                                </a>
                            </h3>
                            <time class="block mb-4 text-sm font-normal leading-none text-gray-400">
                                Diterbitkan pada {{ $item->created_at->translatedFormat('d F Y') }}
                            </time>
                            <div class="text-gray-600 text-sm line-clamp-3 flex-grow">{!! Str::limit(strip_tags($item->isi), 100) !!}</div>
                            <div class="mt-4 pt-4 border-t">
                                <a href="{{ route('artikel.show', $item->id) }}" class="text-blue-600 hover:underline text-sm font-medium">
                                    Baca Selengkapnya →
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="bg-gray-100 rounded-lg p-8 text-center">
                    <p class="text-gray-500">Belum ada kegiatan yang dijadwalkan.</p>
                </div>
            @endif
        </div>

        <div>
            <div class="flex items-center justify-between mb-6 border-b-4 border-red-600 pb-2">
    <h2 class="text-3xl font-bold text-gray-800">Semua Informasi</h2>

    @auth
    @if (Auth::user()->role == 'admin')
    <a href="{{ route('artikel.create') }}"
       class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition text-sm font-medium">
        + Tambah Artikel
    </a>
    @endif
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