{{-- Memberitahu file ini untuk menggunakan layout admin utama --}}
@extends('layouts.admin')

{{-- Semua konten di bawah ini akan dimasukkan ke dalam @yield('content') di layout --}}
@section('content')
  <div class="mx-auto max-w-4xl">
    <div class="rounded-lg border border-stroke bg-white shadow-lg dark:border-strokedark dark:bg-boxdark">
      <div class="border-b border-stroke px-8 py-6 dark:border-strokedark">
        <h3 class="text-lg font-semibold text-black">
          Daftar Layanan
        </h3>
      </div>
      <div class="p-8">
        <livewire:layanan-table />
        </div>
      </div>
    </div>
  </div>
@endsection