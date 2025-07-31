<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>{{ $beasiswa->title }}</title>
</head>

<body>
    <x-navbar />
    <div class="flex flex-col justify-center items-center">
        <div class="relative w-full h-[250px] lg:h-[450px]">
            <img class="absolute inset-0 w-full h-full object-cover brightness-[0.6]"
                src="{{ asset('storage/' . $beasiswa->cover) }}" alt="">
            <div class="relative z-10 flex flex-col justify-end h-full p-8 text-white">
                <h1 class="text-[35px] lg:text-[50px] font-bold leading-tight drop-shadow-md">{{ $beasiswa->title }}
                </h1>
                <h3 class="text-[17px] font-medium mt-[10px] drop-shadow-sm">Sponsored by: {{ $beasiswa->provider }}
                </h3>
                <h4 class="text-sm">Posted at {{ $beasiswa->created_at->format('d M Y') }}</h4>
            </div>
        </div>
        <div class="w-[85%] lg:w-[1220px] flex flex-col justify-center items-start pb-[20px]">

            <h2 class="text-[35px] font-medium mt-[40px] border-b-[2px] border-[#7c6ca3] w-fit leading-[40px]">
                TENTANG BEASISWA</h2>

            <p class="text-justify mt-[20px] text-[18px] leading-relaxed tracking-wide text-gray-800">
                {!! nl2br(e($beasiswa->description)) !!}</p>


            <h2 class="text-[35px] font-medium mt-[40px] border-b-[2px] border-[#7c6ca3] w-fit leading-[40px]">DETAILS
            </h2>


            <ul class="list-none space-y-2 mt-[8px]">
                <li class="flex items-start gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#3533c4" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                    </svg>
                    <p class="text-[15px]">Scholarship Amount: <strong>{{ $beasiswa->amount }}</strong></p>
                </li>
                <li class="flex items-start gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#3533c4" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <p>Quota: {{ $beasiswa->quota }}</p>
                </li>
                <li class="flex items-start gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="#3533c4" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                    </svg>
                    <p>Application Deadline: {{ $beasiswa->deadline }}</p>
                </li>
            </ul>

            @if (!$beasiswa->requirements->isEmpty())


                <h2 class="text-[35px] font-medium mt-[40px] border-b-[2px] border-[#7c6ca3] w-fit leading-[40px]">
                    REQUIREMENTS</h2>

                <ul class="list-disc ml-[40px] mt-[8px]">
                    @foreach ($beasiswa->requirements as $requirement)
                        <li>
                            {{ $requirement->name }}
                        </li>
                    @endforeach
                </ul>
            @endif
            <div class="mt-[20px] w-full flex items-center justify-center lg:justify-start gap-4">
                @if ($checkApply)
                    <div class="flex flex-col items-start justify-center gap-[5px]">
                        <p class="text-[#9d9d9d] text-[17px]">Already Applied</p>
                        <a class="bg-blue-500 px-6 py-2 rounded-[5px] text-white text-[20px] text-bold hover:bg-blue-700 transition-all ease-in-out"
                            href="{{ route('applicant.detail', ['id' => $applicationData->id]) }}">SEE MY ENTRY</a>
                    </div>
                @else
                    <a class="bg-blue-500 px-6 py-2 rounded-[5px] text-white text-[20px] text-bold hover:bg-blue-700 transition-all ease-in-out"
                        href="{{ route('apply.create', ['id' => $beasiswa->id]) }}">APPLY NOW</a>
                @endif

                @if (Auth::check() && Auth::user()->role == 'admin')
                    <a href="{{ route('beasiswa.edit', $beasiswa->id) }}"
                        class="bg-yellow-500 px-6 py-2 rounded-[5px] text-white text-[20px] text-bold hover:bg-yellow-700 transition-all ease-in-out">
                        EDIT
                    </a>
                @endif
            </div>
        </div>
    </div>
    <x-footer />
</body>

</html>
