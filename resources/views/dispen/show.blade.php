<html>
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
    <x-navbar-artikel />
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-2xl font-bold mb-6">Detail Pengajuan Dispensasi</h1>

    <div class="bg-white rounded shadow p-6 space-y-4">
        <div>
            <h2 class="font-semibold text-gray-700">Nama Acara</h2>
            <p class="text-gray-900">{{ $dispen->nama_acara }}</p>
        </div>

        <div>
            <h2 class="font-semibold text-gray-700">Tanggal Pelaksanaan</h2>
            <p class="text-gray-900">{{ \Carbon\Carbon::parse($dispen->waktu)->format('d M Y') }}</p>
        </div>

        <div>
            <h2 class="font-semibold text-gray-700">Tempat</h2>
            <p class="text-gray-900">{{ $dispen->tempat }}</p>
        </div>

        <div>
            <h2 class="font-semibold text-gray-700">Daftar Mahasiswa</h2>
            <ul class="list-disc list-inside text-gray-900">
                @foreach (json_decode($dispen->mahasiswa, true) as $nama)
                    <li>{{ $nama }}</li>
                @endforeach
            </ul>
        </div>

        <div>
            <h2 class="font-semibold text-gray-700">Status</h2>
            <span class="px-2 py-1 rounded-full text-sm 
                @if ($dispen->status == 'Menunggu')
                    bg-yellow-100 text-yellow-800
                @elseif ($dispen->status == 'Disetujui')
                    bg-green-100 text-green-800
                @else
                    bg-red-100 text-red-800
                @endif">
                {{ $dispen->status }}
            </span>
        </div>

        <div class="mt-6">
            <a href="{{ route('dispen.index') }}" class="text-blue-600 hover:underline">&larr; Kembali ke daftar</a>
        </div>
    </div>
</div>
<x-footer />
</body>