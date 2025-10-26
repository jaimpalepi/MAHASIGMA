@extends('layouts.admin')

@section('content')
<div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
    <div class="flex justify-between mb-6">
        <h2 class="text-xl font-semibold text-black dark:text-white">
            Daftar Pengajuan Dispensasi
        </h2>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
            {{ session('success') }}
        </div>
    @endif

    @if ($dispens->isEmpty())
        <p class="text-gray-500 dark:text-gray-400">Belum ada pengajuan dispensasi.</p>
    @else
        <div class="max-w-full overflow-x-auto">
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-2 text-left dark:bg-meta-4">
                        <th class="min-w-[50px] py-4 px-4 font-medium text-black dark:text-white">
                            No
                        </th>
                        <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white">
                            Nama Acara
                        </th>
                        <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                            Tanggal
                        </th>
                        <th class="min-w-[100px] py-4 px-4 font-medium text-black dark:text-white">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dispens as $index => $item)
                        <tr>
                            <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                {{ $index + 1 }}
                            </td>
                            <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                {{ $item->nama_acara }}
                            </td>
                            <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                {{ \Carbon\Carbon::parse($item->waktu)->format('d M Y') }}
                            </td>
                            <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                                <a href="{{ route('dispen.show', $item->id) }}" 
                                   class="inline-flex items-center justify-center rounded-md border border-primary py-2 px-4 text-center font-medium text-primary hover:bg-opacity-90 lg:px-3">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection