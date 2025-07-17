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

    <title>MAHASIGMA</title>
</head>

<body>
    <x-navbar />
    <div id="default-carousel" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-64 overflow-hidden rounded-lg md:h-96">
        @foreach ($unggulan as $index => $artikel)
            <div class="{{ $index === 0 ? '' : 'hidden' }} duration-700 ease-in-out" data-carousel-item>
                <a href="{{ route('artikel.show', $artikel->id) }}">
                    <img src="{{ asset('storage/' . $artikel->cover) }}"
                         class="absolute block w-full h-full object-cover object-center top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2"
                         alt="{{ $artikel->judul }}">
                    <div class="absolute inset-0 bg-black/50 flex items-center justify-center text-white text-center">
                        <div>
                            <h2 class="text-2xl md:text-3xl font-bold">{{ $artikel->judul }}</h2>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 bottom-4 left-1/2 space-x-3">
        @foreach ($unggulan as $index => $artikel)
            <button type="button"
                    class="w-3 h-3 rounded-full"
                    aria-current="{{ $index === 0 ? 'true' : 'false' }}"
                    aria-label="Slide {{ $index + 1 }}"
                    data-carousel-slide-to="{{ $index }}">
            </button>
        @endforeach
    </div>

    <!-- Slider controls -->
    <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 hover:bg-white/50">
            <svg class="w-4 h-4 text-white rtl:rotate-180" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 1 1 5l4 4"/>
            </svg>
        </span>
    </button>
    <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 hover:bg-white/50">
            <svg class="w-4 h-4 text-white rtl:rotate-180" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m1 9 4-4-4-4"/>
            </svg>
        </span>
    </button>
</div>



    <div class="max-w-6xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Berita</h1>
        <a href="{{ route('artikel.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            + Tambah Artikel
        </a>
    </div>

    @if($artikels->isEmpty())
        <div class="bg-yellow-100 text-yellow-700 p-4 rounded">
            Belum ada artikel yang ditambahkan.
        </div>
    @else
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($artikels as $artikel)
                <div onclick="window.location.href = 'artikel/{{$artikel->id}}'"
                        class="cards w-[300px] rounded-[10px] shadow-2xl hover:cursor-pointer hover:scale-[1.03] transition-transform duration-200">
                    @if ($artikel->cover)
                        <img src="{{ asset('storage/' . $artikel->cover) }}" alt="Cover"
                             class="w-full h-48 object-cover rounded-t-lg">
                    @endif

                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800 mb-2">
                            <a href="{{ route('artikel.show', $artikel->id) }}" class="hover:underline">
                                {{ Str::limit($artikel->judul, 60) }}
                            </a>
                        </h2>
                        <p class="text-sm text-gray-500 mb-4">
                            {{ $artikel->created_at->format('d M Y') }}
                        </p>
                        <p class="text-gray-700 text-sm">
                            {{ Str::limit(strip_tags($artikel->isi), 100) }}
                        </p>
                        <a href="{{ route('artikel.show', $artikel->id) }}"
                           class="inline-block mt-3 text-blue-600 hover:underline text-sm font-medium">
                            Baca Selengkapnya →
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
<x-footer />
<script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>



    </body>
    </html>
</body>

</html>
