<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Applicant - {{ $applicant->applicant_name }}</title>
</head>

<body>
    <x-navbar />

    <div class="m-[30px] flex flex-col justify-center items-center">
        <div class="w-[1220px] justify-start items-start">
            <a href="{{ url()->previous() }}" class="p-[10px] bg-[#28c062] text-white hover:cursor-pointer font-medium text-[15px] rounded-[5px]">
                BACK
            </a>
            <h1 class="text-[70px] font-bold p-[0px] m-[0px] leading-none mt-[20px]">{{ $applicant->applicant_name }}</h1>
            <h1 class="text-[30px] font-semibold p-[0px] m-[0px] leading-none mt-[10px]">{{ $applicant->email }}</h1>
            <h3 class="text-[#9d9d9d] text-[20px] font-regular mt-[10px]">Applying For:</h3>
            <h3 class="text-[40px] font-medium leading-none mt-[5px]">{{ $applicant->beasiswa?->title }}</h3>
            <h3 class="text-[20px] font-regular leading-none text-[#9d9d9d] mt-[40px]">Submitted: {{ $applicant->created_at }}</h3>
            <div class="h-[30px]"></div>
            <p class="text-justify">{!! nl2br(e($applicant->essay)) !!}</p>
            <div class="download mt-[10px]">
                <h3 class="text-[20px]">Documents:</h3>
                @foreach ($applicant->documents['requirements'] ?? [] as $reqId => $path)
                    <p>
                        {{ $requirementNames[$reqId] ?? "Requirement $reqId" }}:
                        <a href="{{ asset('storage/' . $path) }}" download="{{ basename($path) }}"
                            class="text-blue-600 underline hover:text-blue-800">
                            Download File
                        </a>
                    </p>
                @endforeach
            </div>
        </div>
    </div>

    <x-footer />
</body>

</html>
