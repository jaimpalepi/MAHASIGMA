<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pengaturan Website</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <x-navbar-artikel />
    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-bold mb-6">Pengaturan Tampilan Website</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-white shadow-md rounded p-6">
            @csrf
            <div class="mb-4">
                <label for="upcoming_events_count" class="block text-gray-700 font-semibold mb-2">
                    Jumlah Acara Mendatang yang Ditampilkan
                </label>
                <input type="number" name="upcoming_events_count" id="upcoming_events_count"
                       class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                       value="{{ $settings['upcoming_events_count'] ?? 3 }}" min="1">
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                    Simpan Pengaturan
                </button>
            </div>
        </form>
    </div>
    <x-footer />
</body>
</html>