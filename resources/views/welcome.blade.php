<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <x-navbar />
        <h1>MAHASIGMA</h1>
        <div class="w-[1220px] flex flex-col justify-center items-center mt-[20px] mb-[50px]">
            <h1 class="text-[40px] font-semibold mr-auto mb-[20px]">Selamat Datang</h1>
            <div class="cardHolder grid grid-cols-3 gap-[30px]">

                {{-- cards goes here --}}
                @foreach ($artikel as $a)
                    <div onclick="window.location.href = 'artikel/{{$a->id}}'"
                        class="cards w-[300px] rounded-[10px] shadow-2xl hover:cursor-pointer hover:scale-[1.03] transition-transform duration-200">
                        <img class="w-full h-[200px] rounded-t-[10px]" src="{{ asset('storage/' . $a->cover) }}"
                            alt="">
                        <div class="texts p-[15px] flex flex-col gap-[3px] h-[170px]">
                            <h3 class="text-[20px] font-semibold truncate leading-none">{{ $a->judul }}</h3>
                            <!-- <p class="text-[15px] leading-none line-clamp-4 mt-[7px]">{{ $b->description }}</p> -->
                            <p class="mt-auto ml-auto text-[13px]">{{ $a->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <a href="{{ route('artikel.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
    Tambah Artikel
</a>

    <x-footer />
</body>
</html>