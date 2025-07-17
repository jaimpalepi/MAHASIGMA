<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Apply</title>
</head>

<body>
    <x-navbar />

    <x-back-btn />

    <div class=" flex flex-col justify-center items-center py-[30px] ">
        <form action="{{ route('apply.store') }}" method="POST" enctype="multipart/form-data"
            class="flex flex-col justify-center items-center">
            @csrf
            <div
                class="flex flex-col gap-[25px] justify-center items-center bg-white shadow-2xl rounded-[10px] w-full p-[25px] box-border">
                <div class="flex flex-col justify-center items-center gap-[7px]">
                    <h1 class="leading-none text-[30px] font-semibold">{{$beasiswa1->title}}</h1>
                    <h1 class="leading-none text-[20px] font-medium">Application Form</h1>
                </div>
                <input type="hidden" name="beasiswa_id" id="beasiswa_id" value="{{ $beasiswa }}">
                <div class="w-full flex flex-col justify-center items-start">
                    <label for="name" class="font-medium">Name:</label>
                    <input class="w-full border-[#9d9d9d] border-b-[2px] font-medium p-[7px] box-border" type="text"
                        name="name" id="name" required placeholder="Applicant Name*">
                </div>

                <div class="w-full flex flex-col justify-center items-start">
                    <label for="email" class="font-medium">Email:</label>
                    <input class="w-full border-[#9d9d9d] border-b-[2px] font-medium p-[7px] box-border" type="text"
                        name="email" id="email" required placeholder="Applicant Email*">
                </div>

                <div class="w-full flex flex-col justify-center items-start">
                    <label for="essay" class="font-medium">Essay:</label>
                    <textarea name="essay" id="essay" cols="30" rows="10"
                        class="border-[#9d9d9d] border-[2px] w-full text-justify p-[10px] box-border font-medium resize-none"
                        placeholder="Paste Applicant Already Made Essay Here*"></textarea>
                </div>

                @foreach ($requirements as $r)
                <div class="w-full">
                    <label class="w-full">{{ $r->requirement?->name }}</label>
                    <input class="w-full hover:cursor-pointer border-[#9d9d9d] border-[2px] p-[10px] box-border" type="file" name="requirements[{{ $r->id }}]" required>
                </div>
                @endforeach
                <button type="submit" class="hover:cursor-pointer bg-blue-500 w-full p-[10px] box-border text-white font-semibold hover:bg-blue-700 transition-all ease-in-out mt-[30px] rounded-[5px]">APPLY</button>
            </div>
        </form>
    </div>

    <x-footer />
</body>

</html>
