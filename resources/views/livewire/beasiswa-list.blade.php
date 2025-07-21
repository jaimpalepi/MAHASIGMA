<div class="flex p-[50px] box-border">
    <div class="sidebar bg-[#d7d7d7] w-[300px] flex flex-col justify-start items-center gap-[10px] box-border p-[20px]">
        <h3 class="font-semibold text-[20px]">Jenjang</h3>
        <div class="jenjang flex flex-col w-full items-center justify-center">
            <p wire:click="$set('jenjang', '')" class="cursor-pointer {{ $jenjang === '' ? 'font-bold' : '' }}">
                All
            </p>

            @foreach ($jenjangList as $j)
                <p class="cursor-pointer {{ $jenjang === $j ? 'font-bold' : '' }}"
                    wire:click="$set('jenjang', '{{ $j }}')">
                    {{ $j }}
                </p>
            @endforeach
        </div>

    </div>

    <div class="flex flex-col justify-center items-center gap-[15px] ml-auto">
        @foreach ($beasiswas as $b)
            @php
                $start = \Carbon\Carbon::parse($b->open);
                $end = \Carbon\Carbon::parse($b->deadline);

                $sameMonth = $start->month === $end->month;
                $sameYear = $start->year === $end->year;
            @endphp
            <div onclick="window.location.href = 'beasiswa/{{ $b->id }}'"
                class="cards flex justify-start border-[1px] border-[#e6e4e1] w-[700px] min-w-[500px] rounded-[10px] shadow-lg hover:cursor-pointer hover:scale-[1.03] transition-transform duration-200">
                <img class="w-[350px] h-[210px] rounded-l-[10px] object-cover" src="{{ asset('storage/' . $b->cover) }}"
                    alt="">
                <div class="texts p-[15px] flex flex-col gap-[3px] h-[210px] w-full">
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
        <div class="mt-4">
            {{ $beasiswas->links() }}
        </div>
    </div>
</div>
