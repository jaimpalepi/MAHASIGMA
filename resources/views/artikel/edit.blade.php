<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel | MAHASIGMA</title>
    @vite('resources/css/app.css')

    <!-- Quill CSS -->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <x-navbar />

    <main class="flex-1 max-w-4xl mx-auto p-6 bg-white shadow rounded my-10">
        <h1 class="text-2xl font-bold mb-6">Edit Artikel</h1>

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

        <form method="POST" action="{{ route('artikel.update', $artikel->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $artikel->judul) }}"
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- Cover -->
            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700">Cover (Opsional)</label>
                @if ($artikel->cover)
                    <img src="{{ asset('storage/' . $artikel->cover) }}" alt="Current Cover" class="h-32 mb-2 rounded">
                @endif
                <input type="file" name="cover" id="cover"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:border file:border-gray-300 file:rounded file:bg-gray-50 hover:file:bg-gray-100">
            </div>

            <!-- Isi Artikel -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Isi Artikel</label>
                <div id="editor" class="bg-white rounded border border-gray-300 min-h-[200px]">{!! $artikel->isi !!}</div>
                <input type="hidden" name="isi" id="isi">
            </div>

            <!-- Tombol Simpan -->
            <div class="text-right">
                <button type="submit"
                    onclick="syncQuillContent()"
                    class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </main>

    <x-footer />

    <!-- Quill JS -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        const quill = new Quill('#editor', {
            theme: 'snow'
        });

        function syncQuillContent() {
            document.getElementById('isi').value = quill.root.innerHTML;
        }

        // Optional: If editing existing content
        document.addEventListener("DOMContentLoaded", () => {
            const isiField = `{!! addslashes($artikel->isi) !!}`;
            quill.root.innerHTML = isiField;
        });
    </script>
</body>
</html>
