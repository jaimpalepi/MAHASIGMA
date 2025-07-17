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
        <div class="max-w-3xl mx-auto p-4 bg-white rounded shadow">
            <h1 class="text-2xl font-bold mb-2">{{ $artikel->judul }}</h1>
            <p class="text-gray-500 text-sm mb-4">Dipublikasikan: {{ $artikel->created_at->format('d M Y') }}</p>

            @if ($artikel->cover)
                <img src="{{ asset('storage/' . $artikel->cover) }}" alt="Cover" class="w-full h-auto mb-4 rounded">
            @endif

            <div class="prose">
                {!! nl2br(e($artikel->isi)) !!}
            </div>

            <a href="{{ route('artikel.index') }}" class="inline-block mt-6 text-blue-600 hover:underline">← Kembali ke daftar artikel</a>
        </div>
    <x-footer />
</body>