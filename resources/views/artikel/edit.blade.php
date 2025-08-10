<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Edit Artikel</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        /* Kontainer untuk tooltip */
        .tooltip {
            position: relative;
            display: inline-block;
        }

        /* Teks tooltip */
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 10;
            bottom: 125%; /* Posisikan di atas tombol */
            left: 50%;
            margin-left: -60px; /* Geser ke kiri untuk menengahkan */
            
            /* Animasi fade-in dari user */
            opacity: 0;
            transition: opacity 0.5s;
        }

        /* Panah kecil di bawah tooltip */
        .tooltip .tooltiptext::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        /* Tampilkan tooltip saat di-hover */
        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>


</head>

<body x-data="{ kategoriId: '{{ old('kategori_id', $artikel->kategori_id) }}' }">
    <x-navbar-artikel />
    <div class="max-w-xl mx-auto p-4 my-8 bg-white shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Edit Artikel</h2>

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

        <form action="{{ route('artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" id="artikel-form">
            @csrf
            @method('PUT')
            
            <!-- Input Judul -->
            <div class="mb-4">
                <label for="judul" class="block text-sm font-medium text-gray-700">Judul Artikel</label>
                <input type="text" name="judul" id="judul" value="{{ old('judul', $artikel->judul) }}" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
            </div>

            <!-- Input Cover -->
            <div class="mb-4">
                <label for="cover" class="block text-sm font-medium text-gray-700">Ganti Cover (Opsional)</label>
                @if($artikel->cover)
                    <div class="mt-2 mb-2">
                        <img src="{{ asset('storage/' . $artikel->cover) }}" alt="Cover saat ini" class="w-40 h-auto rounded">
                        <p class="text-xs text-gray-500 mt-1">Cover saat ini</p>
                    </div>
                @endif
                <input type="file" name="cover" id="cover" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
            </div>

            <!-- Input Isi Artikel -->
            <div class="mb-4">
                <label for="isi" class="block text-sm font-medium text-gray-700">Isi Artikel</label>
                <input type="hidden" name="isi" id="isi-input">
                <div id="editor" style="height: 300px;">{!! old('isi', $artikel->isi) !!}</div>
            </div>

            <!-- Input Kategori -->
            <div class="mb-4">
                <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                <select name="kategori_id" id="kategori_id" x-model="kategoriId" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id', $artikel->kategori_id) == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-4" x-show="kategoriId == '2'" x-transition>
                <label for="fakultas_id" class="block text-sm font-medium text-gray-700">Fakultas</label>
                <select name="fakultas_id" id="fakultas_id" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    <option value="">Pilih Fakultas</option>
                    @foreach ($fakultas as $data)
                        <option value="{{ $data->id }}" {{ old('fakultas_id', $artikel->fakultas_id) == $data->id ? 'selected' : '' }}>
                            {{ $data->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4" x-show="kategoriId == '3'" x-transition>
                <label class="block text-sm font-medium text-gray-700">Tanggal Kegiatan</label>
                <div class="grid grid-cols-2 gap-4 mt-1">
                    <div>
                        <label for="tanggal_mulai" class="block text-xs font-medium text-gray-500">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai', $artikel->tanggal_mulai) }}" class="w-full border border-gray-300 rounded-md p-2">
                    </div>
                    <div>
                        <label for="tanggal_selesai" class="block text-xs font-medium text-gray-500">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai', $artikel->tanggal_selesai) }}" class="w-full border border-gray-300 rounded-md p-2">
                    </div>
                </div>
            </div>

            <button type="submit" id="submit-button" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-300 disabled:bg-blue-300">
                Simpan Perubahan
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
        var submitButton = document.getElementById('submit-button');

        form.onsubmit = function() {
            isiInput.value = quill.root.innerHTML;
            submitButton.disabled = true;
            submitButton.innerHTML = 'Menyimpan...';
        };

        document.addEventListener('DOMContentLoaded', function() {
            // Definisikan pasangan class tombol dan teks tooltipnya SESUAI PERMINTAAN
            const tooltips = {
                'ql-bold': 'Tebal',
                'ql-italic': 'Miring',
                'ql-underline': 'Garis Bawah',
                'ql-link': 'Sisipkan Tautan',
                'ql-list[value=ordered]': 'Daftar Bernomor',
                'ql-list[value=bullet]': 'Daftar Poin',
                'ql-clean': 'Hapus Format'
            };

            // Loop melalui setiap item di objek tooltips
            for (const Tclass in tooltips) {
                const button = document.querySelector(`.ql-toolbar .${Tclass}`);
                if (button) {
                    button.classList.add('tooltip');
                    const tooltipText = document.createElement('span');
                    tooltipText.className = 'tooltiptext';
                    tooltipText.innerText = tooltips[Tclass];
                    button.appendChild(tooltipText);
                }
            }
        });
    </script>
</body>
</html>