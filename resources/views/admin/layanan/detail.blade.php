<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Detail Layanan</title>
</head>

<body class="bg-gray-100">
    <x-navbar-artikel />
    <x-back-btn />

    <div class="flex flex-col items-center justify-center h-[100vh]">
        <div
            class="card flex flex-col items-start justify-center bg-white border-[1px] border-[#e6e4e1] w-[500px] p-[15px] rounded-md gap-[10px] shadow-lg">
            <h1 class="text-[30px] font-bold mr-auto text-blue-500">
                {{ $layanan->layanan }}
            </h1>
            <p class="text-[15px] text-justify font-regular">
                {{ $layanan->text }}
            </p>
            @if ($layanan->link)
                <div class="flex flex-col gap-[5px]">
                    <p class="text-[15px] font-regular text-[#3d3d3d]">*Link</p>
                    <a href="{{ route($layanan->link) }}"
                        class="text-[15px] px-[10px] py-[5px] bg-blue-500 rounded-[5px] text-white font-semibold hover:bg-blue-600 transition-all ease-in-out">
                        route('{{ $layanan->link }}')
                    </a>
                </div>
            @endif

            <div class="flex flex-row gap-[10px]">
                <a href="{{route('layanan.edit', ['id' => $layanan->id])}}" class="text-[20px] text-amber-400 hover:text-amber-500 transition-all ease-in-out font-regular underline">Edit</a>
                <a href="{{route('layanan.delete', ['id' => $layanan->id])}}" class="text-[20px] text-red-400 hover:text-red-500 transition-all ease-in-out font-regular underline">Delete</a>
            </div>

        </div>
    </div>

    <x-footer />
</body>

</html>
