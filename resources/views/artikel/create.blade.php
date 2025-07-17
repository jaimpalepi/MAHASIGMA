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
    <title>Document</title>
</head>

<body>
    <x-navbar />
        <div class="max-w-xl mx-auto p-4 bg-white shadow-md rounded-lg">
    <h2 class="text-xl font-semibold mb-4">Buat Artikel Baru</h2>

    <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="judul" id="judul" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
        </div>

        <div class="mb-4">
            <label for="cover" class="block text-sm font-medium text-gray-700">Cover (Gambar)</label>
            <input type="file" name="cover" id="cover" accept="image/*" class="mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="isi" class="block text-sm font-medium text-gray-700">Isi Artikel</label>
            <textarea name="isi" id="isi" rows="6" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </form>
    </div>
    <x-footer />
</body>
</html>