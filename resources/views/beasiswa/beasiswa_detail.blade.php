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
            <div class="titleText flex justify-baseline items-end mt-[15px]">
                <h1 class="text-[50px] font-bold leading-none">{{ $beasiswa->title }}</h1>
                <h3 class="text-[15px] font-medium leading-none mb-[5px] ml-[10px]">Sponsored by: {{ $beasiswa->provider }}</h3>
            </div>
            <p class="text-justify mt-[30px] text-[20px]">{!! nl2br(e($beasiswa->description)) !!}</p>

            <h2 class="text-[35px] font-medium mt-[20px]">Requirements</h2>
            <ul class="list-disc ml-[40px]">
                @foreach ($beasiswa->requirements as $requirement)
                    <li>
                        {{$requirement->name}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>

</html>
