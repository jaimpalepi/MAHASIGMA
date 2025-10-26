@extends('layouts.admin')

@section('content')
<div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
    <div class="max-w-full">
        <h1 class="text-2xl font-bold mb-6 text-black dark:text-white">Detail Pengajuan Dispensasi</h1>

        <div class="bg-white dark:bg-boxdark rounded-sm border border-stroke p-6 space-y-4">
            <div>
                <h2 class="font-semibold text-black dark:text-white">Email Pengaju</h2>
                <p class="text-gray-600 dark:text-gray-300">{{ $dispen->email }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-black dark:text-white">Nama Acara</h2>
                <p class="text-gray-600 dark:text-gray-300">{{ $dispen->nama_acara }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-black dark:text-white">Tanggal Pelaksanaan</h2>
                <p class="text-gray-600 dark:text-gray-300">{{ \Carbon\Carbon::parse($dispen->waktu)->format('d M Y') }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-black dark:text-white">Tempat</h2>
                <p class="text-gray-600 dark:text-gray-300">{{ $dispen->tempat }}</p>
            </div>

            <div>
                <h2 class="font-semibold text-black dark:text-white">Daftar Mahasiswa</h2>
                <ul class="list-disc list-inside text-gray-600 dark:text-gray-300">
                    @foreach (json_decode($dispen->mahasiswa, true) as $nama)
                        <li>{{ $nama }}</li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h2 class="font-semibold text-black dark:text-white">Status</h2>
                <span class="px-3 py-1 rounded-full text-sm inline-block
                    @if ($dispen->status == 'Menunggu')
                        bg-warning bg-opacity-10 text-warning
                    @elseif ($dispen->status == 'Disetujui')
                        bg-success bg-opacity-10 text-success
                    @else
                        bg-danger bg-opacity-10 text-danger
                    @endif">
                    {{ $dispen->status }}
                </span>
            </div>

            <div class="mt-6 flex gap-3">
                <a href="{{ route('dispen.index') }}" 
                   class="inline-flex items-center justify-center rounded-md border border-primary py-2 px-6 text-center font-medium text-primary hover:bg-opacity-90">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection