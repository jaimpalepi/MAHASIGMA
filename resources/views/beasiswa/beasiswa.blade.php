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

        <div class="spacer h-[50px] lg:h-[100px] w-[1px]"></div>

        <div class="w-[95%] box-border lg:w-[1220px] flex flex-col justify-center items-center mb-[100px]">


            <h1 class="text-[35px] lg:text-[100px] font-black p-0 m-0 text-center leading-none lg:leading-[100px] text-[#fcd008]">
                dolorem ipsum quia dolor sit amet
            </h1>

            <h3 class="text-[20px] font-semibold mt-[10px] lg:mt-[20px]">Our Achievement</h3>
            <p class="text-[15px] font-medium mb-[10px] text-center text-[#9d9d9d]">
                Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...
            </p>

            <div class="w-[90%] lg:w-[1000px] bg-white border-[2px] border-[#fcd008] rounded-[10px] px-[20px] lg:px-[10px] py-[10px] lg:py-[20px]">
                <div class="grid grid-cols-1 lg:grid-cols-3 divide-y lg:divide-y-0 lg:divide-x divide-[#fcd008]">
                    <div class="counter py-[10px] lg:px-[20px] text-center">
                        <h2 class="text-[40px] font-semibold leading-none mb-[5px] text-[#fcd008]">1 MORBILLION</h2>
                        <p class="text-[#fcd008]">Explanation bla bla bla (boring stuff)</p>
                    </div>
                    <div class="counter py-[10px] lg:px-[20px] text-center">
                        <h2 class="text-[40px] font-semibold leading-none mb-[5px] text-[#fcd008]">1 MORBILLION</h2>
                        <p class="text-[#fcd008]">Explanation bla bla bla (boring stuff)</p>
                    </div>
                    <div class="counter py-[10px] lg:px-[20px] text-center">
                        <h2 class="text-[40px] font-semibold leading-none mb-[5px] text-[#fcd008]">1 MORBILLION</h2>
                        <p class="text-[#fcd008]">Explanation bla bla bla (boring stuff)</p>
                    </div>
                </div>
            </div>



            <div class="spacer h-[50px] w-[1px]"></div>

            @if (!$beasiswas->isEmpty())
                @if (!$beasiswaSoonEnd->isEmpty())

                    <div>
                        <h1 class="text-[20px] lg:text-[40px] font-semibold mr-auto mb-[20px]">Beasiswa-Beasiswa Ini Akan Segera Tutup
                            Pendaftaran!</h1>
                        <div
                            class="w-full cardHolder grid grid-cols-1 lg:grid-cols-3 gap-[30px] mb-[20px] place-items-center">
                            {{-- cards goes here --}}
                            @foreach ($beasiswaSoonEnd as $b)
                                @php
                                    $start = \Carbon\Carbon::parse($b->open);
                                    $end = \Carbon\Carbon::parse($b->deadline);

                                    $sameMonth = $start->month === $end->month;
                                    $sameYear = $start->year === $end->year;
                                @endphp

                                <div onclick="window.location.href = 'beasiswa/{{ $b->id }}'"
                                    class="cards  border-[1px] border-[#e6e4e1] relative w-[95%] min-w-[372px] rounded-[10px] shadow-2xl hover:cursor-pointer hover:scale-[1.03] transition-transform duration-200">
                                    <img class="w-full h-[200px] rounded-t-[10px] object-cover"
                                        src="{{ asset('storage/' . $b->cover) }}" alt="">
                                    <div
                                        class="bannerThingieShadow bg-red-700 absolute top-[83px] left-[13px] rotate-[45deg] z-[-10] w-[50px] h-[100px]">
                                    </div>
                                    <div
                                        class="bannerThingie absolute bg-red-500 flex flex-col justify-center items-start p-[10px] left-[-15px] top-[150px] rounded-br-[20px]">
                                        <h2 class="text-[13px] font-medium text-white">
                                            DEADLINE PENDAFTARAN:
                                        </h2>
                                        <h2 class="text-[13px] font-medium text-white">
                                            {{ $b->deadline }}
                                        </h2>
                                    </div>
                                    <div class="texts p-[15px] flex flex-col w-full gap-[3px] h-[210px]">
                                        <h3 class="text-[20px] font-semibold truncate leading-none">{{ $b->title }}
                                        </h3>
                                        <p class="text-[17px] leading-none line-clamp-1">{{ $b->provider }}</p>
                                        <div class="grid grid-cols-2">
                                            <div class="flex flex-col justify-center items-start w-full mt-[10px]">
                                                <p class="text-[15px] text-[#9d9d9d] text-regular leading-4">
                                                    Periode Pendaftaran
                                                </p>
                                                <p class="text-[15px] text-gray-700 font-semibold">
                                                    @if ($sameMonth && $sameYear)
                                                        {{ $start->format('j') }}–{{ $end->format('j F Y') }}
                                                    @elseif($sameYear)
                                                        {{ $start->format('j F') }} – {{ $end->format('j F Y') }}
                                                    @else
                                                        {{ $start->format('j F Y') }} – {{ $end->format('j F Y') }}
                                                    @endif
                                                </p>
                                            </div>

                                            <div class="flex flex-col justify-center items-start w-full mt-[10px]">
                                                <p class="text-[15px] text-[#9d9d9d] text-regular leading-4">
                                                    Quota Diterima
                                                </p>
                                                <p class="text-[15px] text-gray-700 font-semibold">
                                                    {{ $b->quota }}
                                                </p>
                                            </div>

                                            <div class="flex flex-col justify-center items-start w-full mt-[10px]">
                                                <p class="text-[15px] text-[#9d9d9d] text-regular leading-4">
                                                    Jenjang
                                                </p>
                                                <p class="text-[15px] text-gray-700 font-semibold">
                                                    {{ $b->jenjang }}
                                                </p>
                                            </div>

                                        </div>
                                        <p class="mt-auto ml-auto text-[13px]">{{ $b->created_at?->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="spacer h-[50px] w-[1px]"></div>
                @endif


                <div>
                    <h1 class="text-[20px] lg:text-[40px] font-semibold mr-auto mb-[20px]">Open Scholarship</h1>
                    <div
                        class="w-full cardHolder grid grid-cols-1 lg:grid-cols-3 gap-[30px] mb-[20px] place-items-center">

                        {{-- cards goes here --}}
                        @foreach ($beasiswas as $b)
                            <div onclick="window.location.href = 'beasiswa/{{ $b->id }}'"
                                class="cards border-[1px] border-[#e6e4e1] w-[95%] min-w-[372px] rounded-[10px] shadow-2xl hover:cursor-pointer hover:scale-[1.03] transition-transform duration-200">
                                <img class="w-full h-[200px] rounded-t-[10px] obeject-cover"
                                    src="{{ asset('storage/' . $b->cover) }}" alt="">
                                <div class="texts p-[15px] flex flex-col gap-[3px] h-[210px]">
                                    <h3 class="text-[20px] font-semibold truncate leading-none">{{ $b->title }}
                                    </h3>
                                    <p class="text-[17px] leading-none line-clamp-1">{{ $b->provider }}</p>

                                    <div class="grid grid-cols-2">
                                        <div class="flex flex-col justify-center items-start w-full mt-[10px]">
                                            <p class="text-[15px] text-[#9d9d9d] text-regular leading-4">
                                                Periode Pendaftaran
                                            </p>
                                            <p class="text-[15px] text-gray-700 font-semibold">
                                                @if ($sameMonth && $sameYear)
                                                    {{ $start->format('j') }}–{{ $end->format('j F Y') }}
                                                @elseif($sameYear)
                                                    {{ $start->format('j F') }} – {{ $end->format('j F Y') }}
                                                @else
                                                    {{ $start->format('j F Y') }} – {{ $end->format('j F Y') }}
                                                @endif
                                            </p>
                                        </div>

                                        <div class="flex flex-col justify-center items-start w-full mt-[10px]">
                                            <p class="text-[15px] text-[#9d9d9d] text-regular leading-4">
                                                Quota Diterima
                                            </p>
                                            <p class="text-[15px] text-gray-700 font-semibold">
                                                {{ $b->quota }}
                                            </p>
                                        </div>

                                        <div class="flex flex-col justify-center items-start w-full mt-[10px]">
                                            <p class="text-[15px] text-[#9d9d9d] text-regular leading-4">
                                                Jenjang
                                            </p>
                                            <p class="text-[15px] text-gray-700 font-semibold">
                                                {{ $b->jenjang }}
                                            </p>
                                        </div>

                                    </div>

                                    <p class="mt-auto ml-auto text-[13px]">{{ $b->created_at?->format('d M Y') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button class="bg-[#544db0] text-white text-[25px] font-semibold block p-[30px] mt-[40px] rounded-[50px] hover:bg-[#533991] transition-all ease-in-out hover:cursor-pointer">
                    <p class="leading-0 p-0 m-0 mb-[5px]">
                        Lihat Selengkapnya
                    </p>                  
                </button>
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
