<div class="flex flex-col lg:flex-row p-[20px] lg:p-[50px] box-border justify-start">

    <div class="flex flex-col box-border justify-center items-center">
        <div
            class="flex lg:flex-row flex-col box-border gap-[10px] lg:gap-[30px] w-full justify-center items-center lg:justify-start lg:items-start">
            <div
                class=" sidebar lg:sticky lg:top-[120px] lg:left-[50px] lg:bg-white lg:border-[1px] lg:border-[#e6e4e1] w-full lg:w-[300px] lg:h-auto   flex flex-col justify-start items-center gap-[10px] box-border p-[20px] rounded-[10px] lg:shadow-lg ">
                <input type="text" wire:model.live="search" placeholder="Cari Beasiswa"
                    class="w-full px-[10px] py-[5px] lg:px-[20px] lg:py-[10px] border-[1px] border-[#9d9d9d] rounded-4xl box-border focus:border-[#858282] focus:outline-0 transition-all ease-in-out">

                <h3
                    class="font-medium lg:font-semibold text-[20px] text-left mr-auto lg:text-[30px] leading-none text-[#544db0] mr-auto lg:mr-0">
                    Jenjang</h3>
                <div class="hidden lg:block w-full h-[1px] bg-[#544db0] m-[3px]"></div>
                <div class="hidden jenjang lg:flex flex-col w-full items-center justify-center gap-[15px]">
                    <p wire:click="$set('jenjang', '')"
                        class="bg-[#dfdfdf] hover:bg-[#afafaf] transition-all ease-in-out cursor-pointer w-[90%] h-[30px] rounded-[100px] text-center flex justify-center items-center {{ $jenjang === '' ? 'font-bold' : '' }}">
                        All
                    </p>

                    <p class="cursor-pointer bg-[#dfdfdf] hover:bg-[#afafaf] transition-all ease-in-out w-[90%] h-[30px] rounded-[100px] text-center flex justify-center items-center
                         {{ $jenjang === 'D3' ? 'font-bold' : '' }}"
                        wire:click="$set('jenjang', 'D3')">
                        D3
                    </p>

                    <p class="cursor-pointer bg-[#dfdfdf] hover:bg-[#afafaf] transition-all ease-in-out w-[90%] h-[30px] rounded-[100px] text-center flex justify-center items-center
                         {{ $jenjang === 'D4' ? 'font-bold' : '' }}"
                        wire:click="$set('jenjang', 'D4')">
                        D4
                    </p>

                    <p class="cursor-pointer bg-[#dfdfdf] hover:bg-[#afafaf] transition-all ease-in-out w-[90%] h-[30px] rounded-[100px] text-center flex justify-center items-center
                         {{ $jenjang === 'S1' ? 'font-bold' : '' }}"
                        wire:click="$set('jenjang', 'S1')">
                        S1
                    </p>

                    <p class="cursor-pointer bg-[#dfdfdf] hover:bg-[#afafaf] transition-all ease-in-out w-[90%] h-[30px] rounded-[100px] text-center flex justify-center items-center
                         {{ $jenjang === 'S2' ? 'font-bold' : '' }}"
                        wire:click="$set('jenjang', 'S2')">
                        S2
                    </p>

                    <p class="cursor-pointer bg-[#dfdfdf] hover:bg-[#afafaf] transition-all ease-in-out w-[90%] h-[30px] rounded-[100px] text-center flex justify-center items-center
                         {{ $jenjang === 'S3' ? 'font-bold' : '' }}"
                        wire:click="$set('jenjang', 'S3')">
                        S3
                    </p>
                </div>

                <div class="relative w-fit mr-auto">
                    <select wire:model.live="jenjang"
                        class="block lg:hidden appearance-none border-[#9d9d9d] border-[1px] px-[10px] py-2 pr-[50px] rounded-md focus:outline-0 hover:border-[#ababab] cursor-pointer">
                        <option value="">Semua Jenjang</option>
                        <option value="D3">D3</option>
                        <option value="D4">D4</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>

                    {{-- Custom chevron --}}
                    <div
                        class="block lg:hidden pointer-events-none absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-600">
                        ▼
                    </div>
                </div>



            </div>
            <div class="flex flex-col items-center gap-[20px] ml-0 lg:ml-auto min-h-[100vh]">
                @if ($beasiswas->count() > 0)
                    @foreach ($beasiswas as $b)
                        @php
                            $start = \Carbon\Carbon::parse($b->open);
                            $end = \Carbon\Carbon::parse($b->deadline);

                            $sameMonth = $start->month === $end->month;
                            $sameYear = $start->year === $end->year;
                        @endphp
                        <div onclick="window.location.href = 'beasiswa/{{ $b->id }}'"
                            class="cards relative flex flex-col lg:flex-row justify-start border-[1px] border-[#e6e4e1] w-[400px] lg:w-[930px]  rounded-[10px] shadow-lg hover:cursor-pointer hover:scale-[1.01] transition-transform duration-200 box-border overflow-hidden">
                            {{-- <img class="w-auto lg:w-[350px] h-[150px] lg:h-[250px] rounded-l-[10px] object-cover shrink-0 grow-0"
                            src="{{ asset('storage/' . $b->cover) }}" alt=""> --}}
                            <div
                                class="texts p-[15px] flex flex-col gap-[0px] h-auto lg:h-[270px] w-full box-border min-w-0 overflow-hidden">
                                <h3
                                    class="text-[15px] lg:text-[25px] font-semibold truncate leading-relaxed text-blue-500">
                                    {{ $b->title }}
                                </h3>
                                <p class="txt-[13px] font-medium lg:text-[17px] leading-relaxed line-clamp-1">
                                    {{ $b->provider }}
                                </p>

                                <div class="flex flex-row justify-start items-center w-full mt-[10px]">
                                    <div
                                        class=" box-border flex flex-col justify-start items-start w-[50%] border-r-[2px] border-[#9d9d9d]">
                                        <div class="flex justify-start items-center w-full">
                                            <p class="text-[17px] text-[#9d9d9d] font-regular leading-4">
                                                Jenjang:
                                            </p>
                                            <p class="text-[17px] text-gray-700 font-semibold">
                                                &nbsp{{ $b->jenjang }}
                                            </p>
                                        </div>

                                        <div class="benefits w-[300px] mt-[15px]">
                                            <p class="text-[20px] text-[#000000] font-semibold leading-4 mb-[10px]">
                                                Benefit Beasiswa
                                            </p>
                                            @php
                                                $limited = array_slice($b->benefits, 0, 3);
                                            @endphp

                                            <div
                                                class="text-[15px] text-gray-800 leading-relaxed grid grid-cols-1 lg:grid-cols-2 gap-[3px] lg:gap-[5px]">
                                                @foreach ($limited as $benefit)
                                                    <div class="flex justify-start items-center gap-[7px]">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"
                                                            class="size-4">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="m4.5 12.75 6 6 9-13.5" />
                                                        </svg>

                                                        <p class="truncate max-w-[150px]">{{ $benefit }}</p>
                                                    </div>
                                                @endforeach

                                                @if (count($b->benefits) > 3)
                                                    <p class="italic text-gray-500">…and more</p>
                                                @endif
                                            </div>
                                        </div>
                                        {{-- 
                                    <div class="flex flex-col justify-center items-start w-full ml-[20px]">
                                        <p class="text-[17px] text-[#9d9d9d] font-regular leading-4">
                                            Quota Diterima
                                        </p>
                                        <p class="text-[17px] text-gray-700 font-semibold">
                                            {{ $b->quota }} Orang
                                        </p>
                                    </div>

                                    <div class="flex flex-col justify-center items-start w-full">
                                        <p class="text-[17px] text-[#9d9d9d] font-regular leading-4">
                                            Periode Pendaftaran
                                        </p>
                                        <p class="text-[17px] text-gray-700 font-semibold">
                                            @if ($sameMonth && $sameYear)
                                                {{ $start->format('j') }}–{{ $end->format('j F Y') }}
                                            @elseif($sameYear)
                                                {{ $start->format('j F') }} – {{ $end->format('j F Y') }}
                                            @else
                                                {{ $start->format('j F Y') }} – {{ $end->format('j F Y') }}
                                            @endif
                                        </p>
                                    </div> --}}
                                    </div>

                                    <div
                                        class="flex flex-col justify-start items-start gap-[10px] box-border w-[50%] ml-[20px]">
                                        <div class="flex flex-col justify-center items-start w-full">
                                            <p class="text-[17px] text-[#9d9d9d] font-regular leading-4">
                                                Periode Pendaftaran
                                            </p>
                                            <p class="text-[17px] text-gray-700 font-semibold">
                                                @if ($sameMonth && $sameYear)
                                                    {{ $start->format('j') }}–{{ $end->format('j F Y') }}
                                                @elseif($sameYear)
                                                    {{ $start->format('j F') }} – {{ $end->format('j F Y') }}
                                                @else
                                                    {{ $start->format('j F Y') }} – {{ $end->format('j F Y') }}
                                                @endif
                                            </p>
                                        </div>

                                        <div class="flex flex-col justify-center items-start w-full">
                                            <p class="text-[17px] text-[#9d9d9d] font-regular leading-4">
                                                Quota Diterima
                                            </p>
                                            <p class="text-[17px] text-gray-700 font-semibold">
                                                {{ $b->quota }} Orang
                                            </p>
                                        </div>
                                    </div>

                                    {{-- <div class="benefits">
                                    <p class="text-[17px] text-[#9d9d9d] font-regular leading-4">
                                        Benefits
                                    </p>
                                    @php
                                        $limited = array_slice($b->benefits, 0, 3);
                                    @endphp

                                    <ul class="list-disc ml-6 text-[15px] text-gray-800 leading-relaxed">
                                        @foreach ($limited as $benefit)
                                            <li>{{ $benefit }}</li>
                                        @endforeach

                                        @if (count($b->benefits) > 3)
                                            <li class="italic text-gray-500">…and more</li>
                                        @endif
                                    </ul>


                                </div> --}}
                                    {{-- <p class="hidden lg:block line-clamp-5 col-span-2">
                                    {{ $b->description }}
                                </p> --}}
                                </div>
                                <p class="mt-[30px] ml-auto text-[13px] text-white font-medium">Posted:
                                    {{ $b->created_at?->format('d M Y') }}</p>

                            </div>
                            <div
                                class="bleu absolute rounded-tl-[30px] lg:rounded-0 bg-blue-500 w-[400px] h-[400px] bottom-[-350px] right-[-250px] lg:rotate-[125deg] lg:bottom-[-190px] lg:right-[-220px] z-[-1]">
                            </div>
                        </div>
                    @endforeach
                @else
                <h1 class="text-[30px] font-medium text-[#9d9d9d] ">Beasiswa yang dicari tidak ada...¯\_(ツ)_/¯</h1>
                @endif
            </div>
        </div>
        <div class="mt-6 flex flex-col justify-center items-center">
            {{ $beasiswas->links('pagination::tailwind') }}
        </div>
    </div>
</div>
