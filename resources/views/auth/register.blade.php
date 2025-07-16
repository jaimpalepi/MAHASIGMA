<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen flex items-center justify-center bg-gradient-to-b bg-gradient-to-b from-yellow-200 to-yellow-500">
    <div class="w-full max-w-md my-16">
        <div class="bg-white rounded-lg shadow-lg px-8 py-10">
            <h2 class="text-center text-2xl font-semibold tracking-wide mb-8 text-gray-700">REGISTER</h2>
            <form action="{{ route('register') }}" method="post" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-gray-700 mb-1">Name</label>
                    <input type="text" id="name" name="name" class="w-full border-b border-blue-300 focus:border-blue-500 outline-none py-2 px-1 bg-transparent">
                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="role" class="block text-gray-700 mb-1">Role</label>
                    <select name="role" id="role" class="w-full border-b border-blue-300 focus:border-blue-500 outline-none py-2 px-1 bg-transparent">
                        <option value="admin">Admin</option>
                        <option value="mahasiswa">Mahasiswa</option>
                    </select>
                </div>
                <div>
                    <label for="nim" class="block text-gray-700 mb-1">NIM</label>
                    <input type="text" id="nim" name="nim" class="w-full border-b border-blue-300 focus:border-blue-500 outline-none py-2 px-1 bg-transparent">
                    @error('nim')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="jurusan" class="block text-gray-700 mb-1">Jurusan</label>
                    <select name="jurusan" id="jurusan" class="w-full border-b border-blue-300 focus:border-blue-500 outline-none py-2 px-1 bg-transparent">
                        @foreach ($jurusans as $j)
                            <option value="{{$j->id}}">{{$j->name}}</option>
                        @endforeach
                    </select>
                    @error('jurusan')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-gray-700 mb-1">E-mail</label>
                    <input type="text" id="email" name="email" class="w-full border-b border-blue-300 focus:border-blue-500 outline-none py-2 px-1 bg-transparent">
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-gray-700 mb-1">Password</label>
                    <input type="password" id="password" name="password" class="w-full border-b border-blue-300 focus:border-blue-500 outline-none py-2 px-1 bg-transparent">
                    @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password_confirm" class="block text-gray-700 mb-1">Confirm Password</label>
                    <input type="password" id="password_confirm" name="password_confirm" class="w-full border-b border-blue-300 focus:border-blue-500 outline-none py-2 px-1 bg-transparent">
                    @error('password_confirm')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="w-full py-2 rounded-full bg-gradient-to-r from-blue-400 to-blue-500 text-white font-semibold shadow hover:from-blue-500 hover:to-blue-400 transition">REGISTER</button>
            </form>
            <div class="mt-6 text-center">
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline text-sm">Sudah punya akun?</a>
            </div>
            <div class="mt-4 text-center">
                <a href="{{ route('beasiswa') }}" class="inline-block px-4 py-2 rounded-full bg-gradient-to-r from-blue-400 to-blue-500 text-white font-semibold shadow hover:from-blue-500 hover:to-blue-400 transition">
                    &larr; Kembali
                </a>
            </div>
        </div>
    </div>
</body>
</html>