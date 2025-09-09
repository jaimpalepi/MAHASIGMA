{{-- Memberitahu file ini untuk menggunakan layout admin utama --}}
@extends('layouts.admin')

{{-- Semua konten di bawah ini akan dimasukkan ke dalam @yield('content') di layout --}}
@section('content')
  <div class="mx-auto max-w-2xl">
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
      <div class="border-b border-stroke px-6.5 py-4 dark:border-strokedark">
        <h3 class="font-medium text-black dark:text-white">
          Pengaturan Situs
        </h3>
      </div>
      <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        <div class="p-6.5">
          {{-- Menampilkan pesan sukses setelah update --}}
          @if (session('success'))
            <div class="mb-4 rounded-md border border-green-500 bg-green-100 px-4 py-3 text-green-700">
              {{ session('success') }}
            </div>
          @endif

          <div class="mb-4.5">
            <label class="mb-2.5 block text-black dark:text-white">
              Jumlah Acara di Beranda
            </label>
            <input
              type="number"
              name="home_page_events_count"
              value="{{ $settings['home_page_events_count'] ?? 4 }}"
              placeholder="Masukkan angka"
              class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"
            />
            @error('home_page_events_count')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
          </div>

          <button class="flex w-full justify-center rounded bg-primary p-3 font-medium text-gray">
            Simpan Perubahan
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection
