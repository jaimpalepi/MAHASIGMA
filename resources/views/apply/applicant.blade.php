<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Applicant</title>
</head>

<body>
    <x-navbar />
    <div class="flex flex-col items-center justify-center m-[20px]">
        <div class="flex flex-col items-center justify-center w-[1220px]">
            <table class="w-full border border-gray-300 table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2">APPLICANT NAME</th>
                        <th class="border border-gray-300 px-4 py-2">APPLICANT EMAIL</th>
                        <th class="border border-gray-300 px-4 py-2">SCHOLARSHIP</th>
                        <th class="border border-gray-300 px-4 py-2">STATUS</th>
                        <th class="border border-gray-300 px-4 py-2">ACTION</th>
                    </tr>
                </thead>
                @foreach ($applicants as $a)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $a->applicant_name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $a->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $a->beasiswa?->title }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $a->status }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('applicant.detail', ['id' => $a->id]) }}"
                                class="text-blue-600 hover:underline">Detail</a>
                                <br>
                            <a href="{{ route('apply.delete', ['id' => $a->id]) }}"
                                class="text-blue-600 hover:underline">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
