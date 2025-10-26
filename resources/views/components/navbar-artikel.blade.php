<nav class="bg-red-700 border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="\image\logo_unsoed.png" class="h-8" alt="Logo" />
            <div class="text-white">
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <p class="font-bold text-lg leading-tight">ADMIN</p>
                    <p class="text-sm uppercase">KEMAHASISWAAN</p>
                @else
                    <p class="font-bold text-lg leading-tight">KEMAHASISWAAN</p>
                    <p class="text-sm uppercase">Universitas Jenderal <br>Soedirman</p>
                @endif
            </div>


        </a>
        <button data-collapse-toggle="navbar-dropdown" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600"
            aria-controls="navbar-dropdown" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border rounded-lg md:space-x-4 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-red-700 md:bg-red-700">
                @auth
                    @if (Auth::user()->role == 'admin')
                        <li>
                            <button id="dropdownBerandaLink" data-dropdown-toggle="dropdownBeranda"
                                class="flex items-center justify-between w-full py-2 px-3 text-white rounded-md md:border-0 md:p-0 md:w-auto hover:bg-white/10 transition-colors duration-200">
                                <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Beranda
                                <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="m1 1 4 4 4-4" />
                                </svg>
                            </button>
                            <div id="dropdownBeranda"
                                class="z-[100] hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownBerandaLink">
                                    <li>
                                        <a href="{{ url('/') }}" class="block px-4 py-2 hover:bg-red-100 hover:text-red-700">
                                            Beranda
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('admin') }}" class="block px-4 py-2 hover:bg-red-100 hover:text-red-700">
                                            Beranda Admin
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @else
                    <li>
                    <a href="/"
                        class="flex items-center py-2 px-3 text-white rounded-md md:border-0 md:p-0 hover:bg-white/10 transition-colors duration-200"
                        aria-current="page">
                        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Beranda
                    </a>
                </li>
                        @endif
                    @else
                    <li>
                    <a href="/"
                        class="flex items-center py-2 px-3 text-white rounded-md md:border-0 md:p-0 hover:bg-white/10 transition-colors duration-200"
                        aria-current="page">
                        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Beranda
                    </a>
                </li>
                @endauth
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownTentangKami"
                        class="flex items-center justify-between w-full py-2 px-3 text-white rounded-md md:border-0 md:p-0 md:w-auto hover:bg-white/10 transition-colors duration-200">
                        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tentang Kami
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <div id="dropdownTentangKami"
                        class="z-[100] hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownLargeButton">
                            <li><a href="{{ route('tentang.visimisi') }}"
                                    class="block px-4 py-2 hover:bg-red-100 hover:text-red-700 ">Visi Misi</a></li>
                            <li><a href="{{ route('tentang.struktur') }}"
                                    class="block px-4 py-2 hover:bg-red-100 hover:text-red-700 ">Struktur</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('layanan') }}"
                        class="flex items-center py-2 px-3 text-white rounded-md md:border-0 md:p-0 hover:bg-white/10 transition-colors duration-200">
                        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z">
                            </path>
                        </svg>
                        Layanan
                    </a>
                </li>
                <li>
                    <a href="{{ route('kegiatan.index') }}"
                        class="flex items-center py-2 px-3 text-white rounded-md md:border-0 md:p-0 hover:bg-white/10 transition-colors duration-200">
                        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Kegiatan
                    </a>
                </li>
                <li>
                    <a href="{{ route('prestasi.index') }}"
                        class="flex items-center py-2 px-3 text-white rounded-md md:border-0 md:p-0 hover:bg-white/10 transition-colors duration-200">
                        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>
                        Prestasi
                    </a>
                </li>
                <li>
                    <a href="https://tracer.unsoed.ac.id/"
                        class="flex items-center py-2 px-3 text-white rounded-md md:border-0 md:p-0 hover:bg-white/10 transition-colors duration-200">
                        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tracer Study
                    </a>
                </li>
                <li>
                    <a href="https://scc.unsoed.ac.id/"
                        class="flex items-center py-2 px-3 text-white rounded-md md:border-0 md:p-0 hover:bg-white/10 transition-colors duration-200">
                        <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2v-8a2 2 0 012-2h2zm5-1a1 1 0 00-1-1H9a1 1 0 00-1 1v1h4V6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Career Portal
                    </a>
                </li>
                <li x-data="{ open: false }" @click.away="open = false" class="relative">
                    <button @click="open = !open"
                        class="flex items-center py-2 px-3 text-white rounded-md md:border-0 md:p-0 hover:bg-white/10 transition-colors duration-200">
                        <svg class="w-4 h-4 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span>Search</span>
                    </button>
                    <div x-show="open" x-transition
                        class="absolute right-0 mt-2 w-64 md:w-80 p-3 bg-white rounded-lg shadow-xl z-20"
                        style="display: none;">

                        <form action="{{ route('artikel.search') }}" method="GET">
                            <label for="navbar-search-dropdown" class="sr-only">Cari</label>
                            <div class="relative">
                                <input id="navbar-search-dropdown" type="search" name="query"
                                    placeholder="Ketik lalu tekan Enter..."
                                    class="block w-full p-2 ps-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500"
                                    required>
                                <button type="submit"
                                    class="absolute top-0 end-0 p-2 text-sm font-medium h-full text-white bg-red-600 rounded-e-lg border border-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </div>
                        </form>


                    </div>
                </li>
                @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit"
                                class="flex items-center py-2 px-3 text-white rounded-md md:border-0 md:p-0 hover:bg-white/10 transition-colors duration-200">
                                <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 4a1 1 0 011-1h6a1 1 0 110 2H5v10h5a1 1 0 110 2H4a1 1 0 01-1-1V4zm9.707 5.707a1 1 0 00-1.414-1.414L10 9.586V8a1 1 0 10-2 0v4a1 1 0 002 0v-1.586l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293z"
                                        clip-rule="evenodd" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </li>
                    @else
                     <li>
                        <a href="{{ route('login') }}"
                            class="flex items-center py-2 px-3 text-white rounded-md md:border-0 md:p-0 hover:bg-white/10 transition-colors duration-200">
                            <svg class="w-4 h-4 me-2" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M3 3a1 1 0 011 1v12a1 1 0 11-2 0V4a1 1 0 011-1zm7.707 3.293a1 1 0 010 1.414L9.414 9H17a1 1 0 110 2H9.414l1.293 1.293a1 1 0 01-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                            Login
                        </a>
                    </li>
                @endauth

            </ul>

        </div>
    </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
