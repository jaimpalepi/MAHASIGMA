<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Edit Beasiswa - {{ $beasiswa->title }}</title>
</head>

<body class="bg-gray-100">
    <x-navbar />

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('beasiswa.update', $beasiswa->id) }}" method="POST" enctype="multipart/form-data"
        class="m-[10px] lg:m-[30px]">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="id" value="{{ $beasiswa->id }}">

        <div class="flex flex-col items-start gap-4 max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
            <div class="flex flex-col justify-center items-center gap-[7px] w-full">
                <h1 class="leading-none text-[17px] lg:text-[30px] font-semibold text-center">{{ $beasiswa->title }}
                </h1>
                <h1 class="leading-none text-[15px] lg:text-[20px] text-[#9d9d9d] font-medium">Edit Beasiswa</h1>
            </div>
            <label for="name" class="font-semibold">Scholarship Name:</label>
            <input type="text" name="name" id="name" value="{{ $beasiswa->title }}" required
                class="border px-3 py-2 w-full">

            <label class="font-semibold">Current Cover Image:</label>
            <img src="{{ asset('storage/' . $beasiswa->cover) }}" alt="Current Cover"
                class="w-full h-auto rounded-lg mb-2">

            <label class="block mb-2 text-sm font-medium text-gray-900" for="cover">Upload New Cover
                (Optional)</label>
            <input
                class="block w-full text-sm px-3 py-2 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                aria-describedby="cover_help" id="cover" name="cover" type="file">
            <div class="mt-1 text-sm text-gray-500" id="cover_help">Leave blank if you don't want to change the
                cover image.</div>

            <label for="desc" class="font-semibold">Description:</label>
            <textarea name="desc" id="desc" rows="4" required class="border px-3 py-2 w-full">{{ $beasiswa->description }}</textarea>

            <label for="website" class="font-semibold">Official Website:</label>
            <input type="text" name="website" id="website" value="{{ $beasiswa->official_website }}" required
                class="border px-3 py-2 w-full">

            <label for="contact" class="font-semibold">Contact Person:</label>
            <input type="text" name="contact" id="contact" value="{{ $beasiswa->contact_person }}" required
                class="border px-3 py-2 w-full">

            <label class="block mb-2 text-sm font-medium text-gray-900" for="pdf">PDF</label>
            <input
                class="block w-full text-sm px-3 py-2 text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                aria-describedby="pdf_help" id="pdf" name="pdf" type="file">
            <div class="mt-1 text-sm text-gray-500" id="pdf_help">Leave blank if you don't want to change the
                PDF.</div>

            <label for="provider" class="font-semibold">Penyedia Beasiswa:</label>
            <input type="text" name="provider" id="provider" value="{{ $beasiswa->provider }}" required
                class="border px-3 py-2 w-full">

            <label for="jenjang" class="font-semibold">Jenjang:</label>
            <input type="text" name="jenjang" id="jenjang" value="{{ $beasiswa->jenjang }}" required
                class="border px-3 py-2 w-full">

            <label for="amount" class="font-semibold">Jumlah Dana Beasiswa:</label>
            <input type="text" name="amount" id="amount" value="{{ $beasiswa->amount }}" required
                class="border px-3 py-2 w-full">

            <label class="font-semibold">Kualifikasi:</label>
            <div id="qualifications-container" class="flex flex-col gap-2 w-full" data-field="qualifications">
                @foreach ($beasiswa->qualifications as $q)
                <div class="field-item flex gap-2 items-center">
                    <input type="text" name="qualifications[]" class="border px-3 py-2 w-full"
                    placeholder="Tulis kualifikasi..." value="{{$q}}">
                    <button type="button" onclick="removeField(this)"
                    class="text-red-500 hover:underline">Remove</button>
                </div>
                @endforeach
            </div>
            <button type="button" onclick="addInputField('qualifications')"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition w-fit mt-2">
                + Tambah Kualifikasi
            </button>
            
            <label class="font-semibold">Benefit:</label>
            <div id="benefits-container" class="flex flex-col gap-2 w-full" data-field="benefits">
                @foreach ($beasiswa->benefits as $b)
                <div class="field-item flex gap-2 items-center">
                    <input type="text" name="benefits[]" class="border px-3 py-2 w-full"
                    placeholder="Tulis kualifikasi..." value="{{$b}}">
                    <button type="button" onclick="removeField(this)"
                    class="text-red-500 hover:underline">Remove</button>
                </div>
                @endforeach
            </div>
            <button type="button" onclick="addInputField('benefits')"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition w-fit mt-2">
                + Tambah Benefit
            </button>

            <label class="font-semibold">Persyaratan:</label>
            <div id="requirement-container" class="flex flex-col gap-2 w-full">
                @foreach ($beasiswa->requirements as $r)
                <div class="requirement-item flex gap-2 items-center">
                    <input type="text" name="requirements[]" class="border px-3 py-2 w-full"
                    placeholder="Tulis persyaratan..." value="{{$r->name}}">
                    <button type="button" onclick="removeRequirement(this)"
                    class="text-red-500 hover:underline">Remove</button>
                </div>
                @endforeach
            </div>

            <button type="button" onclick="addRequirement()"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition w-fit mt-2">
                + Tambah Persyaratan
            </button>

            <label for="quota" class="font-semibold">Quota:</label>
            <input type="number" name="quota" id="quota" value="{{ $beasiswa->quota }}" required
                class="border px-3 py-2 w-full">

            <label for="open" class="font-semibold">Open:</label>
            <input type="date" name="open" id="open" value="{{ $beasiswa->open }}" required
                class="border px-3 py-2 w-full">

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

        function addRequirement() {
            const container = document.getElementById('requirement-container');
            const originalItem = container.querySelector('.requirement-item');
            const newItem = originalItem.cloneNode(true);
            newItem.querySelector('input').value = ''; // clear input
            container.appendChild(newItem);
        }

        function removeRequirement(button) {
            const item = button.closest('.requirement-item');
            const container = document.getElementById('requirement-container');
            if (container.querySelectorAll('.requirement-item').length > 1) {
                item.remove();
            } else {
                alert("Minimal satu persyaratan harus ada");
            }
        }

        function addInputField(fieldName) {
            const container = document.querySelector(`[data-field="${fieldName}"]`);
            const originalItem = container.querySelector('.field-item');

            const newItem = originalItem.cloneNode(true);
            const input = newItem.querySelector('input');
            input.value = ''; // reset input

            container.appendChild(newItem);
        }

        function removeField(button) {
            const item = button.closest('.field-item');
            const container = item.parentElement;

            if (container.querySelectorAll('.field-item').length > 1) {
                item.remove();
            } else {
                alert("Minimal satu entri harus ada");
            }
        }
    </script>

    <x-footer />
</body>

</html>
