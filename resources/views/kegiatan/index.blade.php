<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kegiatan Mahasiswa | Kemahasiswaan Unsoed</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- FullCalendar Assets --}}
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
</head>
<body class="bg-gray-50">

    <x-navbar-artikel />

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex items-center justify-between mb-12">
            <div>
                <h1 class="text-4xl font-extrabold text-gray-800 tracking-tight">Kegiatan Mahasiswa</h1>
                <p class="mt-4 max-w-4xl text-lg text-gray-500">Jelajahi berbagai kegiatan dalam tampilan kalender atau daftar di bawah.</p>
            </div>
            @auth
            <a href="{{ route('artikel.create', ['kategori' => 'Kegiatan']) }}"
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition text-sm font-medium">
                + Tambah Artikel
            </a>
            @endauth
        </div>

        {{-- Kalender Container --}}
        <div class="bg-white p-6 rounded-lg shadow-md mb-12">
            <div id='calendar'></div>
        </div>

        {{-- Daftar Kegiatan (tidak berubah) --}}
        <div>
            <h2 class="text-2xl font-bold text-gray-800 border-b-2 border-red-200 pb-2 mb-6">Daftar Kegiatan</h2>
            @if($kegiatan->count())
                <div class="space-y-8">
                    @foreach ($kegiatan as $item)
                        {{-- Mengubah <a> menjadi <div> untuk pembungkus utama --}}
                        <div class="block group bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                            <div class="flex flex-col sm:flex-row items-start space-y-4 sm:space-y-0 sm:space-x-6">
                                {{-- Menambahkan tautan hanya pada gambar --}}
                                <a href="{{ route('artikel.show', $item->id) }}">
                                    <img src="{{ asset('storage/' . $item->cover) }}" alt="{{ $item->judul }}" class="w-full sm:w-48 h-48 sm:h-32 object-cover rounded-lg flex-shrink-0">
                                </a>
                                <div class="flex-1">
                                    <div class="flex flex-wrap items-center gap-x-4 text-sm text-gray-500 mb-2">
                                        <p>
                                            <time datetime="{{ $item->tanggal_mulai }}">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('d F Y') }}</time>
                                            @if($item->tanggal_selesai && $item->tanggal_selesai != $item->tanggal_mulai)
                                                - <time datetime="{{ $item->tanggal_selesai }}">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->translatedFormat('d F Y') }}</time>
                                            @endif
                                        </p>
                                    </div>
                                    <h3 class="font-semibold text-xl text-gray-900 leading-tight group-hover:text-red-700 transition-colors">
                                        {{-- Menambahkan tautan hanya pada judul --}}
                                        <a href="{{ route('artikel.show', $item->id) }}">
                                            {{ $item->judul }}
                                        </a>
                                    </h3>
                                    <div class="mt-2 text-gray-600 text-sm line-clamp-2">
                                        {!! strip_tags($item->isi) !!}
                                    </div>

                                    {{-- Kode untuk tombol EDIT diletakkan di sini, sekarang sudah aman --}}
                                    @auth
                                    <div class="mt-4">
                                        <a href="{{ route('artikel.edit', $item->id) }}" class="text-gray-500 hover:text-yellow-600 text-sm font-medium transition-colors duration-300">
                                            ✎ Edit
                                        </a>
                                    </div>
                                    @endauth
                                    
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $kegiatan->links() }}
                </div>
            @else
                <div class="bg-yellow-100 text-yellow-800 p-6 rounded-lg text-center">
                    <p>Belum ada informasi kegiatan untuk ditampilkan saat ini.</p>
                </div>
            @endif
        </div>
    </main>

    <x-footer />

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                height: 'auto',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,listMonth'
                },

                dayMaxEventRows: true,

                events: '{{ route("kegiatan.events") }}', // URL untuk mengambil data event
                eventClick: function(info) {
                    info.jsEvent.preventDefault(); 
                    if (info.event.url) {
                        window.open(info.event.url, "_self"); // Buka link di tab yang sama
                    }
                }
            });
            calendar.render();
        });
    </script>
</body>
</html>