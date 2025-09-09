{{-- Memberitahu file ini untuk menggunakan layout admin utama --}}
@extends('layouts.admin')

{{-- Semua konten di bawah ini akan dimasukkan ke dalam @yield('content') di layout --}}
@section('content')
  <div class="mx-auto max-w-4xl">
    <div class="rounded-lg border border-stroke bg-white shadow-lg dark:border-strokedark dark:bg-boxdark">
      <div class="border-b border-stroke px-8 py-6 dark:border-strokedark">
        <h3 class="text-lg font-semibold text-black dark:text-white">
          Daftar Layanan
        </h3>
      </div>
      <div class="p-8">
        {{-- Tombol Tambah Layanan --}}
        <div class="mb-6 flex justify-between items-center">
          <button class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 focus:ring-4 focus:ring-green-300">
            Tambah Layanan
          </button>
          <input
            type="text"
            placeholder="Cari Layanan"
            class="w-1/3 rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary dark:border-strokedark dark:bg-form-input dark:focus:ring-primary"
          />
        </div>

        {{-- Tabel Layanan --}}
        <div class="overflow-x-auto">
          <table class="w-full border-collapse border border-gray-200 dark:border-strokedark">
            <thead class="bg-gray-100 dark:bg-strokedark">
              <tr>
                <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-600 dark:border-strokedark dark:text-white">LAYANAN</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-600 dark:border-strokedark dark:text-white">TEXT</th>
                <th class="border border-gray-200 px-4 py-2 text-left text-sm font-medium text-gray-600 dark:border-strokedark dark:text-white">LINK</th>
                <th class="border border-gray-200 px-4 py-2 text-center text-sm font-medium text-gray-600 dark:border-strokedark dark:text-white">ACTION</th>
              </tr>
            </thead>
            <tbody>
              <tr class="hover:bg-gray-50 dark:hover:bg-strokedark">
                <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700 dark:border-strokedark dark:text-white">affa</td>
                <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700 dark:border-strokedark dark:text-white">asffas</td>
                <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700 dark:border-strokedark dark:text-white">asffas</td>
                <td class="border border-gray-200 px-4 py-2 text-center">
                  <a href="#" class="text-blue-500 hover:underline">Edit</a>
                  <a href="#" class="text-red-500 hover:underline ml-4">Delete</a>
                </td>
              </tr>
              <tr class="hover:bg-gray-50 dark:hover:bg-strokedark">
                <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700 dark:border-strokedark dark:text-white">affa</td>
                <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700 dark:border-strokedark dark:text-white">asffas</td>
                <td class="border border-gray-200 px-4 py-2 text-sm text-gray-700 dark:border-strokedark dark:text-white">asffas</td>
                <td class="border border-gray-200 px-4 py-2 text-center">
                  <a href="#" class="text-blue-500 hover:underline">Edit</a>
                  <a href="#" class="text-red-500 hover:underline ml-4">Delete</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection