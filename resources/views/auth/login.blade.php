<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="ujikom.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>

<body class="login">
    <div class="container_card_login">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="txt_field">
                <input type="text" name="email" value="{{ old('email') }}" placeholder="email">
                @error('email')
                    <div class="error_message_login">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="txt_field">
                <input type="password" name="password" placeholder="Password">
                @error('password')
                    <div class="error_message_login">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="btn_container">
                <button class="btn-submit" type="submit">Login</button>

                @error('login')
                    <div class="error_message_login">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </form>
        <!--  -->
    </div>
</body>

</html>