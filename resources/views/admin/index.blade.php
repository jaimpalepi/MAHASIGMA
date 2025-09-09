{{-- Menggunakan layout utama yang sudah kita buat --}}
@extends('layouts.admin')

{{-- Mendefinisikan konten untuk bagian 'content' --}}
@section('content')
<div class="grid grid-cols-12 gap-4 md:gap-6">
    <div class="col-span-12 space-y-6 xl:col-span-7">
        

    {{-- Tampilkan tabel layanan menggunakan komponen Livewire yang sudah ada --}}
    <div class="col-span-12 mt-4 md:mt-6">
         <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Daftar Layanan</h3>
        @livewire('layanan-table')
    </div>
</div>
@endsection
