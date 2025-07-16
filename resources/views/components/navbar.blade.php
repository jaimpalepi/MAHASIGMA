<div
    class="flex justify-start items-center w-full sticky top-0 bg-white p-[10px] pl-[50px] pr-[50px] border-b-[1px] border-[#a9a9a9] box-border z-[100]">
    <h3 class="text-[25px] font-semibold font-title">BEASISWA</h3>
    <div class="spacer w-[100%] h-[1px]"></div>
    @if (Auth::user())
        <div class="flex justify-end items-center gap-[20px]">
            <a href="{{ route('logout') }}"
                class="bg-[#28c062] p-[10px] text-[15px] leading-none text-white font-medium rounded-[5px] hover:bg-[#1ba669] transition-all">Logout</a>
            <a href="{{ route('show.register') }}" class="text-blue-600 hover:underline">Register</a>
        </div>
    @else
        <div class="flex justify-end items-center gap-[20px]">
            <a href="{{ route('login', ['redirect' => url()->current()]) }}"
                class="text-white bg-gradient-to-r from-cyan-400 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-base px-8 py-3 text-center transition-all shadow-none">Login</a>
            <a href="{{ route('show.register') }}"
                class="relative inline-flex items-center justify-center p-0.5 font-medium text-gray-900 rounded-lg group bg-gradient-to-r from-green-400 to-blue-500 focus:ring-4 focus:outline-none focus:ring-green-200 text-base transition-all shadow-none">>Register</a>
        </div>
    @endif
</div>
