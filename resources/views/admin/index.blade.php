{{-- Menggunakan layout utama yang sudah kita buat --}}
@extends('layouts.admin')

{{-- Mendefinisikan konten untuk bagian 'content' --}}
@section('content')
<div class="grid grid-cols-12 gap-4 md:gap-6">
    <div class="col-span-12 space-y-6 xl:col-span-7">
        <!-- Metric Group One -->
        {{-- Nanti Anda bisa membuat partials untuk ini juga --}}
        {{-- @include('admin.partials.metric-group.metric-group-01') --}}
        <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <p>Ini adalah area untuk statistik (Metric Group).</p>
        </div>

        <!-- ====== Chart One Start -->
        {{-- @include('admin.partials.chart.chart-01') --}}
        <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <p>Ini adalah area untuk Grafik 1.</p>
        </div>
        <!-- ====== Chart One End -->
    </div>
    <div class="col-span-12 xl:col-span-5">
        <!-- ====== Chart Two Start -->
        {{-- @include('admin.partials.chart.chart-02') --}}
        <div class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark">
            <p>Ini adalah area untuk Grafik 2.</p>
        </div>
        <!-- ====== Chart Two End -->
    </div>

    {{-- Tampilkan tabel layanan menggunakan komponen Livewire yang sudah ada --}}
    <div class="col-span-12 mt-4 md:mt-6">
         <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Daftar Layanan</h3>
        @livewire('layanan-table')
    </div>
</div>
@endsection
