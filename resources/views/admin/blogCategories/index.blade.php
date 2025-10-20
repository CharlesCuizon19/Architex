@extends('layouts.admin')

@section('title', 'Blog Categories')

@section('content')
<!-- Page Title -->
<h1 class="text-2xl font-semibold mb-6">BLOG CATEGORIES</h1>

<!-- Top Bar -->
<div class="flex justify-between items-center mb-6">
    <!-- Create Button -->
    <button type="button"
        onclick="openCreateModal()"
        class="ml-auto inline-flex items-center gap-2 text-sm bg-gradient-to-r from-green-600 to-emerald-500 text-white px-6 py-3 rounded-xl shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">

        <!-- Plus Icon -->
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
            stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>

        Create Category
    </button>
</div>


<!-- Table -->
<div class="overflow-x-auto bg-white border rounded-lg">
    <table class="table-fixed w-full border-collapse" id="users-table">
        <thead>
            <tr class="bg-black text-white text-sm font-semibold">
                <th class="px-10 py-3 rounded-tl-lg text-center w-1/4">ID</th>
                <th class="px-10 py-3 w-1/4">Name</th>
                <th class="text-center w-[20%]">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($blogCategories as $blogCategory)
            <tr class="border-t" id="row-{{ $blogCategory->id }}">
                <td class="px-10 py-3 text-center">{{ $blogCategory->id }}</td>
                <td class="px-10 py-3 text-center">{{ $blogCategory->category_name }}</td>
                <td class="px-6 py-3">
                    <div class="flex justify-center items-center gap-2">
                        <button type="button"
                            onclick="deleteCategory({{ $blogCategory->id }})"
                            class="px-3 py-1 rounded text-white"
                            style="background-color:#EF4444;">
                            Delete
                        </button>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center py-4 text-gray-500">No categories found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Create Category Modal -->
<div id="create-modal"
    class="fixed inset-0 bg-black bg-opacity-30 hidden flex items-center justify-center z-50 backdrop-blur-sm">
    <div class="bg-white rounded-3xl shadow-lg p-8 w-[600px] max-w-full animate-fade-in">
        <h2 class="text-lg font-semibold mb-6 text-gray-800">CREATE CATEGORY</h2>

        <form id="create-form" method="POST" action="{{ route('admin.blogCategories.store') }}">
            @csrf
            <div class="mb-4">
                <label for="category_name" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input type="text" name="category_name" id="category_name"
                    class="mt-1 block w-full border rounded px-3 py-2 focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none"
                    required>
            </div>

            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" onclick="closeCreateModal()"
                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 transition">
                    Cancel
                </button>
                <button type="submit"
                    class="px-4 py-2 bg-black text-white rounded hover:bg-gray-800 transition">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // ✅ CSRF token setup for AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let table;

    // 🔹 SweetAlert Delete
    function deleteCategory(categoryId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "This action cannot be undone!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#EF4444',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "/admin/blogCategories/" + categoryId,
                    method: "POST",
                    data: {
                        _method: "DELETE"
                    },
                    success: function(response) {
                        table.row($('#row-' + categoryId)).remove().draw();

                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'The category has been deleted.',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    },
                    error: function(xhr) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: xhr.responseJSON?.message || 'Something went wrong.',
                            confirmButtonColor: '#EF4444'
                        });
                    }
                });
            }
        });
    }

    function openCreateModal() {
        document.getElementById('create-modal').classList.remove('hidden');
    }

    function closeCreateModal() {
        document.getElementById('create-modal').classList.add('hidden');
        document.getElementById('create-form').reset();
    }

    $(document).ready(function() {
        table = $('#users-table').DataTable({
            ordering: false
        });

        $('#create-form').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('admin.blogCategories.store') }}",
                method: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    table.row.add([
                        `<div class="text-center">${response.id}</div>`,
                        `<div class="text-center">${response.category_name}</div>`,
                        `
                        <div class="flex justify-center items-center gap-2">
                            <button type="button"
                                onclick="deleteCategory(${response.id})"
                                class="px-3 py-1 rounded text-white"
                                style="background-color:#EF4444;">
                                Delete
                            </button>
                        </div>
                        `
                    ]).draw(false);

                    closeCreateModal();

                    Swal.fire({
                        icon: 'success',
                        title: 'Category Created!',
                        text: 'Your category has been successfully saved.',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: xhr.responseJSON?.message || 'Something went wrong.',
                        confirmButtonColor: '#EF4444'
                    });
                }
            });
        });
    });
</script>

<style>
    /* 🔹 Soft modal fade-in animation */
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.25s ease-out;
    }
</style>
@endpush