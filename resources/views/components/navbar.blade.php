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
                class="bg-[#28c062] p-[10px] text-[15px] leading-none text-white font-medium rounded-[5px] hover:bg-[#1ba669] transition-all">Login</a>
            <a href="{{ route('show.register') }}" class="text-blue-600 hover:underline">Register</a>
        </div>
    @endif
</div>
