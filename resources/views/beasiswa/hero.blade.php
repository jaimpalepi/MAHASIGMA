<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Edit Hero</title>
</head>

<body>
    <form action="{{ route('hero.update') }}" method="POST" enctype="multipart/form-data" class="m-[10px] lg:m-[30px]">
        @csrf
        <div class="flex flex-col items-start gap-4 max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
            <img src="{{ asset('storage/' . $hero->heroImage) }}" alt="Current Hero Image"
                class="w-full h-auto rounded-lg mb-2">

            <label class="block mb-2 text-sm font-medium text-gray-900" for="heroImage">Hero Image</label>
            <input
                class="block w-full text-sm px-3 py-2 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                aria-describedby="heroImage_help" id="heroImage" name="heroImage" type="file">
            <div class="mt-1 text-sm text-gray-500" id="heroImage_help">
                Leave blank if you don't want to change the
                hero image.
            </div>

            <label for="bigText" class="font-semibold">Teks Besar:</label>
            <input type="text" name="bigText" id="bigText" value="{{ $hero->bigText }}" required
                class="border px-3 py-2 w-full">

            <label for="smallText" class="font-semibold">Teks Kecil:</label>
            <input type="text" name="smallText" id="smallText" value="{{ $hero->smallText }}" required
                class="border px-3 py-2 w-full">

            <button type="submit"
                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition w-fit">
                Update Hero
            </button>
        </div>
    </form>
</body>

</html>
