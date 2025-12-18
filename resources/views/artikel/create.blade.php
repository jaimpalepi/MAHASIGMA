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

<body class="bg-gray-100 antialiased" x-data="{ 
    kategoriId: '{{ old('kategori_id', $selectedKategori->id ?? '') }}',
    coverPreview: null,
    handleFileChange(event) {
        const file = event.target.files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = (e) => {
                this.coverPreview = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }
}">
    <x-navbar-artikel />

    <div class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 my-8">
        <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data" id="artikel-form">
            @csrf
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-800">Buat Artikel Baru</h1>
                    <p class="text-gray-500">Isi detail di bawah ini untuk mempublikasikan artikel.</p>
                </div>
                <div class="flex space-x-2">
                    <a href="{{ url()->previous() }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50">
                        Batal
                    </a>
                    <button type="submit" id="submit-button" class="px-4 py-2 text-sm font-medium text-white bg-red-700 rounded-lg shadow-sm hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 disabled:bg-red-400">
                        Simpan Artikel
                    </button>
                </div>
            </div>

            @if ($errors->any())
                <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4" role="alert">
                    <p class="font-bold">Oops! Terjadi beberapa kesalahan:</p>
                    <ul class="mt-2 list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Kolom Utama --}}
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <label for="judul" class="block text-lg font-semibold text-gray-800">Judul Artikel</label>
                        <input type="text" name="judul" id="judul" value="{{ old('judul') }}" class="mt-2 block w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:ring-red-500 focus:border-red-500" placeholder="e.g. Panduan Beasiswa KIP-K 2025" required>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <label class="block text-lg font-semibold text-gray-800 mb-2">Cover Gambar</label>

                        <!-- Image Preview -->
                        <div x-show="coverPreview" style="display: none;" class="mt-4 relative mb-4">
                            <img :src="coverPreview" class="w-full rounded-lg object-cover shadow-md max-h-80">
                            <button @click="coverPreview = null; $refs.coverInput.value = null;" type="button" class="absolute top-2 right-2 bg-white/75 rounded-full p-1 text-gray-800 hover:bg-white focus:outline-none" aria-label="Remove image">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
                            </button>
                        </div>

                        <!-- File Input / Drop Zone -->
                        <div x-show="!coverPreview">
                            <label for="cover" class="relative flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-red-500 transition cursor-pointer">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true"><path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                <span class="mt-2 block text-sm font-medium text-gray-600">Seret & Lepas file, atau Klik untuk memilih</span>
                                <span class="text-xs text-gray-500 mt-1">PNG, JPG, GIF, WEBP</span>
                            </label>
                        </div>
                        <input type="file" name="cover" id="cover" @change="handleFileChange" class="sr-only" x-ref="coverInput" accept="image/*">
                        
                        @error('cover')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="bg-white rounded-xl shadow-lg">
                        <label for="isi" class="block text-lg font-semibold text-gray-800 p-6 pb-0">Isi Artikel</label>
                        <input type="hidden" name="isi" id="isi-input">
                        <div id="editor" class="p-6 prose max-w-none" style="min-height: 400px;">{!! old('isi') !!}</div>
                    </div>
                </div>

                {{-- Kolom Samping --}}
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Pengaturan Publikasi</h3>
                        
                        <label for="kategori_id" class="block text-sm font-medium text-gray-700">Kategori</label>
                        <select name="kategori_id" id="kategori_id" x-model="kategoriId"
                                class="mt-1 block w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:ring-red-500 focus:border-red-500 disabled:bg-gray-200"
                                required @if($selectedKategori) disabled @endif>
                            <option value="">Pilih Kategori</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}" @if(old('kategori_id') == $kategori->id || (isset($selectedKategori) && $selectedKategori->id == $kategori->id)) selected @endif>{{ $kategori->name }}</option>
                            @endforeach
                        </select>
                        @if($selectedKategori)
                            <input type="hidden" name="kategori_id" value="{{ $selectedKategori->id }}">
                        @endif

                        <div class="mt-4" x-show="kategoriId == '2'" x-transition>
                            <label for="fakultas_id" class="block text-sm font-medium text-gray-700">Fakultas (Prestasi)</label>
                            <select name="fakultas_id" id="fakultas_id" class="mt-1 block w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:ring-red-500 focus:border-red-500">
                                <option value="">Pilih Fakultas</option>
                                @foreach ($fakultas as $data)
                                    <option value="{{ $data->id }}" @if(old('fakultas_id') == $data->id) selected @endif>{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
        
                        <div class="mt-4" x-show="kategoriId == '3'" x-transition>
                            <label class="block text-sm font-medium text-gray-700">Tanggal Kegiatan</label>
                            <div class="grid grid-cols-2 gap-4 mt-1">
                                <div>
                                    <label for="tanggal_mulai" class="sr-only">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai') }}" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:ring-red-500 focus:border-red-500" placeholder="Mulai">
                                </div>
                                <div>
                                    <label for="tanggal_selesai" class="sr-only">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai') }}" class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:ring-red-500 focus:border-red-500" placeholder="Selesai">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg">
                        <label class="flex items-center justify-between cursor-pointer">
                            <span class="text-sm font-medium text-gray-800">Jadikan artikel unggulan</span>
                            <div class="relative">
                                <input type="checkbox" name="is_featured" value="1" class="sr-only peer" {{ old('is_featured') ? 'checked' : '' }}>
                                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-600"></div>
                            </div>
                        </label>
                        <p class="text-xs text-gray-500 mt-2">Artikel unggulan akan ditampilkan di carousel halaman utama.</p>
                    </div>

                </div>
            </div>
        </form>
    </div>

    <x-footer />

    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var quill = new Quill('#editor', {
            theme: 'snow',
            placeholder: 'Tuliskan isi artikel di sini...',
            modules: {
                toolbar: [
                    [{ 'header': [1, 2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{'list': 'ordered'}, {'list': 'bullet'}],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });

        var form = document.getElementById('artikel-form');
        var isiInput = document.getElementById('isi-input');
        var submitButton = document.getElementById('submit-button');

        form.onsubmit = function(e) {
            // Salin konten dari Quill ke input tersembunyi
            isiInput.value = quill.root.innerHTML;

            // Nonaktifkan tombol untuk mencegah submit ganda
            submitButton.disabled = true;
            submitButton.innerHTML = 'Menyimpan...';
        };

        // Re-enable tombol jika pengguna menekan tombol kembali dan halaman dimuat dari cache
        window.onpageshow = function(event) {
            if (event.persisted) {
                submitButton.disabled = false;
                submitButton.innerHTML = 'Simpan Artikel';
            }
        };
    </script>
</body>
</html>