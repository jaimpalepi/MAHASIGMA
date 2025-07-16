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
        <img class="h-[450px] w-full object-cover" src="{{ asset('storage/' . $beasiswa->cover) }}" alt="">
        <div class="w-[1220px] flex flex-col justify-center items-start pb-[20px]">
            <div class="titleText flex flex-col justify-baseline items-start mt-[15px]">
                <h1 class="text-[50px] font-bold leading-none">{{ $beasiswa->title }}</h1>
                <h3 class="text-[17px] font-medium leading-none mb-[5px] mt-[10px]">Sponsored by:
                    {{ $beasiswa->provider }}
                </h3>
                <h2>Posted at {{ $beasiswa->created_at }}</h2>
            </div>
            <p class="text-justify mt-[20px] text-[20px]">{!! nl2br(e($beasiswa->description)) !!}</p>

            <h2 class="text-[35px] font-medium mt-[20px]">DETAILS</h2>

            <ul class="list-disc ml-[40px]">
                <li>
                    <p class="text-[15px]">
                        Scholarship Amount: <strong>Rp{{ number_format($beasiswa->amount, 0, ',', '.') }}</strong>
                    </p>
                </li>
                <li>
                    <p>Quota: {{ $beasiswa->quota }}</p>
                </li>
                <li>
                    <p>Application Deadline: {{ $beasiswa->deadline }}</p>
                </li>
            </ul>

            <h2 class="text-[35px] font-medium mt-[20px]">REQUIREMENTS</h2>

            <ul class="list-disc ml-[40px]">
                @foreach ($beasiswa->requirements as $requirement)
                    <li>
                        {{ $requirement->name }}
                    </li>
                @endforeach
            </ul>

            <a class="bg-blue-500 px-6 py-2 rounded-[5px] text-white text-[20px] text-bold mt-[20px]" href="{{route('apply.create', ['id' => $beasiswa->id])}}">APPLY NOW</a>
        </div>
    </div>
    <x-footer />
</body>

</html>
