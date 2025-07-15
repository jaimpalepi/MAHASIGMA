<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beasiswa KP25</title>
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col items-center justify-center min-h-screen bg-gray-100">
    <h1 class="text-3xl font-bold mb-6">Selamat Datang di Portal Beasiswa KP25</h1>
    <div class="space-x-4">
        <a href="{{ route('beasiswa') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Daftar Beasiswa</a>
        <a href="{{ route('applicant') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Daftar Pelamar</a>
        <a href="{{ route('beasiswa.create') }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">+ Create Beasiswa</a>
    </div>
    <p class="mt-8 text-gray-600">Silakan pilih menu di atas untuk melanjutkan.</p>
</body>

</html>
