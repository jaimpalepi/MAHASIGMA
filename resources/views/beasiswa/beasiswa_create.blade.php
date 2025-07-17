<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Add Beasiswa</title>
</head>

<body class="bg-gray-100 p-8">
    <form action="{{ route('beasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col items-start gap-4 max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
            <label for="name" class="font-semibold">Scholarship Name:</label>
            <input type="text" name="name" id="name" required class="border px-3 py-2 w-full">

            <label for="cover" class="font-semibold">Scholarship Cover Image:</label>
            <input type="file" name="cover" id="cover" required class="border px-3 py-2 w-full">

            <label for="desc" class="font-semibold">Description:</label>
            <textarea name="desc" id="desc" rows="4" required class="border px-3 py-2 w-full"></textarea>

            <label for="provider" class="font-semibold">Scholarship Provider:</label>
            <input type="text" name="provider" id="provider" required class="border px-3 py-2 w-full">

            <label for="amount" class="font-semibold">Amount:</label>
            <input type="text" name="amount" id="amount" required class="border px-3 py-2 w-full">

            <label for="quota" class="font-semibold">Quota:</label>
            <input type="number" name="quota" id="quota" required class="border px-3 py-2 w-full">

            <label class="font-semibold">Requirements:</label>
            <div id="requirement-container" class="flex flex-col gap-2 w-full">
                <select name="requirements[]" class="border px-3 py-2">
                    @foreach ($requirements as $r)
                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="button"
                onclick="addRequirement()"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition w-fit">
                + Add Requirement
            </button>

            <label for="deadline" class="font-semibold">Deadline:</label>
            <input type="date" name="deadline" id="deadline" required class="border px-3 py-2 w-full">

            <button type="submit"
                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition w-fit">
                Submit
            </button>
        </div>
    </form>

    <script>
        function addRequirement() {
            const container = document.getElementById('requirement-container');
            const select = container.querySelector('select').cloneNode(true);
            container.appendChild(select);
        }
    </script>
</body>

</html>
