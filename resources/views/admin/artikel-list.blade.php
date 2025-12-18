<?php /* Prevent PHP parser error in editors by starting file in PHP mode then closing */ ?>

@extends('layouts.admin')

@section('content')
<div class="rounded-sm border border-stroke bg-white px-5 pt-6 pb-2.5 shadow-default dark:border-strokedark dark:bg-boxdark sm:px-7.5 xl:pb-1">
    <div class="flex justify-between mb-6">
        <h4 class="text-xl font-semibold text-black dark:text-white">
            Daftar Artikel
        </h4>
        <a href="{{ route('artikel.create') }}" 
           class="inline-flex items-center justify-center bg-primary py-2 px-6 text-green hover:bg-opacity-90 rounded-md">
            Tambah Artikel
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-full overflow-x-auto">
        <table class="w-full table-auto">
            <thead>
                <tr class="bg-gray-2 text-left dark:bg-meta-4">
                    <th class="min-w-[220px] py-4 px-4 font-medium text-black dark:text-white xl:pl-11">
                        Judul
                    </th>
                    <!-- <th class="min-w-[150px] py-4 px-4 font-medium text-black dark:text-white">
                        Kategori
                    </th> -->
                    <th class="min-w-[120px] py-4 px-4 font-medium text-black dark:text-white">
                        Tanggal Dibuat
                    </th>
                    <th class="py-4 px-4 font-medium text-black dark:text-white">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($artikels as $artikel)
                    <tr>
                        <td class="border-b border-[#eee] py-5 px-4 pl-9 dark:border-strokedark xl:pl-11">
                            <h5 class="font-medium text-black dark:text-white">
                                {{ $artikel->judul }}
                            </h5>
                        </td>
                        <!-- <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                            <span class="inline-flex rounded-full bg-primary bg-opacity-10 py-1 px-3 text-sm font-medium text-primary">
                                {{ $artikel->kategori }}
                            </span>
                        </td> -->
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                            <p class="text-black dark:text-white">
                                {{ $artikel->created_at->format('d M Y') }}
                            </p>
                        </td>
                        <td class="border-b border-[#eee] py-5 px-4 dark:border-strokedark">
                            <div class="flex items-center space-x-3.5">
                                <a href="{{ route('artikel.edit', $artikel->id) }}" 
                                   class="hover:text-primary">
                                    <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.99981 14.8219C3.43106 14.8219 0.674805 9.50624 0.562305 9.28124C0.47793 9.11249 0.47793 8.88749 0.562305 8.71874C0.674805 8.49374 3.43106 3.17812 8.99981 3.17812C14.5686 3.17812 17.3248 8.49374 17.4373 8.71874C17.5217 8.88749 17.5217 9.11249 17.4373 9.28124C17.3248 9.50624 14.5686 14.8219 8.99981 14.8219ZM1.85605 8.99999C2.4748 10.0406 4.89356 13.9562 8.99981 13.9562C13.1061 13.9562 15.5248 10.0406 16.1436 8.99999C15.5248 7.95936 13.1061 4.04374 8.99981 4.04374C4.89356 4.04374 2.4748 7.95936 1.85605 8.99999Z"
                                            fill="" />
                                        <path
                                            d="M9 11.3906C7.67812 11.3906 6.60938 10.3219 6.60938 9C6.60938 7.67813 7.67812 6.60938 9 6.60938C10.3219 6.60938 11.3906 7.67813 11.3906 9C11.3906 10.3219 10.3219 11.3906 9 11.3906ZM9 7.47188C8.15625 7.47188 7.47188 8.15625 7.47188 9C7.47188 9.84375 8.15625 10.5281 9 10.5281C9.84375 10.5281 10.5281 9.84375 10.5281 9C10.5281 8.15625 9.84375 7.47188 9 7.47188Z"
                                            fill="" />
                                    </svg>
                                </a>
                                <form action="{{ route('artikel.destroy', $artikel->id) }}" 
                                      method="POST" 
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="hover:text-red-600">
                                        <svg class="fill-current" width="18" height="18" viewBox="0 0 18 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.7535 2.47502H11.5879V1.9969C11.5879 1.15315 10.9129 0.478149 10.0691 0.478149H7.93145C7.08771 0.478149 6.41271 1.15315 6.41271 1.9969V2.47502H4.24709C3.14084 2.47502 2.24084 3.37502 2.24084 4.48127V5.93752C2.24084 6.61252 2.78521 7.15689 3.46021 7.15689H14.5379C15.2129 7.15689 15.7573 6.61252 15.7573 5.93752V4.48127C15.7573 3.37502 14.8573 2.47502 13.7535 2.47502ZM7.67084 1.9969C7.67084 1.85315 7.78771 1.73627 7.93145 1.73627H10.0691C10.2129 1.73627 10.3297 1.85315 10.3297 1.9969V2.47502H7.67084V1.9969Z"
                                                fill="" />
                                            <path
                                                d="M3.46021 8.41064C3.27146 8.41064 3.11521 8.56689 3.12146 8.75564L3.44021 13.9931C3.48396 14.8306 4.17771 15.5119 5.01521 15.5119H12.9852C13.8227 15.5119 14.5165 14.8306 14.5602 13.9931L14.879 8.75564C14.8852 8.56689 14.729 8.41064 14.5402 8.41064H3.46021V8.41064Z"
                                                fill="" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection