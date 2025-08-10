<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian | MAHASIGMA</title>
    @vite('resources/css/app.css')
    @livewireStyles
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    <x-navbar-artikel />

    <main class="flex-1 max-w-7xl mx-auto p-6 w-full">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Hasil Pencarian</h1>
        
        @livewire('search-artikel')

    </main>

    <x-footer />

    @livewireScripts
</body>
</html>