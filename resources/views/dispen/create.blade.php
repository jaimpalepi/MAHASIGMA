<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajukan Dispensasi</title>
    @vite('resources/css/app.css')
</head>
<body>
    <x-navbar />
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

        <form action="{{ route('dispen.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="nama_acara" class="block text-sm font-medium text-gray-700">Nama Acara</label>
                <input type="text" name="nama_acara" id="nama_acara"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('nama_acara') }}" required>
            </div>

            <div class="mb-4">
                <label for="waktu" class="block text-sm font-medium text-gray-700">Waktu</label>
                <input type="date" name="waktu" id="waktu"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('waktu') }}" required>
            </div>

            <div class="mb-4">
                <label for="tempat" class="block text-sm font-medium text-gray-700">Tempat</label>
                <input type="text" name="tempat" id="tempat"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('tempat') }}" required>
            </div>

            <div class="mb-6">
                <label for="lampiran" class="block text-sm font-medium text-gray-700">Lampiran (PDF/DOC)</label>
                <input type="file" name="lampiran" id="lampiran"
                    class="mt-1 block w-full text-sm border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                    accept=".pdf,.doc,.docx" required>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Ajukan
                </button>
            </div>
        </form>
    </div>
    <x-footer />
</body>
</html>
