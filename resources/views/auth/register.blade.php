<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ujikom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Register User</title>
</head>

<body>
    <div class="main">
        <div class="home_content">
            <div class="card_user_create">
                <form action="{{ route('register') }}" method="post" class="form_create_user">
                    @csrf
                    <div class="form_item">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name">
                        @error('name')
                            <p class="user_create_err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form_item">
                        <label for="role">Role</label>
                        <select name="role" id="role">
                            <option value="admin">Admin</option>
                            <option value="mahasiswa">Mahasiswa</option>
                        </select>
                    </div>

                    <div class="form_item">
                        <label for="nim">NIM</label>
                        <input type="text" id="nim" name="nim">
                        @error('nim')
                            <p class="user_create_err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form_item">
                        <label for="nim">Jurusan</label>
                        <select name="jurusan" id="jurusan">
                            @foreach ($jurusans as $j)
                                <option value="{{$j->id}}">{{$j->name}}</option>
                            @endforeach
                        </select>
                        @error('nim')
                            <p class="user_create_err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form_item">
                        <label for="email">E-mail</label>
                        <input type="text" id="email" name="email">
                        @error('email')
                            <p class="user_create_err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form_item">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                        @error('password')
                            <p class="user_create_err">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form_item">
                        <label for="password_confirm">Confirm Password</label>
                        <input type="password" id="password_confirm" name="password_confirm">
                        @error('password_confirm')
                            <p class="user_create_err">{{ $message }}</p>
                        @enderror
                    </div>

                    <button class="btn_submit_create">Add User</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>