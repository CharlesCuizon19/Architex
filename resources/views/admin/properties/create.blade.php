@extends('layouts.admin')

@section('title', 'Properties / Create Property')

@section('content')
<div class="max-w-1xl mx-auto bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6">CREATE PROPERTY</h1>

    <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- Property Name --}}
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Property Name</label>
            <input type="text" name="name" id="name"
                class="mt-1 block w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500"
                value="{{ old('name') }}" required>

            @error('name')
            <div class="invalid-feedback text-red-600">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- Description --}}
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" id="description" rows="6"
                class="mt-1 block w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>

            @error('description')
            <div class="invalid-feedback text-red-600">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- Thumbnail Upload --}}
        <div class="border-2 border-dashed rounded-lg p-6 text-center">
            <p class="font-semibold">Thumbnail Upload</p>
            <p class="text-sm text-gray-500 mb-4">Upload a Thumbnail Image (JPG, PNG, WEBP, Max: 5MB)</p>

            <label class="cursor-pointer inline-flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 15a4 4 0 014-4h.586a1 1 0 01.707.293l2.414 2.414a1 1 0 001.414 0l2.414-2.414a1 1 0 01.707-.293H17a4 4 0 014 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1z" />
                </svg>
                <span class="text-gray-600">Click button below or drag file to upload</span>
                <input type="file" name="property_thumbnail" id="property_thumbnail" class="hidden" accept="image/*">
                <span class="mt-3 px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded cursor-pointer">Upload Thumbnail</span>
            </label>

            @error('property_thumbnail')
            <div class="invalid-feedback text-red-600">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- Thumbnail Preview --}}
        <div id="thumb-preview-container" class="hidden">
            <p class="font-semibold mb-2">Thumbnail Preview</p>
            <div id="thumb-preview" class="relative inline-block"></div>
        </div>

        {{-- Property Images Upload --}}
        <div class="border-2 border-dashed rounded-lg p-6 text-center">
            <p class="font-semibold">Property Images</p>
            <p class="text-sm text-gray-500 mb-4">Upload Multiple Property Images (JPG, PNG, WEBP, Max: 5MB each)</p>

            <label class="cursor-pointer inline-flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400 mb-2" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 15a4 4 0 014-4h.586a1 1 0 01.707.293l2.414 2.414a1 1 0 001.414 0l2.414-2.414a1 1 0 01.707-.293H17a4 4 0 014 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2v-1z" />
                </svg>
                <span class="text-gray-600">Click button below or drag files to upload</span>
                {{-- ✅ Corrected input name and id --}}
                <input type="file" name="property_images[]" id="property_images" class="hidden" accept="image/*" multiple>
                <span class="mt-3 px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded cursor-pointer">Upload Images</span>
            </label>

            @error('property_images.*')
            <div class="invalid-feedback text-red-600">
                {{ $message }}
            </div>
            @enderror
        </div>

        {{-- Image Previews --}}
        <div id="images-preview-container" class="hidden">
            <p class="font-semibold mb-2">Images Preview</p>
            <div id="images-preview" class="flex flex-wrap gap-4"></div>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between">
            <a href="{{ route('admin.properties.index') }}"
                class="px-4 py-2 border rounded bg-gray-100 hover:bg-gray-200">Back</a>
            <button type="submit"
                class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">Save</button>
        </div>
    </form>
</div>

{{-- Scripts --}}
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    // ✅ CKEditor for Description
    ClassicEditor.create(document.querySelector('#description')).catch(error => {
        console.error(error);
    });

    // ✅ Thumbnail preview
    function setupPreview(inputId, previewContainerId, previewId) {
        document.getElementById(inputId).addEventListener('change', function(event) {
            const file = event.target.files[0];
            const container = document.getElementById(previewContainerId);
            const preview = document.getElementById(previewId);
            preview.innerHTML = "";

            if (file) {
                container.classList.remove('hidden');
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.className = "w-40 h-28 object-cover rounded shadow";
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    }

    setupPreview('property_thumbnail', 'thumb-preview-container', 'thumb-preview');

    // ✅ Multiple image previews
    document.getElementById('property_images').addEventListener('change', function(event) {
        const files = event.target.files;
        const container = document.getElementById('images-preview-container');
        const preview = document.getElementById('images-preview');
        preview.innerHTML = "";

        if (files.length > 0) {
            container.classList.remove('hidden');
            Array.from(files).forEach(file => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgWrapper = document.createElement("div");
                    imgWrapper.className = "relative";
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.className = "w-40 h-28 object-cover rounded shadow";
                    imgWrapper.appendChild(img);
                    preview.appendChild(imgWrapper);
                };
                reader.readAsDataURL(file);
            });
        }
    });
</script>
@endpush
@endsection