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
<body>
    <x-navbar-artikel />
<div class="max-w-5xl mx-auto mt-10">


    @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <h1 class="text-2xl font-bold mb-6">Daftar Pengajuan Dispensasi</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($dispens->isEmpty())
        <p class="text-gray-500">Belum ada pengajuan dispensasi.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-md">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="px-4 py-2 border-b">No</th>
                        <th class="px-4 py-2 border-b">Nama Acara</th>
                        <th class="px-4 py-2 border-b">Tanggal</th>
                        <th class="px-4 py-2 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dispens as $index => $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 border-b">{{ $item->nama_acara }}</td>
                            <td class="px-4 py-2 border-b">{{ \Carbon\Carbon::parse($item->waktu)->format('d M Y') }}</td>
                            <td class="px-4 py-2 border-b">
                                <a href="{{ route('dispen.show', $item->id) }}" class="text-blue-600 hover:underline">Lihat Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
</div>
<x-footer />
</body>