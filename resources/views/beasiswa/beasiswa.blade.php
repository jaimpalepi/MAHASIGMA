<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Old+Standard+TT:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div
        class="flex justify-start items-center w-full sticky top-0 bg-white p-[10px] pl-[50px] pr-[50px] border-b-[1px] border-[#a9a9a9] box-border z-[100]">
        <h3 class="text-[25px] font-semibold font-title">BEASISWA</h3>
        <div class="spacer w-[100%] h-[1px]"></div>
        <div class="flex justify-end items-center gap-4">
            <a href="{{ route('show.login') }}"
                class="text-white bg-gradient-to-r from-cyan-400 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 font-medium rounded-lg text-base px-8 py-3 text-center transition-all shadow-none">
                Login
            </a>
            <a href="{{ route('show.register') }}"

                class="relative inline-flex items-center justify-center p-0.5 font-medium text-gray-900 rounded-lg group bg-gradient-to-r from-green-400 to-blue-500 focus:ring-4 focus:outline-none focus:ring-green-200 text-base transition-all shadow-none">
                <span class="relative px-8 py-3 transition-all ease-in duration-75 bg-white rounded-md group-hover:bg-transparent">
                    Register
                </span>
            </a>
        </div>
    </div>

    <div class="flex flex-col justify-center items-center">
        <div class="hero relative w-full h-[500px] overflow-hidden ">
            <img src="/image/bakushin.webp" alt="pingas" class="w-full h-full object-cover">

            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>

            <!-- Text Overlay -->
            <h1 class="absolute bottom-11 left-6 text-white text-[80px] font-bold z-10">BEASISWA</h1>
            <p class="absolute bottom-6 left-6 text-white text-[30px] font-medium z-10">Chase your dreams, apply NOW!
            </p>
        </div>

        <div class="w-[1220px] flex flex-col justify-center items-center mt-[20px] mb-[50px]">
            <h1 class="text-[40px] font-semibold mr-auto mb-[20px]">Open Scholarship</h1>
            <div class="cardHolder grid grid-cols-3 gap-[30px]">
            
                {{-- cards goes here --}}
                @foreach ($beasiswas as $b)
                    <div class="cards w-[300px] rounded-[10px] shadow-2xl hover:cursor-pointer hover:scale-[1.03] transition-transform duration-200">
                        <img class="w-full h-[200px] rounded-t-[10px]" src="{{ asset('storage/' . $b->cover) }}" alt="">
                        <div class="texts p-[15px] flex flex-col gap-[3px] h-[170px]">
                            <h3 class="text-[20px] font-semibold truncate leading-none">{{ $b->title }}</h3>
                            <p class="text-[17px] leading-none">{{ $b->provider }}</p>
                            <p class="text-[15px] leading-none line-clamp-4 mt-[7px]">{{ $b->description }}</p>
                            <p class="mt-auto ml-auto text-[13px]">{{ $b->created_at->format('d M Y') }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>



    {{-- <div class="flex flex-col justify-center items-center m-[20px] mt-[40px]">
        <div class="w-[1220px] flex flex-col justify-center items-center">
            <table class="w-full border border-gray-300 table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">TITLE</th>
                        <th class="border border-gray-300 px-4 py-2">DESCRIPTION</th>
                        <th class="border border-gray-300 px-4 py-2">PROVIDER</th>
                        <th class="border border-gray-300 px-4 py-2">AMOUNT</th>
                        <th class="border border-gray-300 px-4 py-2">QUOTA</th>
                        <th class="border border-gray-300 px-4 py-2">DEADLINE</th>
                        <th class="border border-gray-300 px-4 py-2">STATUS</th>
                        <th class="border border-gray-300 px-4 py-2">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($beasiswas as $b)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">{{ $b->title }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $b->description }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $b->provider }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $b->amount }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $b->quota }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $b->deadline }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $b->status }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('apply.create', ['id' => $b->id]) }}"
                                    class="text-blue-600 hover:underline">Apply</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
</body>

</html>
