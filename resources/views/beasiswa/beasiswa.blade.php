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
    <title>BEASISWA UNSOED</title>
</head>

<body>
    <x-navbar />

    <div class="flex flex-col justify-center items-center">
        <div class="hero relative w-full h-[500px] overflow-hidden ">
            <img src="/image/bakushin.webp" alt="pingas" class="w-full h-full object-cover">

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>

            <!-- Text Overlay -->
            <h1 class="absolute bottom-11 left-6 text-white text-[80px] font-bold z-10">BEASISWA</h1>
            <p class="absolute bottom-6 left-6 text-white text-[30px] font-medium z-10">Chase your dreams, apply NOW!
            </p>
        </div>

        <div class="w-[1220px] flex flex-col justify-center items-center mt-[20px] mb-[20px]">
            @if ($beasiswas)
                <h1 class="text-[40px] font-semibold mr-auto mb-[20px]">Open Scholarship</h1>
                <div class="cardHolder grid grid-cols-3 gap-[30px] mb-[20px]">

                    {{-- cards goes here --}}
                    @foreach ($beasiswas as $b)
                        <div onclick="window.location.href = 'beasiswa/{{ $b->id }}'"
                            class="cards w-[300px] rounded-[10px] shadow-2xl hover:cursor-pointer hover:scale-[1.03] transition-transform duration-200">
                            <img class="w-full h-[200px] rounded-t-[10px]" src="{{ asset('storage/' . $b->cover) }}"
                                alt="">
                            <div class="texts p-[15px] flex flex-col gap-[3px] h-[170px]">
                                <h3 class="text-[20px] font-semibold truncate leading-none">{{ $b->title }}</h3>
                                <p class="text-[17px] leading-none">{{ $b->provider }}</p>
                                <p class="text-[15px] leading-none line-clamp-4 mt-[7px]">{{ $b->description }}</p>
                                <p class="mt-auto ml-auto text-[13px]">{{ $b->created_at?->format('d M Y') }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <h1 class="text-[40px] font-semibold">No Open Scholarship</h1>
            @endif
        </div>
    </div>



    {{-- <div class="flex flex-col justify-center items-center m-[20px] mt-[40px]">
        <div class="w-[1220px] flex flex-col justify-center items-center">
            <table class="w-full border border-gray-300 table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">TITLE</th>
                        <th class="border border-gray-300 px-4 py-2">DESCRIPTION</th>
                        <th class="border border-gray-300 px-4 py-2">PROVIDER</th>
                        <th class="border border-gray-300 px-4 py-2">AMOUNT</th>
                        <th class="border border-gray-300 px-4 py-2">QUOTA</th>
                        <th class="border border-gray-300 px-4 py-2">DEADLINE</th>
                        <th class="border border-gray-300 px-4 py-2">STATUS</th>
                        <th class="border border-gray-300 px-4 py-2">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beasiswas as $b)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">{{ $b->title }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $b->description }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $b->provider }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $b->amount }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $b->quota }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $b->deadline }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $b->status }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('apply.create', ['id' => $b->id]) }}"
                                    class="text-blue-600 hover:underline">Apply</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
    </div> {{-- penutup div utama konten --}}

    <x-footer />
</body>

</html>
</body>

</html>
