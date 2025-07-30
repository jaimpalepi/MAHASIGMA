<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login - MAHASIGMA</title>
</head>
<body class="bg-gray-50 font-sans leading-normal tracking-normal">

    <x-navbar />

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-8 bg-white rounded-lg shadow-md">
            <div class="text-center">
                <h2 class="text-2xl font-bold text-gray-900">
                    Login ke Akun Anda
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Selamat datang kembali! Silakan masukkan detail Anda.
                </p>
            </div>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Oops!</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="text-sm font-bold text-gray-600 block">Email</label>
                    <input type="email" name="email" id="email" required
                           class="w-full p-2 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500"
                           placeholder="email@contoh.com">
                </div>
                <div>
                    <label for="password" class="text-sm font-bold text-gray-600 block">Password</label>
                    <input type="password" name="password" id="password" required
                           class="w-full p-2 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500"
                           placeholder="••••••••">
                </div>
                <div>
                    <button type="submit"
                            class="w-full py-2 px-4 bg-red-600 hover:bg-red-700 rounded-md text-white text-sm font-bold transition duration-300">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>

    <x-footer />
</body>
</html>