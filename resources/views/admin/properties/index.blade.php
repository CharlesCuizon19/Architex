@extends('layouts.admin')

@section('title', 'Properties')

@section('content')
<!-- Page Title -->
<h1 class="text-2xl font-semibold mb-6">PROPERTIES</h1>

<!-- Top Bar -->
<div class="flex justify-between items-center mb-6">
    <!-- Create Button -->
    <a href="{{ route('admin.properties.create') }}"
        class="ml-auto inline-flex items-center gap-2 text-sm bg-gradient-to-r from-green-600 to-emerald-500 text-white px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">

        <!-- Plus Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>

        Create Property
    </a>
</div>

<!-- Table -->
<div class="overflow-x-auto bg-white border rounded-lg">
    <table class="table-fixed w-full border-collapse" id="properties-table">
        <thead>
            <tr class="bg-black text-white text-sm font-semibold">
                <th class="px-6 py-3 text-center w-16 rounded-tl-lg">ID</th>
                <th class="px-6 py-3 w-1/4">Name</th>
                <th class="px-6 py-3 w-1/3">Description</th>
                <th class="px-6 py-3 text-center">Thumbnail</th>
                <th class="px-6 py-3 text-center">Image</th>
                <th class="px-6 py-3 text-center w-40 rounded-tr-lg">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($properties as $property)
            <tr class="border-t">
                <td class="px-6 py-3 text-center">{{ $property->id }}</td>
                <td class="px-6 py-3 text-center">{{ $property->name }}</td>
                <td class="px-6 py-3 text-center">{!! Str::limit($property->description, 80) !!}</td>

                <td class="px-6 py-3 text-center">
                    <div class="flex justify-center items-center">
                        @if($property->property_thumbnail)
                        <img src="{{ asset($property->property_thumbnail) }}"
                            class="w-20 h-12 object-cover rounded shadow border" alt="Thumbnail">
                        @else
                        <span class="text-gray-400 italic">No Image</span>
                        @endif
                    </div>
                </td>


                <td class="px-6 py-3 text-center">
                    @if($property->images->count() > 0)
                    @php
                    $firstImage = $property->images->first();
                    $extraCount = $property->images->count() - 1;
                    @endphp

                    <div class="relative inline-block">
                        <img src="{{ asset($firstImage->image) }}"
                            class="w-20 h-12 object-cover rounded shadow border" alt="Property Image">

                        @if($extraCount > 0)
                        <div class="absolute inset-0 bg-black/60 flex items-center justify-center rounded">
                            <span class="text-white text-sm font-semibold">+{{ $extraCount }} more</span>
                        </div>
                        @endif
                    </div>
                    @else
                    <span class="text-gray-400 italic">No Image</span>
                    @endif
                </td>


                <td class="px-6 py-3 whitespace-nowrap">
                    <div class="flex justify-center items-center gap-2">
                        <a href="{{ route('admin.properties.edit', $property->id) }}"
                            class="px-3 py-1 rounded text-white bg-blue-500 hover:bg-blue-600 transition-colors">
                            Edit
                        </a>

                        <!-- Delete Form -->
                        <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST"
                            class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                class="delete-btn px-3 py-1 rounded text-white bg-red-500 hover:bg-red-600 transition-colors">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-6 text-gray-500 italic">No properties found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
<div class="mt-6">
    {{ $properties->links() }}
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#properties-table').DataTable({
            ordering: false
        });

        // ✅ SweetAlert Delete
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');

            Swal.fire({
                title: "Are you sure?",
                text: "This property will be permanently deleted.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif
@endpush