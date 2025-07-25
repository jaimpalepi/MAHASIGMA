<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Edit Beasiswa - {{ $beasiswa->title }}</title>
</head>

<body class="bg-gray-100 p-8">

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6">Edit Beasiswa</h1>
        <form action="{{ route('beasiswa.update', $beasiswa->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" id="id" value="{{ $beasiswa->id }}">

            <div class="flex flex-col items-start gap-4">
                <label for="name" class="font-semibold">Scholarship Name:</label>
                <input type="text" name="name" id="name" value="{{ $beasiswa->title }}" required
                    class="border px-3 py-2 w-full">

                <label class="font-semibold">Current Cover Image:</label>
                <img src="{{ asset('storage/' . $beasiswa->cover) }}" alt="Current Cover"
                    class="w-full h-auto rounded-lg mb-2">

                <label class="block mb-2 text-sm font-medium text-gray-900" for="cover">Upload New Cover
                    (Optional)</label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                    aria-describedby="cover_help" id="cover" name="cover" type="file">
                <div class="mt-1 text-sm text-gray-500" id="cover_help">Leave blank if you don't want to change the
                    cover image.</div>

                <label for="desc" class="font-semibold">Description:</label>
                <textarea name="desc" id="desc" rows="4" required class="border px-3 py-2 w-full">{{ $beasiswa->description }}</textarea>

                <label for="provider" class="font-semibold">Scholarship Provider:</label>
                <input type="text" name="provider" id="provider" value="{{ $beasiswa->provider }}" required
                    class="border px-3 py-2 w-full">

                <label for="amount" class="font-semibold">Amount:</label>
                <input type="text" name="amount" id="amount" value="{{ $beasiswa->amount }}" required
                    class="border px-3 py-2 w-full">

                <label for="quota" class="font-semibold">Quota:</label>
                <input type="number" name="quota" id="quota" value="{{ $beasiswa->quota }}" required
                    class="border px-3 py-2 w-full">

                <label class="font-semibold">Requirements:</label>
                <div id="requirement-container" class="flex flex-col gap-2 w-full">
                    @foreach ($beasiswa->requirements as $selectedRequirement)
                        <select name="requirements[]" class="border px-3 py-2">
                            @foreach ($all_requirements as $r)
                                <option value="{{ $r->id }}"
                                    {{ $selectedRequirement->id == $r->id ? 'selected' : '' }}>
                                    {{ $r->name }}
                                </option>
                            @endforeach
                        </select>
                    @endforeach
                </div>

                <button type="button" onclick="addRequirement()"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition w-fit">
                    + Add Requirement
                </button>

                <label for="deadline" class="font-semibold">Deadline:</label>
                <input type="date" name="deadline" id="deadline" value="{{ $beasiswa->deadline }}" required
                    class="border px-3 py-2 w-full">

                <div class="flex gap-2">
                    <button type="submit"
                        class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition w-fit">
                        Update Beasiswa
                    </button>
                    <a href="{{ route('beasiswa.detail', $beasiswa->id) }}"
                        class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition w-fit">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>

    <script>
        const allRequirements = @json($all_requirements);

        function addRequirement() {
            const container = document.getElementById('requirement-container');
            const select = document.createElement('select');
            select.name = 'requirements[]';
            select.className = 'border px-3 py-2 mt-2';

            allRequirements.forEach(r => {
                const option = document.createElement('option');
                option.value = r.id;
                option.textContent = r.name;
                select.appendChild(option);
            });

            container.appendChild(select);
        }
    </script>
</body>

</html>
