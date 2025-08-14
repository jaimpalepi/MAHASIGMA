<div class="flex flex-col items-center h-[100vh] m-[10px] lg:m-[40px] ">

    <div class="flex flex-col gap-[10px] mb-[10px] w-full">
        <a href="{{ route('layanan.add') }}"
            class="bg-[#61ba6e] text-white font-medium text-[20px] w-fit px-[10px] py-[5px] rounded-[5px] hover:bg-[#50a36e] transition-all ease-in-out">
            Tambah Layanan
        </a>
        <input wire:model.debounce.300ms.live="search" type="text" name="search" id="search"
            placeholder="Cari Layanan"
            class="border-[1px] border-[#9d9d9d] px-[15px] py-[7px] focus:outline-0 rounded-lg text-[15px] w-[200px] lg:w-[325px]">

        <div class="flex flex-col items-center justify-center lg:w-full">
            <div class="overflow-visible w-full">
                @if ($layanans->count() > 0)
                    <table class="w-full border border-gray-300 table-auto">
                        <thead class="bg-gray-100">
                            <tr>
                                <th
                                    class="border border-gray-300 text-[10px] lg:text-[17px] text-left p-[10px] lg:px-4 lg:py-2">
                                    LAYANAN</th>
                                <th
                                    class="border border-gray-300 text-[10px] lg:text-[17px] text-left p-[10px] lg:px-4 lg:py-2">
                                    TEXT</th>
                                <th
                                    class="border border-gray-300 text-[10px] lg:text-[17px] text-left p-[10px] lg:px-4 lg:py-2">
                                    LINK</th>
                                <th
                                    class="border border-gray-300 text-[10px] lg:text-[17px] text-left p-[10px] lg:px-4 lg:py-2">
                                    ACTION</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($layanans as $l)
                                <tr class="">
                                    <td
                                        class="border border-gray-300 text-[10px] lg:text-[15px] p-[10px] lg:p-[0px] lg:px-4 lg:py-2">
                                        {{ $l->layanan }}</td>
                                    <td
                                        class="border border-gray-300 text-[10px] lg:text-[15px] p-[10px] lg:p-[0px] lg:px-4 lg:py-2">
                                        {{ $l->text }}</td>
                                    <td
                                        class="border border-gray-300 text-[10px] lg:text-[15px] p-[10px] lg:p-[0px] lg:px-4 lg:py-2">
                                        {{ $l->link }}</td>

                                    <td class="border border-gray-300 text-[10px] lg:text-[15px] p-2 text-center">
                                        <details class="relative lg:hidden">
                                            <summary
                                                class="cursor-pointer list-none inline-flex items-center justify-center gap-1 bg-gray-100 border border-gray-300 rounded px-3 py-1 text-[12px] hover:bg-gray-200">
                                                <span>Actions</span>
                                                <svg class="w-3 h-3" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M19 9l-7 7-7-7" />
                                                </svg>
                                            </summary>

                                            <div
                                                class="absolute right-0 mt-2 w-28 bg-white border border-gray-300 rounded shadow z-10">
                                                <a href="{{ route('layanan.detail', ['id' => $l->id]) }}"
                                                    class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Detail</a>
                                                <a href="{{ route('layanan.edit', ['id' => $l->id]) }}"
                                                    class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100">Edit</a>
                                                <a data-modal-target="deleteModal" data-modal-toggle="deleteModal"
                                                    data-delete-url="{{ route('layanan.delete', ['id' => $l->id]) }}"
                                                    class="cursor-pointer block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Delete</a>

                                            </div>
                                        </details>

                                        <!-- Desktop inline action buttons -->
                                        <div class="hidden lg:flex lg:flex-row lg:justify-center lg:space-x-4">
                                            <a href="{{ route('layanan.detail', ['id' => $l->id]) }}"
                                                class="text-blue-600 hover:underline">Detail</a>
                                            <a href="{{ route('layanan.edit', ['id' => $l->id]) }}"
                                                class="text-blue-600 hover:underline">Edit</a>
                                            <button type="button" data-modal-target="deleteModal"
                                                data-modal-toggle="deleteModal"
                                                data-delete-url="{{ route('layanan.delete', ['id' => $l->id]) }}"
                                                class="text-red-600 hover:underline">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <h1 class="text-[30px] font-medium text-[#9d9d9d] ">Layanan yang dicari tidak ada...¯\_(ツ)_/¯</h1>
                @endif
            </div>
        </div>
    </div>
</div>
