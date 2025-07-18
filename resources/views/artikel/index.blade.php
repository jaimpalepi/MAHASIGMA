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
    <div x-data="{
        active: 0,
        total: {{ $unggulan->count() }},
        init() {
            setInterval(() => {
                this.active = (this.active + 1) % this.total;
            }, 3000);
        },
        next() {
            this.active = (this.active + 1) % this.total
        },
        prev() {
            this.active = (this.active - 1 + this.total) % this.total
        }
    }"
    class="relative w-full overflow-hidden h-64 md:h-96"
>
    <!-- Inner wrapper -->
    <div class="flex transition-transform duration-700 ease-in-out"
         :style="'transform: translateX(-' + (active * 100) + '%)'">
        @foreach ($unggulan as $artikel)
            <a href="{{ route('artikel.show', $artikel->id) }}"
               class="w-full flex-shrink-0 h-64 md:h-96 relative block">
                <img src="{{ asset('storage/' . $artikel->cover) }}"
                     alt="{{ $artikel->judul }}"
                     class="w-full h-full object-cover object-center rounded-lg">

                <div class="absolute inset-0 bg-black/40 flex items-center justify-center text-white text-center">
                    <div>
                        <h2 class="text-xl md:text-3xl font-bold">{{ $artikel->judul }}</h2>
                        <p class="text-sm">Klik untuk membaca selengkapnya</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- Controls -->
    <button @click="prev"
            class="absolute top-1/2 left-3 transform -translate-y-1/2 bg-white/50 hover:bg-white p-2 rounded-full">
        &#10094;
    </button>
    <button @click="next"
            class="absolute top-1/2 right-3 transform -translate-y-1/2 bg-white/50 hover:bg-white p-2 rounded-full">
        &#10095;
    </button>

    <!-- Indicators -->
    <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2">
        <template x-for="i in total" :key="i">
            <div @click="active = i - 1"
                 :class="active === (i - 1) ? 'bg-white' : 'bg-gray-400'"
                 class="w-3 h-3 rounded-full cursor-pointer"></div>
        </template>
    </div>
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
            <div class="mt-3 flex items-center justify-between">
                <a href="{{ route('artikel.show', $artikel->id) }}"
                   class="text-blue-600 hover:underline text-sm font-medium">
                    Baca Selengkapnya →
                </a>
                <a href="{{ route('artikel.edit', $artikel->id) }}"
                   class="text-yellow-600 hover:underline text-sm font-medium">
                    ✎ Edit
                </a>
            </div>
        </div>
    </div>
@endforeach

        </div>
    @endif
</div>
<x-footer />
<script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>



    </body>
    </html>
</body>

</html>
