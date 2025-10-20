@extends('layouts.admin')

@section('title', 'Services')

@section('content')
<!-- Page Title -->
<h1 class="text-2xl font-semibold mb-6">SERVICES</h1>

<!-- Top Bar -->
<div class="flex justify-between items-center mb-6">
    <a href="{{ route('admin.services.create') }}"
        class="ml-auto inline-flex items-center gap-2 text-sm bg-gradient-to-r from-green-600 to-emerald-500 text-white px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Create Service
    </a>
</div>

<!-- Table -->
<div class="overflow-x-auto bg-white border rounded-lg">
    <table class="table-fixed w-full border-collapse" id="services-table">
        <thead>
            <tr class="bg-black text-white text-sm font-semibold">
                <th class="px-6 py-3 text-center rounded-tl-lg w-1/4">ID</th>
                <th class="px-6 py-3 w-1/4">Title</th>
                <th class="px-6 py-3 w-1/4">Description</th>
                <th class="px-6 py-3 text-center w-1/4">Image</th>
                <th class="px-6 py-3 text-center rounded-tr-lg w-40">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($services as $service)
            <tr class="border-t">
                <td class="px-6 py-3 text-center">{{ $service->id }}</td>
                <td class="px-6 py-3 text-center">{{ $service->title }}</td>
                <td class="px-6 py-3 text-center">{!! Str::limit($service->description, 100) !!}</td>
                <td class="px-6 py-3 text-center">
                    @if($service->image)
                    <img src="{{ asset($service->image) }}"
                        alt="{{ $service->title }} Image"
                        class="h-16 w-24 object-cover mx-auto rounded shadow">
                    @else
                    <span class="text-gray-400 italic">No Image</span>
                    @endif
                </td>
                <td class="px-6 py-3 text-center">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('admin.services.edit', $service->id) }}"
                            class="px-3 py-1 rounded text-white bg-green-800">
                            Edit
                        </a>
                        <button type="button" onclick="confirmDelete({{ $service->id }})"
                            class="px-3 py-1 rounded text-white bg-red-500 hover:bg-red-600">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center py-6 text-gray-500 italic">
                    No services found.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#services-table').DataTable({
            ordering: false
        });
    });

    // SweetAlert Delete Confirmation
    function confirmDelete(serviceId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete this service? This action cannot be undone.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                let form = document.createElement('form');
                form.method = 'POST';
                form.action = "/admin/services/" + serviceId;

                let csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = "{{ csrf_token() }}";

                let method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';

                form.appendChild(csrf);
                form.appendChild(method);
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
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