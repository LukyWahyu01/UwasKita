@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">
                <i class="fas fa-users me-2"></i> Manage Users
            </h3>
            <a href="{{ route('admin.create-user') }}" class="btn btn-light btn-sm shadow-sm">
                <i class="fas fa-user-plus me-1"></i> Create New User
            </a>
        </div>
        <div class="card-body">
            <!-- Tabel daftar pengguna -->
            <div class="table-responsive">
                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="table table-striped table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ ucfirst($user->role) }}</td>
            <td class="text-center">
                <!-- Edit user -->
                <a href="{{ route('admin.edit-user', $user->id) }}" class="btn btn-warning btn-sm me-2">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <!-- Delete user -->
                <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $user->id }})">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </td>
        </tr>
    @endforeach
</tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Konfirmasi Hapus Modal -->
<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this user? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteButton">
                    <i class="fas fa-trash"></i> Confirm Delete
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Custom Script -->
<script>
    let deleteFormId = null;

    function confirmDelete(userId) {
        deleteFormId = userId;
        const modal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
        modal.show();
    }

    document.getElementById('confirmDeleteButton').addEventListener('click', function () {
        if (deleteFormId) {
            document.getElementById(`delete-form-${deleteFormId}`).submit();
        }
    });
</script>

<!-- Custom CSS -->
<style>
    .table {
        border-collapse: collapse;
        border-radius: 8px;
        overflow: hidden;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 123, 255, 0.05);
    }

    .btn {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        background: linear-gradient(45deg, #007bff, #0056b3);
        color: white;
    }
</style>
@endsection
