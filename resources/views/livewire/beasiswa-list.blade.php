<div class="flex p-[50px] box-border justify-center">
    <div class="flex flex-col box-border justify-center items-center">
        <div class="flex box-border gap-[30px]">
            <div
                class="sidebar sticky top-[123px] bg-white border-[1px] border-[#e6e4e1] w-[300px] h-[400px] flex flex-col justify-start items-center gap-[10px] box-border p-[20px] rounded-[10px] shadow-lg">
                <h3 class="font-semibold text-[30px] leading-none text-[#544db0]">Jenjang</h3>
                <div class="w-full h-[1px] bg-[#544db0] m-[3px]"></div>
                <div class="jenjang flex flex-col w-full items-center justify-center gap-[15px]">
                    <p wire:click="$set('jenjang', '')"
                        class="bg-[#dfdfdf] hover:bg-[#afafaf] transition-all ease-in-out cursor-pointer w-[90%] h-[30px] rounded-[100px] text-center flex justify-center items-center {{ $jenjang === '' ? 'font-bold' : '' }}">
                        All
                    </p>

                    @foreach ($jenjangList as $j)
                        <p class="cursor-pointer bg-[#dfdfdf] hover:bg-[#afafaf] transition-all ease-in-out w-[90%] h-[30px] rounded-[100px] text-center flex justify-center items-center
                         {{ $jenjang === $j ? 'font-bold' : '' }}"
                            wire:click="$set('jenjang', '{{ $j }}')">
                            {{ $j }}
                        </p>
                    @endforeach
                </div>

            </div>
            <div class="flex flex-col items-center gap-[20px] ml-auto min-h-[100vh]">
                @foreach ($beasiswas as $b)
                    @php
                        $start = \Carbon\Carbon::parse($b->open);
                        $end = \Carbon\Carbon::parse($b->deadline);

                        $sameMonth = $start->month === $end->month;
                        $sameYear = $start->year === $end->year;
                    @endphp
                    <div onclick="window.location.href = 'beasiswa/{{ $b->id }}'"
                        class="cards flex justify-start border-[1px] border-[#e6e4e1] w-[930px] min-w-[500px] rounded-[10px] shadow-lg hover:cursor-pointer hover:scale-[1.01] transition-transform duration-200 box-border">
                        <img class="w-[350px] h-[250px] rounded-l-[10px] object-cover shrink-0 grow-0"
                            src="{{ asset('storage/' . $b->cover) }}" alt="">
                        <div
                            class="texts p-[15px] flex flex-col gap-[5px] h-[250px] w-full box-border min-w-0 overflow-hidden">
                            <h3 class="text-[20px] font-semibold truncate leading-none">{{ $b->title }}
                            </h3>
                            <p class="text-[17px] leading-none line-clamp-1 pb-[5px]">{{ $b->provider }}</p>
                            <div class="spacer-line bg-[#9d9d9d] h-[1px] w-full m-[3px]"></div>
                            <div class="grid grid-cols-5">
                                <div class="col-span-3 grid grid-cols-2 place-items-start">
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

                                    <div class="flex flex-col justify-center items-start w-full mt-[10px] ml-[20px]">
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

                                <p class="line-clamp-5 col-span-2">
                                    {{ $b->description }}
                                </p>
                            </div>
                            <p class="mt-auto ml-auto text-[13px]">{{ $b->created_at?->format('d M Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="mt-6 flex flex-col justify-center items-center">
            {{ $beasiswas->links('pagination::tailwind') }}
        </div>
    </div>
</div>
