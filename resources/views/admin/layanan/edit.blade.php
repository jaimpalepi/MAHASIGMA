<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Edit Layanan</title>
</head>

<body>
    <x-navbar-artikel />

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="py-[30px]">
        <form action="{{ route('layanan.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col items-start gap-4 max-w-xl mx-auto bg-white p-6 rounded-lg shadow-lg border-[1px] border-[#e6e4e1]">
                <input type="hidden" name="id" id="id" value="{{$layanan->id}}">

                <label for="layanan" class="font-semibold">Layanan:</label>
                <input type="text" name="layanan" id="layanan" required class="px-3 py-2 w-full border-[1px] border-[#9d9d9d] rounded-[3px] focus:outline-0"
                    value="{{ $layanan->layanan }}">

                <label for="text" class="font-semibold">Deskripsi:</label>
                <textarea name="text" id="text" rows="4" required class="px-3 py-2 w-full border-[1px] border-[#9d9d9d] rounded-[3px] focus:outline-0">{{$layanan->text}}</textarea>

                <label for="link" class="font-semibold">Link</label>
                <input type="text" name="link" id="link" class="px-3 py-2 w-full border-[1px] border-[#9d9d9d] rounded-[3px] focus:outline-0"
                    value="{{ $layanan->link }}">

                <button type="submit"
                    class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition w-fit cursor-pointer">
                    Submit
                </button>
            </div>
        </form>

    </div>
    <x-footer />
</body>

</html>
