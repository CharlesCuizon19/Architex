@extends('layouts.admin')

@section('title', 'Homepage Banner / Edit Banner')

@section('content')
<div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6">EDIT BANNER</h1>

    <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')


        {{-- Title --}}
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title"
                class="mt-1 block w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500"
                value="{{ old('title', $banner->title) }}" required>
            @error('title')
            <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        {{-- Subtitle --}}
        <div>
            <label for="subtitle" class="block text-sm font-medium text-gray-700">Subtitle</label>
            <textarea name="subtitle" id="subtitle" rows="5"
                class="mt-1 block w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500">{{ old('subtitle', $banner->subtitle) }}</textarea>
            @error('subtitle')
            <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        {{-- File Upload --}}
        <div class="border-2 border-dashed rounded-lg p-6 text-center">
            <p class="font-semibold">Image Upload</p>
            <p class="text-sm text-gray-500 mb-4">Upload a Picture.<br>
                Max of 2MB (image)
            </p>

            <label class="cursor-pointer inline-flex flex-col items-center">
                <input type="file" name="image" id="image" class="hidden" accept="image/*">
                <span class="mt-3 px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded cursor-pointer">Upload File</span>
            </label>

            {{-- Current Image --}}
            @if ($banner->image)
            <div id="current-image" class="mt-4 text-center">
                <p class="text-sm font-medium mb-2">Current Image:</p>
                <div class="flex justify-center">
                    <img src="{{ asset( $banner->image) }}"
                        class="w-40 h-28 object-cover rounded shadow">
                </div>
            </div>
            @endif

            {{-- New Image Preview --}}
            <div id="new-image-container" class="hidden mt-4 text-center">
                <p class="text-sm font-medium mb-2">New Image Preview:</p>
                <div class="relative inline-block">
                    <img id="new-image-preview" class="w-40 h-28 object-cover rounded shadow">
                    <button type="button" id="remove-new-image"
                        class="absolute top-0 right-0 -mt-2 -mr-2 bg-red-600 text-white rounded-full w-7 h-7 flex items-center justify-center text-sm shadow-lg hover:bg-red-700 transition">
                        ✖
                    </button>
                </div>
            </div>



            @error('image')
            <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>



        {{-- Buttons --}}
        <div class="flex justify-between">
            <a href="{{ route('admin.banners.index') }}"
                class="px-4 py-2 border rounded bg-gray-100 hover:bg-gray-200">Back</a>
            <button type="submit"
                class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800">Update</button>
        </div>
    </form>
</div>

{{-- CKEditor --}}
@push('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor.create(document.querySelector('#subtitle')).catch(error => {
        console.error(error);
    });

    document.getElementById('image').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const currentImage = document.getElementById('current-image');
        const newImageContainer = document.getElementById('new-image-container');
        const newImagePreview = document.getElementById('new-image-preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                newImagePreview.src = e.target.result;
                newImageContainer.classList.remove('hidden');
                currentImage.classList.add('hidden'); // hide current image when new selected
            }
            reader.readAsDataURL(file);
        }
    });

    // Remove new image and keep current
    document.getElementById('remove-new-image').addEventListener('click', function() {
        document.getElementById('image').value = ""; // clear file input
        document.getElementById('new-image-container').classList.add('hidden');
        document.getElementById('current-image').classList.remove('hidden');
    });
</script>
</script>
@endpush
@endsection