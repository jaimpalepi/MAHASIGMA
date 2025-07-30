<div
    class="flex justify-between items-center w-full sticky top-0 z-[100] px-4 lg:px-10 py-2 lg:py-4 backdrop-blur-md bg-white/70 border-b border-[#ccc] shadow-md">
    <a href="{{ route('beasiswa') }}" class="text-[25px] font-bold font-title text-[#2c3e50] tracking-wide">
        BEASISWA<span class="text-[#fcd008]">.</span>
    </a>
    
    <div class="spacer w-[100%] h-[1px]"></div>
    @if (Auth::user())
        <div class="flex justify-end items-center gap-[20px]">
            @if (Auth::user()->role == 'admin')
                {{-- Menu khusus untuk Admin --}}
                <div class="hidden md:inline-flex rounded-md shadow-sm" role="group">
                    <a href="{{ route('beasiswa.table') }}"
                        class="px-6 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 whitespace-nowrap transition-all ease-in-out">
                        Daftar Beasiswa
                    </a>
                    <a href="{{ route('applicant') }}"
                        class="px-6 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-r border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 whitespace-nowrap transition-all ease-in-out">
                        Daftar Pelamar
                    </a>
                    <a href="{{ route('beasiswa.create') }}"
                        class="px-6 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-r border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 whitespace-nowrap transition-all ease-in-out">
                        Buat Beasiswa
                    </a>
                </div>
            @endif

            <a href="{{ route('logout') }}"
                class="hidden md:block p-[10px] text-[15px] leading-none text-white font-medium rounded-[5px] transition-all bg-gradient-to-r from-cyan-400 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 text-center shadow-none">
                Logout
            </a>

            <button id="hamburger" class="block lg:hidden hover:cursor-pointer rounded-[500px] p-[2px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <div
                class="dropdownMenu hidden lg:hidden absolute top-[54px] right-0 bg-gray-100 w-full divide-y divide-[#e6e4e1] z-[100] flex flex-col justify-center items-end">
                <a href="{{ route('applicant') }}"
                    class="leading-none p-[15px] w-full box-border text-right hover:bg-gray-200 transition-all ease-in-out">Daftar
                    Pendaftar</a>
                <a href="{{ route('beasiswa.table') }}"
                    class="leading-none p-[15px] w-full box-border text-right hover:bg-gray-200 transition-all ease-in-out">Daftar
                    Beasiswa</a>
                <a href="{{ route('beasiswa.create') }}"
                    class="leading-none p-[15px] w-full box-border text-right hover:bg-gray-200 transition-all ease-in-out">Buat
                    Beasiswa</a>
                <a href="{{ route('logout') }}"
                    class="leading-none p-[15px] w-full box-border text-right hover:bg-gray-200 transition-all ease-in-out">Logout</a>
            </div>

        </div>
    @else
        <div class="flex justify-end items-center gap-[20px]">
            <a href="{{ route('login', ['redirect' => url()->current()]) }}"
                class="hidden md:flex text-white bg-gradient-to-r from-cyan-400 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-[5px] text-[15px] w-[90px] h-[35px] items-center justify-center text-center transition-all shadow-none">Login</a>
            <a href="{{ route('show.register') }}"
                class="hidden md:flex text-white bg-gradient-to-r from-green-400 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-[5px] text-[15px] w-[90px] h-[35px] text-center items-center justify-center transition-all shadow-none">Register</a>

            <button id="hamburger" class="block lg:hidden hover:cursor-pointer rounded-[500px] p-[2px]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <div
                class="dropdownMenu hidden lg:hidden absolute top-[54px] right-0 bg-gray-100 w-full divide-y divide-[#e6e4e1] z-[100] flex flex-col justify-center items-end">
                <a href="{{ route('show.login', ['redirect' => url()->current()]) }}"
                    class="leading-none p-[15px] w-full box-border text-right hover:bg-gray-200 transition-all ease-in-out">Login</a>
                <a href="{{ route('show.register') }}"
                    class="leading-none p-[15px] w-full box-border text-right hover:bg-gray-200 transition-all ease-in-out ">Register</a>
            </div>

        </div>
    @endif
</div>

<script>
    const toggleBtn = document.getElementById('hamburger');
    const dropdown = document.querySelector('.dropdownMenu');

    toggleBtn.addEventListener('click', () => {
        dropdown.classList.toggle('hidden');
        toggleBtn.classList.toggle('bg-gray-200');
    });
</script>
