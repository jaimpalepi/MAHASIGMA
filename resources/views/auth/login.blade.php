<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

        <div class="w-full max-w-md bg-white rounded-xl shadow-2xl p-8 space-y-6">
            
            <div class="flex flex-col items-center">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('image/logo_unsoed.png') }}" alt="Logo UNSOED" class="w-24 h-24">
                </a>
            </div>

            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-800">Selamat Datang</h1>
                <p class="text-gray-500">Login untuk melanjutkan ke dasbor</p>
            </div>

            <form action="{{ route('login') }}" method="post" class="space-y-4">
                @csrf
                <input type="hidden" name="redirect" id="redirect" value="{{ request('redirect') }}">
                
                <div>
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:ring-red-500 focus:border-red-500 focus:outline-none transition"
                        placeholder="Alamat Email">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="current-password"
                        class="w-full px-4 py-3 rounded-lg bg-gray-50 border border-gray-200 focus:ring-red-500 focus:border-red-500 focus:outline-none transition"
                        placeholder="Password">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center">
                        <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-red-600 focus:ring-red-500 border-gray-300 rounded">
                        <label for="remember" class="ml-2 block text-gray-700">Ingat saya</label>
                    </div>

                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="font-medium text-red-600 hover:text-red-500">
                        Lupa password?
                    </a>
                    @endif
                </div>

                <button type="submit"
                    class="w-full py-3 rounded-lg bg-red-700 text-white font-bold shadow-lg hover:bg-red-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-300">
                    LOGIN
                </button>
            </form>

            <div class="relative flex py-2 items-center">
                <div class="flex-grow border-t border-gray-300"></div>
                <span class="flex-shrink mx-4 text-gray-400 text-sm">ATAU LOGIN DENGAN</span>
                <div class="flex-grow border-t border-gray-300"></div>
            </div>
            
            <div>
                <a href="{{ route('redirect.google') }}"
                    class="w-full flex items-center justify-center px-4 py-3 border border-gray-200 rounded-lg shadow-sm bg-white hover:bg-gray-50 transition-all duration-200">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                        <path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                        <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                        <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.222,0-9.658-3.301-11.27-7.962l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                        <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571l6.19,5.238C44.57,36.213,48,30.428,48,24C48,22.886,47.925,21.78,47.78,20.735L43.611,20.083z"></path>
                    </svg>
                    <span class="ml-4 text-md font-medium text-gray-700">Login dengan Akun Google Unsoed</span>
                </a>
                <p class="text-xs text-center text-gray-500 mt-2">Khusus Mahasiswa</p>
            </div>
            
        </div>
        <div class="text-center mt-6">
            <a href="{{ url()->previous('/') }}" class="text-sm text-gray-500 hover:text-gray-700 hover:underline transition">&larr; Kembali</a>
        </div>
    </div>
</body>

</html>
