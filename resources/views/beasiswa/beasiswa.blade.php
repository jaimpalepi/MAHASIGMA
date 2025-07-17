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
        <div class="hero relative w-full h-[300px] lg:h-[calc(100vh-58px)] overflow-hidden">
            <img src="/image/bakushin.webp" alt="pingas" class="w-full h-full object-cover">

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-[#323945] to-transparent"></div>

            <!-- Text Overlay -->
            <h1 class="absolute bottom-7 lg:bottom-11 left-3.5 text-white text-[40px] lg:text-[80px] font-bold z-10">
                BEASISWA</h1>
            <p
                class="absolute bottom-4 lg:bottom-6 left-4 lg:left-6 text-white text-[15px] lg:text-[30px] font-medium z-10">
                Chase your dreams, apply NOW!
            </p>
        </div>

        <div class="w-[95%] box-border lg:w-[1220px] flex flex-col justify-center items-center mb-[20px]">

            <div class="spacer h-[100px] w-[1px]"></div>

            <h1 class="text-[100px] font-black p-0 m-0 text-center leading-[100px] text-[#fcd008]">
                EPSTEIN DID NOT KILL HIMSELF
            </h1>

            <h3 class="text-[20px] font-semibold mt-[20px]">Our Achievement</h3>
            <p class="text-[15px] font-medium mb-[10px]">No, not the guy who make the website, the thing dude, the
                website itself...just see below man</p>

            <div class="w-[1000px] bg-white border-[2px] border-[#fcd008] rounded-[10px] px-[10px] py-[20px]">
                <div class="grid grid-cols-3 divide-x divide-[#fcd008]">
                    <div class="counter px-[20px] text-center">
                        <h2 class="text-[40px] font-semibold leading-none mb-[5px] text-[#fcd008]">1 MORBILLION</h2>
                        <p class="text-[#fcd008]">Explanation bla bla bla (boring stuff)</p>
                    </div>
                    <div class="counter px-[20px] text-center">
                        <h2 class="text-[40px] font-semibold leading-none mb-[5px] text-[#fcd008]">1 MORBILLION</h2>
                        <p class="text-[#fcd008]">Explanation bla bla bla (boring stuff)</p>
                    </div>
                    <div class="counter px-[20px] text-center">
                        <h2 class="text-[40px] font-semibold leading-none mb-[5px] text-[#fcd008]">1 MORBILLION</h2>
                        <p class="text-[#fcd008]">Explanation bla bla bla (boring stuff)</p>
                    </div>
                </div>
            </div>



            <div class="spacer h-[50px] w-[1px]"></div>

            @if ($beasiswas)

                <div>
                    <h1 class="text-[40px] font-semibold mr-auto mb-[20px]">Beasiswa-Beasiswa Ini Akan Segera Tutup Pendaftaran!</h1>
                    <div
                        class="w-full cardHolder grid grid-cols-1 lg:grid-cols-3 gap-[30px] mb-[20px] place-items-center">

                        {{-- cards goes here --}}
                        @foreach ($beasiswas as $b)
                            <div onclick="window.location.href = 'beasiswa/{{ $b->id }}'"
                                class="cards relative w-[80%] rounded-[10px] shadow-2xl hover:cursor-pointer hover:scale-[1.03] transition-transform duration-200">
                                <img class="w-full h-[200px] rounded-t-[10px]" src="{{ asset('storage/' . $b->cover) }}"
                                    alt="">
                                <div class="bannerThingieShadow bg-red-700 absolute top-[83px] left-[13px] rotate-[45deg] z-[-10] w-[50px] h-[100px]"></div>
                                <div class="bannerThingie absolute bg-red-500 flex flex-col justify-center items-start p-[10px] left-[-15px] top-[150px] rounded-br-[20px]">
                                    <h2 class="text-[13px] font-medium text-white">
                                        DEADLINE PENDAFTARAN:
                                    </h2>
                                    <h2 class="text-[13px] font-medium text-white">
                                        {{$b->deadline}}
                                    </h2>
                                </div>
                                <div class="texts p-[15px] flex flex-col gap-[3px] h-[170px]">
                                    <h3 class="text-[20px] font-semibold truncate leading-none">{{ $b->title }}</h3>
                                    <p class="text-[17px] leading-none line-clamp-1">{{ $b->provider }}</p>
                                    <p class="text-[15px] leading-none line-clamp-4 mt-[7px]">{{ $b->description }}</p>
                                    <p class="mt-auto ml-auto text-[13px]">{{ $b->created_at?->format('d M Y') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="spacer h-[50px] w-[1px]"></div>

                <div>
                    <h1 class="text-[40px] font-semibold mr-auto mb-[20px]">Open Scholarship</h1>
                    <div
                        class="w-full cardHolder grid grid-cols-1 lg:grid-cols-3 gap-[30px] mb-[20px] place-items-center">

                        {{-- cards goes here --}}
                        @foreach ($beasiswas as $b)
                            <div onclick="window.location.href = 'beasiswa/{{ $b->id }}'"
                                class="cards w-[80%] rounded-[10px] shadow-2xl hover:cursor-pointer hover:scale-[1.03] transition-transform duration-200">
                                <img class="w-full h-[200px] rounded-t-[10px]" src="{{ asset('storage/' . $b->cover) }}"
                                    alt="">
                                <div class="texts p-[15px] flex flex-col gap-[3px] h-[170px]">
                                    <h3 class="text-[20px] font-semibold truncate leading-none">{{ $b->title }}</h3>
                                    <p class="text-[17px] leading-none line-clamp-1">{{ $b->provider }}</p>
                                    <p class="text-[15px] leading-none line-clamp-4 mt-[7px]">{{ $b->description }}</p>
                                    <p class="mt-auto ml-auto text-[13px]">{{ $b->created_at?->format('d M Y') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
