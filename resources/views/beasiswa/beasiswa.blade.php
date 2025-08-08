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
        @if (Auth::check() && Auth::user()->role == 'admin')
            {{-- <a href="{{route('hero.edit')}}">aaa</a> --}}

            <div onclick="window.location.href='{{ route('hero.edit') }}'"
                class="hero relative w-full h-[300px] lg:h-[calc(100vh-58px)] overflow-hidden hover:cursor-pointer hover:brightness-[0.6]k">
                <img src="{{ asset('storage/' . $hero->heroImage) }}" alt="pingas" class="w-full h-full object-cover">

                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-[#323945] to-transparent"></div>

                <!-- Text Overlay -->
                <h1
                    class="absolute bottom-7 lg:bottom-11 left-3.5 text-white text-[40px] lg:text-[80px] font-bold z-10">
                    {{ $hero->bigText }}</h1>
                <p
                    class="absolute bottom-4 lg:bottom-6 left-4 lg:left-6 text-white text-[15px] lg:text-[30px] font-medium z-10">
                    {{ $hero->smallText }}
                </p>
            </div>
        @else
            <div class="hero relative w-full h-[300px] lg:h-[calc(100vh-58px)] overflow-hidden">
                <img src="{{ asset('storage/' . $hero->heroImage) }}" alt="pingas" class="w-full h-full object-cover">

                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-[#323945] to-transparent"></div>

                <!-- Text Overlay -->
                <h1
                    class="absolute bottom-7 lg:bottom-11 left-3.5 text-white text-[40px] lg:text-[80px] font-bold z-10">
                    {{ $hero->bigText }}</h1>
                <p
                    class="absolute bottom-4 lg:bottom-6 left-4 lg:left-6 text-white text-[15px] lg:text-[30px] font-medium z-10">
                    {{ $hero->smallText }}
                </p>
            </div>
        @endif

        <div class="spacer h-[50px] lg:h-[100px] w-[1px]"></div>

        <div class="w-[95%] box-border lg:w-[1220px] flex flex-col justify-center items-center mb-[100px]">


            <h1
                class="text-[35px] lg:text-[100px] font-black p-0 m-0 text-center leading-none lg:leading-[100px] text-[#fcd008]">
                {{ $beasiswas->where('status', '!=', 'closed')->count() }} Beasiswa Tersedia!
            </h1>

            <div class="spacer h-[50px] lg:h-[100px] w-[1px]"></div>

            @if (!$beasiswas->isEmpty())
                @if (!$beasiswaSoonEnd->isEmpty())

                    <div class="w-full">
                        <h1 class="text-[20px] lg:text-[40px] font-semibold mr-auto mb-[20px]">Beasiswa-Beasiswa Ini
                            Akan Segera Tutup
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
                                    <div class="texts p-[15px] flex flex-col w-full gap-[3px] h-[230px]">
                                        <h3 class="text-[25px] font-bold truncate text-blue-500">{{ $b->title }}
                                        </h3>
                                        <p class="text-[17px] leading-none line-clamp-1 pb-[10px] text-blue-700">
                                            {{ $b->provider }}</p>
                                        <div class="grid grid-cols-2">
                                            <div class="flex flex-col justify-center items-start w-full mt-[10px]">
                                                <p class="text-[15px] text-[#9d9d9d] text-regular leading-4">
                                                    Periode Pendaftaran
                                                </p>
                                                <p class="text-[15px] text-gray-700 font-semibold line-clamp-1">
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
                                        <p class="mt-auto ml-auto text-[13px] text-[#9d9d9d]">Posted:
                                            {{ $b->created_at?->format('d M Y') }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="spacer h-[50px] w-[1px]"></div>
                @endif


                <div class="w-full">
                    <h1 class="text-[20px] lg:text-[40px] font-semibold mr-auto mb-[20px]">Beasiswa-Beasiswa Ini
                        Beasiswa yang Terbuka
                    </h1>
                    <div
                        class="w-full cardHolder grid grid-cols-1 lg:grid-cols-3 gap-[30px] mb-[20px] place-items-center">
                        @foreach ($beasiswas as $b)
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

                                @if (\Carbon\Carbon::parse($b->deadline)->isPast())
                                    <div
                                        class="bannerThingieShadow bg-gray-600 absolute top-[83px] left-[13px] rotate-[45deg] z-[-10] w-[50px] h-[100px]">
                                    </div>
                                    <div
                                        class="bannerThingie absolute bg-gray-500 flex flex-col justify-center items-start p-[10px] left-[-15px] top-[150px] rounded-br-[20px]">
                                        <h2 class="text-[13px] font-medium text-white">
                                            DEADLINE PENDAFTARAN:
                                        </h2>
                                        <h2 class="text-[13px] font-medium text-white">
                                            {{ $b->deadline }}
                                        </h2>
                                    </div>

                                    {{-- <div
                                        class="bannerThingieShadow bg-gray-600 absolute top-[83px] left-[13px] rotate-[45deg] z-[-10] w-[50px] h-[100px]">
                                    </div>
                                    <div
                                        class="bannerThingie absolute bg-gray-500 flex flex-col justify-center items-start p-[10px] left-[-15px] top-[150px] rounded-br-[20px]">
                                        <h2 class="text-[13px] font-medium text-white">
                                            DEADLINE PENDAFTARAN:
                                        </h2>
                                        <h2 class="text-[13px] font-medium text-white">
                                            {{ $b->deadline }}
                                        </h2>
                                    </div> --}}
                                @else
                                    <div
                                        class="bannerThingieShadow bg-green-600 absolute top-[83px] left-[13px] rotate-[45deg] z-[-10] w-[50px] h-[100px]">
                                    </div>
                                    <div
                                        class="bannerThingie absolute bg-green-500 flex flex-col justify-center items-start p-[10px] left-[-15px] top-[150px] rounded-br-[20px]">
                                        <h2 class="text-[13px] font-medium text-white">
                                            DEADLINE PENDAFTARAN:
                                        </h2>
                                        <h2 class="text-[13px] font-medium text-white">
                                            {{ $b->deadline }}
                                        </h2>
                                    </div>

                                    {{-- <div
                                        class="bannerThingieShadow bg-green-600 absolute top-[83px] left-[13px] rotate-[45deg] z-[-10] w-[50px] h-[100px]">
                                    </div>
                                    <div
                                        class="bannerThingie absolute bg-green-500 flex flex-col justify-center items-start p-[10px] left-[-15px] top-[150px] rounded-br-[20px]">
                                        <h2 class="text-[13px] font-medium text-white">
                                            DEADLINE PENDAFTARAN:
                                        </h2>
                                        <h2 class="text-[13px] font-medium text-white">
                                            {{ $b->deadline }}
                                        </h2>
                                    </div> --}}
                                @endif


                                <div class="texts p-[15px] flex flex-col w-full gap-[3px] h-[230px]">
                                    <h3 class="text-[25px] font-bold truncate text-blue-500">{{ $b->title }}
                                    </h3>
                                    <p class="text-[17px] leading-none line-clamp-1 pb-[10px] text-blue-700">
                                        {{ $b->provider }}</p>
                                    <div class="grid grid-cols-2">
                                        <div class="flex flex-col justify-center items-start w-full mt-[10px]">
                                            <p class="text-[15px] text-[#9d9d9d] text-regular leading-4">
                                                Periode Pendaftaran
                                            </p>
                                            <p class="text-[15px] text-gray-700 font-semibold line-clamp-1">
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
                                    <p class="mt-auto ml-auto text-[13px] text-[#9d9d9d]">Posted:
                                        {{ $b->created_at?->format('d M Y') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button onclick="window.location.href='{{ route('beasiswa.all') }}'"
                    class="bg-[#544db0] text-white text-[25px] font-semibold block p-[30px] mt-[40px] rounded-[50px] hover:bg-[#533991] transition-all ease-in-out hover:cursor-pointer">
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
