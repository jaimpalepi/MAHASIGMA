<div class="px-4 md:px-20 py-10 grid md:grid-cols-3 gap-8 max-w-7xl mx-auto">
    <!-- Kartu Tombol -->
    <div class="flex flex-col space-y-4">
        @foreach ($layananList as $ll)
            <a wire:click="$set('serv', '{{ $ll }}')"
                class="bg-gray-200 hover:bg-gray-300 {{ $serv === $ll ? 'bg-gray-300' : '' }} text-black px-4 py-3 rounded font-semibold text-left cursor-pointer">
                {{ $ll }}
            </a>
        @endforeach
    </div>


    <!-- Info Kemahasiswaan -->
    <div class="md:col-span-2 bg-gray-200 p-6 rounded transition duration-300">
        <!-- Informasi Kemahasiswaan -->
        <div>
            <h2 class="text-xl font-bold mb-3">{{ $layananDetail->layanan }}</h2>
            <p class="text-sm mb-4">{{ $layananDetail->text }}</p>
        </div>

        @if ($layananDetail->link != null)
            <a href="{{ route($layananDetail->link) }}" class="text-blue-600 hover:underline text-sm font-medium">
                {{$layananDetail->layanan}} →
            </a>
        @endif


        {{-- 
        <!-- Beasiswa -->
        <div x-show="layanan === 'beasiswa'" x-transition>
            <h2 class="text-xl font-bold mb-3">Beasiswa</h2>
            <p class="text-sm mb-4">Tersedia berbagai jenis beasiswa seperti KIP-Kuliah, PPA, dan beasiswa dari
                mitra industri yang mendukung pembiayaan studi mahasiswa.</p>
            <a href="{{ route('beasiswa') }}"
                class="flex px-[15px] py-[7px] bg-blue-500 w-fit rounded-md text-white font-semibold text-[17px] hover:bg-blue-600 hover:scale-[1.05] transition-all ease-in-out">Portal
                Beasiswa UNSOED</a>
        </div>

        <!-- Proposal Kegiatan -->
        <div x-show="layanan === 'proposal'" x-transition>
            <h2 class="text-xl font-bold mb-3">Proposal Kegiatan</h2>
            <p class="text-sm mb-4">Mahasiswa dapat mengajukan proposal kegiatan organisasi untuk mendapatkan
                dukungan dan pendanaan dari universitas.</p>
        </div>

        <!-- Surat Dispensasi -->
        <div x-show="layanan === 'dispensasi'" x-transition>
            <h2 class="text-xl font-bold mb-3">Surat Dispensasi</h2>
            <p class="text-sm mb-4">
                Layanan ini memfasilitasi pengajuan surat dispensasi bagi mahasiswa yang mengikuti kegiatan di luar
                kampus yang berbenturan dengan jadwal kuliah.
            </p>

            @auth
                <a href="{{ route('dispen.index') }}" class="text-blue-600 hover:underline text-sm font-medium">
                    Lihat Dispensasi →
                </a>
            @else
                <a href="{{ route('dispen.create') }}" class="text-blue-600 hover:underline text-sm font-medium">
                    Ajukan Dispensasi →
                </a>
            @endauth
        </div> --}}

    </div>
</div>
