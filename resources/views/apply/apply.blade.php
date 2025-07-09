<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- @vite('resources/css/app.css') --}}
    <title>Apply</title>
</head>

<body>
    <form action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="beasiswa_id" id="beasiswa_id" value="{{ $beasiswa }}">
        <table>
            <tr>
                <div>
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required>
                </div>
            </tr>
            <tr>
                <div>
                    <label for="email">Email:</label>
                    <input type="text" name="email" id="email" required>
                </div>
            </tr>
            <tr>
                <div>
                    <label for="essay">Essay:</label>
                    <textarea name="essay" id="essay" cols="30" rows="10"></textarea>
                </div>
            </tr>
            @foreach ($requirements as $r)
                <tr>
                    <td>{{ $r->requirement?->name }}</td>
                    <td>
                        <input type="file" name="requirements[{{ $r->id }}]" required>
                    </td>
                </tr>
            @endforeach
            <tr>
        </table>

        <button type="submit">Apply</button>
    </form>

</body>

</html>
