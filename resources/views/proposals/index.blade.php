@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">Status Pengajuan</h2>

        <!-- Tabel Proposal dalam Card -->
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proposals as $proposal)
                            <tr>
                                <td>{{ $proposal->title }}</td>
                                <td>
                                    <span class="badge {{ $proposal->status == 'draft' ? 'bg-secondary' : ($proposal->status == 'accepted' ? 'bg-success' : 'bg-warning') }}">
                                        {{ ucfirst($proposal->status) }}
                                    </span>
                                </td>
                                <td class="d-flex justify-content-start">
                                    @if($proposal->status == 'draft')
                                        <!-- Form untuk submit proposal -->
                                        <form action="{{ route('proposals.submit', $proposal->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm me-2">Submit</button>
                                        </form>
                                    @else
                                        <a href="{{ route('proposals.show', $proposal->id) }}" class="btn btn-info btn-sm me-2">View</a>
                                    @endif

                                    <!-- Tombol Edit -->
                                    <a href="{{ route('proposals.edit', $proposal->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>

                                    <!-- Tombol Delete dengan konfirmasi -->
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $proposal->id }})">Delete</button>

                                    <!-- Form untuk menghapus proposal (hidden) -->
                                    <form id="delete-form-{{ $proposal->id }}" action="{{ route('proposals.destroy', $proposal->id) }}" method="POST" style="display:none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Tombol untuk membuat proposal baru di kanan atas -->
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('proposals.create') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-plus-circle me-2"></i>Create New Proposal
            </a>
        </div>
    </div>

    <!-- Modal Konfirmasi Hapus Proposal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationLabel">Delete Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this proposal? This action cannot be undone.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Confirm Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Script untuk Konfirmasi Hapus -->
    <script>
        let deleteFormId = null;

        function confirmDelete(proposalId) {
            deleteFormId = proposalId;
            const modal = new bootstrap.Modal(document.getElementById('deleteConfirmationModal'));
            modal.show();
        }

        document.getElementById('confirmDeleteButton').addEventListener('click', function () {
            if (deleteFormId) {
                document.getElementById('delete-form-' + deleteFormId).submit();
            }
        });
    </script>

    <!-- Custom CSS untuk tampilan lebih menarik -->
    <style>
        /* Hover Effect on Table Rows */
        tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* Animasi Hover pada Tombol */
        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Badge Status */
        .badge {
            font-size: 0.85rem;
            padding: 0.4rem 0.7rem;
        }

        /* Modal Custom Styling */
        .modal-content {
            border-radius: 10px;
        }

        /* Tombol buat proposal baru */
        .btn-lg {
            font-size: 18px;
        }

        /* Responsif Tabel */
        @media (max-width: 768px) {
            .table {
                font-size: 14px;
            }

            .btn-sm {
                font-size: 12px;
            }
        }
    </style>
@endsection
