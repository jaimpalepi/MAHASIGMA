<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Add Beasiswa</title>
</head>

<body class="bg-gray-100 p-8">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('beasiswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col items-start gap-4 max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
            <label for="name" class="font-semibold">Judul Beasiswa:</label>
            <input type="text" name="name" id="name" required class="border px-3 py-2 w-full" value="{{old('name')}}">

            <label for="cover" class="font-semibold">Cover Gambar:</label>
            <input type="file" name="cover" id="cover" required class="border px-3 py-2 w-full" value="{{old('cover')}}">

            <label for="desc" class="font-semibold">Deskripsi:</label>
            <textarea name="desc" id="desc" rows="4" required class="border px-3 py-2 w-full" value="{{old('desc')}}"></textarea>

            <label for="website" class="font-semibold">Official Website (Optional):</label>
            <input type="text" name="website" id="website" required class="border px-3 py-2 w-full" value="{{old('website')}}">

            <label for="contact" class="font-semibold">Contact Person:</label>
            <input type="text" name="contact" id="contact" required class="border px-3 py-2 w-full" value="{{old('contact')}}">

            <label for="pdf" class="font-semibold">Pdf (Optional):</label>
            <input type="file" name="pdf" id="pdf" class="border px-3 py-2 w-full" value="{{old('pdf')}}">

            <label for="provider" class="font-semibold">Penyedia Beasiswa:</label>
            <input type="text" name="provider" id="provider" required class="border px-3 py-2 w-full" value="{{old('provider')}}">

            <label for="jenjang" class="font-semibold">Jenjang:</label>
            <input type="text" name="jenjang" id="jenjang" required class="border px-3 py-2 w-full" value="{{old('jenjang')}}">

            <label for="amount" class="font-semibold">Jumlah Dana Beasiswa:</label>
            <input type="text" name="amount" id="amount" required class="border px-3 py-2 w-full" value="{{old('amount')}}">

            <!-- Qualifications -->
            <label class="font-semibold">Kualifikasi:</label>
            <div id="qualifications-container" class="flex flex-col gap-2 w-full" data-field="qualifications">
                <div class="field-item flex gap-2 items-center">
                    <input type="text" name="qualifications[]" class="border px-3 py-2 w-full"
                        placeholder="Tulis kualifikasi...">
                    <button type="button" onclick="removeField(this)"
                        class="text-red-500 hover:underline">Remove</button>
                </div>
            </div>
            <button type="button" onclick="addInputField('qualifications')"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition w-fit mt-2">
                + Tambah Kualifikasi
            </button>

            <!-- Benefits -->
            <label class="font-semibold">Benefit:</label>
            <div id="benefits-container" class="flex flex-col gap-2 w-full" data-field="benefits">
                <div class="field-item flex gap-2 items-center">
                    <input type="text" name="benefits[]" class="border px-3 py-2 w-full"
                        placeholder="Tulis benefit...">
                    <button type="button" onclick="removeField(this)"
                        class="text-red-500 hover:underline">Remove</button>
                </div>
            </div>
            <button type="button" onclick="addInputField('benefits')"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition w-fit mt-2">
                + Tambah Benefit
            </button>

            <label class="font-semibold">Persyaratan:</label>
            <div id="requirement-container" class="flex flex-col gap-2 w-full">
                <div class="requirement-item flex gap-2 items-center">
                    <input type="text" name="requirements[]" class="border px-3 py-2 w-full"
                        placeholder="Tulis persyaratan...">
                    <button type="button" onclick="removeRequirement(this)"
                        class="text-red-500 hover:underline">Remove</button>
                </div>
            </div>

            <button type="button" onclick="addRequirement()"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 transition w-fit mt-2">
                + Add Requirement
            </button>

            <label for="quota" class="font-semibold">Quota:</label>
            <input type="number" name="quota" id="quota" required class="border px-3 py-2 w-full" value="{{old('quota')}}">

            <label for="open" class="font-semibold">Open Registration:</label>
            <input type="date" name="open" id="open" required class="border px-3 py-2 w-full" value="{{old('open')}}">

            <label for="deadline" class="font-semibold">Deadline:</label>
            <input type="date" name="deadline" id="deadline" required class="border px-3 py-2 w-full" value="{{old('deadline')}}">

            <button type="submit"
                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition w-fit">
                Submit
            </button>
        </div>
    </form>


    <script>
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
</body>

</html>
