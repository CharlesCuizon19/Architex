@extends('layouts.admin')

@section('title', 'Services / Create Service')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6">Create Service</h1>

    <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Title --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" required
                class="mt-1 block w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">
            @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="6" required
                class="mt-1 block w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
            @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        {{-- Image --}}
        <div class="border-2 border-dashed rounded-lg p-6 text-center">
            <p class="font-semibold mb-2">Upload Service Image</p>
            <p class="text-sm text-gray-500 mb-4">Required (jpg, jpeg, png, webp), max 2MB</p>

            <label class="cursor-pointer inline-flex flex-col items-center">
                <span class="mt-3 px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded cursor-pointer">Select File</span>
                <input type="file" name="image" id="image" class="hidden" accept="image/*" required>
            </label>

            @error('image')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror

            <div id="image-preview-container" class="hidden mt-4">
                <p class="font-semibold mb-2">Selected Image</p>
                <div id="image-preview" class="flex flex-wrap gap-2"></div>
            </div>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between">
            <a href="{{ route('admin.services.index') }}" class="px-4 py-2 border rounded bg-gray-100 hover:bg-gray-200">Back</a>
            <button type="submit" class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">Save</button>
        </div>
    </form>
</div>

@push('scripts')
<!-- CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

<script>
    // Initialize CKEditor for Description
    ClassicEditor.create(document.querySelector('#description'))
        .then(editor => {
            // Keep the textarea updated with editor data
            editor.model.document.on('change:data', () => {
                document.querySelector('#description').value = editor.getData();
            });
        })
        .catch(error => console.error(error));

    // Preview for single image
    const imageInput = document.getElementById('image');
    const container = document.getElementById('image-preview-container');
    const preview = document.getElementById('image-preview');

    imageInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        preview.innerHTML = '';

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                container.classList.remove('hidden');
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'w-32 h-20 object-cover rounded shadow';
                preview.appendChild(img);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection