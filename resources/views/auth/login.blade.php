<!DOCTYPE html>
<html lang="en">
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
                    <div class="relative">
                        <input type="password" name="password" id="password" required
                               class="w-full p-2 border border-gray-300 rounded-md focus:ring-red-500 focus:border-red-500"
                               placeholder="••••••••">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                            <svg id="togglePassword" class="h-6 w-6 text-gray-600 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                    </div>
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

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            

        });
    </script>
</body>
</html>