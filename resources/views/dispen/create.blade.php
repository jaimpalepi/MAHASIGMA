<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajukan Dispensasi</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>
    <x-navbar-artikel />
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white shadow-md rounded-md">
        <h2 class="text-2xl font-semibold mb-6">Ajukan Surat Dispensasi</h2>

        @if(session('success'))
            <div class="mb-4 text-green-700 bg-green-100 p-3 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-4 text-red-700 bg-red-100 p-3 rounded">
                <ul class="list-disc ml-4">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('dispen.store') }}" method="POST">
    @csrf
    <!-- Nama Acara, Waktu, Tempat -->
    <div class="mb-4">
        <label for="nama_acara" class="block font-medium">Nama Acara</label>
        <input type="text" name="nama_acara" required class="w-full border rounded p-2">
    </div>
    <div class="mb-4">
        <label for="waktu" class="block font-medium">Waktu</label>
        <input type="date" name="waktu" required class="w-full border rounded p-2">
    </div>
    <div class="mb-4">
        <label for="tempat" class="block font-medium">Tempat</label>
        <input type="text" name="tempat" required class="w-full border rounded p-2">
    </div>

    <!-- List Mahasiswa -->
    <div class="mb-4">
        <label class="block font-medium mb-1">Daftar Mahasiswa</label>
        <div id="mahasiswa-list">
            <input type="text" name="mahasiswa[]" class="w-full border rounded p-2 mb-2" placeholder="Nama Mahasiswa">
        </div>
        <button type="button" onclick="tambahMahasiswa()" class="text-blue-600 hover:underline text-sm">+ Tambah Mahasiswa</button>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Kirim</button>
</form>

<script>
function tambahMahasiswa() {
    const list = document.getElementById('mahasiswa-list');
    const input = document.createElement('input');
    input.type = 'text';
    input.name = 'mahasiswa[]';
    input.className = 'w-full border rounded p-2 mb-2';
    input.placeholder = 'Nama Mahasiswa';
    list.appendChild(input);
}
</script>

    </div>
    <x-footer />
</body>
</html>
