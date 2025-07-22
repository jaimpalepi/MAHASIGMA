<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Buat Artikel Baru</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body>
    <x-navbar />
    <div class="max-w-xl mx-auto p-4 my-8 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Buat Artikel Baru</h2>

        {{-- Menampilkan error validasi --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">Ada beberapa masalah dengan artikel Anda.</span>
                <ul class="mt-3 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data" id="artikel-form">
            @csrf

            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>

            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700">Cover (Gambar)</label>
                <input type="file" name="cover" id="cover" accept="image/*" class="mt-1 block w-full" required>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Isi Artikel</label>
                <div id="editor" class="bg-white rounded border border-gray-300 min-h-[200px]">
                    {!! old('isi') !!}
                </div>
                <input type="hidden" name="isi" id="isi">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Artikel</button>
        </form>
    </div>
    <x-footer />

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        // Ganti 'onclick' dengan event listener pada form
        document.getElementById('artikel-form').addEventListener('submit', function(e) {
            // Salin konten dari Quill ke input tersembunyi
            document.getElementById('isi').value = quill.root.innerHTML;
        });
    </script>
</body>
</html>