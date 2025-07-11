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
        class="flex justify-start items-center w-full sticky top-0 bg-white p-[10px] border-b-[1px] border-[#a9a9a9] box-border">
        <h3 class="text-[25px] font-semibold font-title">BEASISWA</h3>
    </div>
    <div class="flex flex-col justify-center items-center m-[20px] mt-[40px]">
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
    </div>
</body>

</html>
