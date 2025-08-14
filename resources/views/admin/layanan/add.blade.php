<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Add Layanan</title>
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
    <form action="{{ route('layanan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col items-start gap-4 max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
            <label for="layanan" class="font-semibold">Layanan:</label>
            <input type="text" name="layanan" id="layanan" required class="border px-3 py-2 w-full" value="{{old('layanan')}}">

            <label for="text" class="font-semibold">Deskripsi:</label>
            <textarea name="text" id="text" rows="4" required class="border px-3 py-2 w-full" value="{{old('text')}}"></textarea>
            
            <label for="link" class="font-semibold">Link</label>
            <input type="text" name="link" id="link" class="border px-3 py-2 w-full" value="{{old('link')}}">

            <button type="submit"
                class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 transition w-fit cursor-pointer">
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
