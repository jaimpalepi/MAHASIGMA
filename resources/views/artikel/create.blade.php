<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Buat Artikel Baru</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    {{-- Memuat Alpine.js dari CDN --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
{{-- 
  PENJELASAN:
  x-data="{ kategoriId: '{{ old('kategori_id') }}' }"
  - 'x-data' adalah perintah Alpine.js untuk mendeklarasikan sebuah komponen.
  - Kita membuat sebuah variabel state bernama 'kategoriId'.
  - Nilai awalnya diisi dengan 'old('kategori_id')' dari Laravel. Ini penting agar jika terjadi error validasi dan halaman dimuat ulang, dropdown fakultas tetap muncul jika sebelumnya "Prestasi" sudah dipilih.
--}}
<body x-data="{ kategoriId: '{{ old('kategori_id') }}' }">
    <x-navbar />
    <div class="max-w-xl mx-auto p-4 my-8 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Buat Artikel Baru</h2>

        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Oops!</strong>
                <span class="block sm:inline">Terjadi beberapa kesalahan.</span>
                <ul class="mt-3 list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data" id="artikel-form">
            @csrf
            
            {{-- Input Judul --}}
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>

            {{-- Input Cover --}}
            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700">Cover Gambar</label>
                <input type="file" name="cover" id="cover" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
            </div>

            {{-- Input Isi Artikel --}}
            <div class="mb-4">
                <label for="isi" class="block text-sm font-medium text-gray-700">Isi Artikel</label>
                <input type="hidden" name="isi" id="isi-input">
                <div id="editor" style="height: 300px;">{!! old('isi') !!}</div>
            </div>

            {{-- 
              PENJELASAN:
              x-model="kategoriId"
              - 'x-model' akan menyinkronkan nilai dari variabel 'kategoriId' dengan nilai dari dropdown kategori ini.
              - Setiap kali pengguna memilih kategori, nilai 'kategoriId' akan otomatis ter-update.
            --}}
            <div class="mb-4">
                <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori_id" id="kategori_id" x-model="kategoriId" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategoris as $kategori)
                        {{-- Asumsi kategori "Prestasi" memiliki ID = 2 --}}
                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                    @endforeach
                </select>
            </div>

            
            <div class="mb-4" x-show="kategoriId == '2'" x-transition>
                <label for="fakultas_id" class="block text-sm font-medium text-gray-700">Fakultas</label>
                <select name="fakultas_id" id="fakultas_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    <option value="">Pilih Fakultas</option>
                    @foreach ($fakultas as $data)
                        <option value="{{ $data->id }}" @if(old('fakultas_id') == $data->id) selected @endif>{{ $data->nama }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300">
                Simpan Artikel
            </button>
        </form>
    </div>
    <x-footer />
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow'
        });
        var form = document.getElementById('artikel-form');
        var isiInput = document.getElementById('isi-input');
        form.onsubmit = function() {
            isiInput.value = quill.root.innerHTML;
        };
    </script>
</body>
</html>