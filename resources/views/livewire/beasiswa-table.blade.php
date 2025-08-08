<div class="flex flex-col items-center h-[100vh] m-[10px] lg:m-[40px] ">

    <div class="flex flex-col gap-[10px] mb-[10px] w-full">
        <input wire:model.debounce.300ms.live="search" type="text" name="search" id="search"
            placeholder="Cari Beasiswa"
            class="border-[1px] border-[#9d9d9d] px-[15px] py-[7px] focus:outline-0 rounded-lg text-[15px] w-[200px] lg:w-[325px]">
        {{-- <div class="hidden lg:flex flex-row ">
            <button wire:click="$set('jenjang', '')"
                class="bg-white px-3 py-2 border-[1px] border-[#e6e4e1] text-[15px] font-medium rounded-lg {{ $jenjang === '' ? 'font-bold' : '' }}">
                Semua Jenjang
            </button>
            @foreach ($jenjangList as $j)
                <button wire:click="$set('jenjang', '{{ $j }}')"
                    class="bg-white px-3 py-2 border-[1px] border-[#e6e4e1] text-[15px] font-medium rounded-lg {{ $jenjang === '' ? 'font-bold' : '' }}">
                    {{ $j }}
                </button>
            @endforeach
        </div> --}}

        <div class="flex flex-row gap-[10px]">
            <div class="relative w-fit">
                <select wire:model.live="jenjang"
                class="appearance-none text-[13px] lg:text-[15px] border-[#9d9d9d] border-[1px] px-[7px] lg:px-[10px] py-[5px] pr-[35px] lg:pr-[50px] rounded-md focus:outline-0 hover:border-[#ababab] cursor-pointer">
                    <option value="">Semua Jenjang</option>
                    @foreach ($jenjangList as $j)
                        <option value="{{ $j }}">{{ $j }}</option>
                    @endforeach
                </select>

                {{-- Custom chevron --}}
                <div class="pointer-events-none absolute right-3 top-[17px] transform -translate-y-1/2 text-gray-600">
                    ▼
                </div>
            </div>

            <div class="relative w-fit">
                <select wire:model.live="status"
                    class="appearance-none text-[13px] lg:text-[15px] border-[#9d9d9d] border-[1px] px-[7px] lg:px-[10px] py-[5px] pr-[35px] lg:pr-[50px] rounded-md focus:outline-0 hover:border-[#ababab] cursor-pointer">
                    <option value="">Semua Status</option>
                    @foreach ($statusList as $s)
                        <option value="{{ $s }}">{{ $s }}</option>
                    @endforeach
                </select>

                {{-- Custom chevron --}}
                <div class="pointer-events-none absolute right-3 top-[17px] transform -translate-y-1/2 text-gray-600">
                    ▼
                </div>
            </div>
        </div>

        <div class="flex flex-col items-center justify-center w-full lg:w-full lg:max-w-6xl">
            <div class="overflow-visible w-full">
                <table class="w-full border border-gray-300 table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th
                                class="border border-gray-300 text-[10px] lg:text-[17px] text-left p-[10px] lg:px-4 lg:py-2">
                                TITLE</th>
                            <th
                                class="border border-gray-300 text-[10px] lg:text-[17px] text-left p-[10px] lg:px-4 lg:py-2">
                                PROVIDER</th>
                            <th
                                class="border border-gray-300 text-[10px] lg:text-[17px] text-left p-[10px] lg:px-4 lg:py-2">
                                JENJANG</th>
                            <th
                                class="border border-gray-300 text-[10px] lg:text-[17px] text-left p-[10px] lg:px-4 lg:py-2">
                                QUOTA</th>
                            <th
                                class="border border-gray-300 text-[10px] lg:text-[17px] text-left p-[10px] lg:px-4 lg:py-2">
                                STATUS</th>
                            <th
                                class="border border-gray-300 text-[10px] lg:text-[17px] text-left p-[10px] lg:px-4 lg:py-2">
                                ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($beasiswas as $b)
                            <tr class="hover:bg-gray-50">
                                <td
                                    class="border border-gray-300 text-[10px] lg:text-[15px] p-[10px] lg:p-[0px] lg:px-4 lg:py-2">
                                    {{ $b->title }}</td>
                                <td
                                    class="border border-gray-300 text-[10px] lg:text-[15px] p-[10px] lg:p-[0px] lg:px-4 lg:py-2">
                                    {{ $b->provider }}</td>
                                <td
                                    class="border border-gray-300 text-[10px] lg:text-[15px] p-[10px] lg:p-[0px] lg:px-4 lg:py-2">
                                    {{ $b->jenjang }}</td>
                                <td
                                    class="border border-gray-300 text-[10px] lg:text-[15px] p-[10px] lg:p-[0px] lg:px-4 lg:py-2">
                                    {{ $b->quota }}</td>
                                <td
                                    class="border border-gray-300 text-[10px] lg:text-[15px] p-[10px] lg:p-[0px] lg:px-4 lg:py-2">
                                    {{ $b->status }}</td>

                                {{-- actions --}}
                                <td class="border border-gray-300 text-[10px] lg:text-[15px] p-2 text-center">
                                    <!-- Mobile dropdown using native <details> -->
                                    <details class="relative lg:hidden">
                                        <summary
                                            class="cursor-pointer list-none inline-flex items-center justify-center gap-1 bg-gray-100 border border-gray-300 rounded px-3 py-1 text-[12px] hover:bg-gray-200">
                                            <span>Actions</span>
                                            <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </summary>

                                        <div
                                            class="absolute right-0 mt-2 w-28 bg-white border border-gray-300 rounded shadow z-10">
                                            <a href="{{ route('beasiswa.detail', ['id' => $b->id]) }}"
                                                class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Detail</a>
                                            <a href="{{ route('beasiswa.edit', ['id' => $b->id]) }}"
                                                class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Edit</a>
                                            <a data-modal-target="deleteModal" data-modal-toggle="deleteModal"
                                                data-delete-url="{{ route('beasiswa.delete', ['id' => $b->id]) }}"
                                                class="cursor-pointer block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Delete</a>
                                            {{-- <button type="button" data-modal-target="deleteModal"
                                            data-modal-toggle="deleteModal"
                                            data-delete-url="{{ route('beasiswa.delete', ['id' => $b->id]) }}"
                                            class="w-full block text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                            Delete
                                        </button> --}}
                                        </div>
                                    </details>

                                    <!-- Desktop inline action buttons -->
                                    <div class="hidden lg:flex lg:flex-row lg:justify-center lg:space-x-4">
                                        <a href="{{ route('beasiswa.detail', ['id' => $b->id]) }}"
                                            class="text-blue-600 hover:underline">Detail</a>
                                        <a href="{{ route('beasiswa.edit', ['id' => $b->id]) }}"
                                            class="text-blue-600 hover:underline">Edit</a>
                                        <button type="button" data-modal-target="deleteModal"
                                            data-modal-toggle="deleteModal"
                                            data-delete-url="{{ route('beasiswa.delete', ['id' => $b->id]) }}"
                                            class="text-red-600 hover:underline">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>