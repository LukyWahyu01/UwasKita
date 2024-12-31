@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Status Pengajuan</h2>
        
        <!-- Menampilkan pesan flash jika ada -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="table-responsive">
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
                                <!-- Badge status dengan tooltip dan animasi -->
                                @if($proposal->status == 'draft')
                                    <span class="badge badge-warning p-2" data-toggle="tooltip" title="Proposal is in draft stage"><i class="fas fa-file-alt"></i> Draft</span>
                                @elseif($proposal->status == 'submitted')
                                    <span class="badge badge-info p-2" data-toggle="tooltip" title="Proposal has been submitted for review"><i class="fas fa-paper-plane"></i> Submitted</span>
                                @elseif($proposal->status == 'accepted')
                                    <span class="badge badge-success p-2" data-toggle="tooltip" title="Proposal has been accepted"><i class="fas fa-check-circle"></i> Accepted</span>
                                @elseif($proposal->status == 'rejected')
                                    <span class="badge badge-danger p-2" data-toggle="tooltip" title="Proposal has been rejected"><i class="fas fa-times-circle"></i> Rejected</span>
                                @elseif($proposal->status == 'revision')
                                    <span class="badge badge-warning p-2" data-toggle="tooltip" title="Proposal needs revision"><i class="fas fa-edit"></i> Revision</span>
                                @endif
                            </td>
                            <td>
                                <!-- Menampilkan tombol berdasarkan status proposal -->
                                @if($proposal->status == 'submitted')
                                    <button class="btn btn-dark btn-sm" data-toggle="modal" data-target="#confirmModal" data-action="{{ route('admin.proposals.accept', $proposal->id) }}" data-message="Are you sure you want to accept this proposal?"><i class="fas fa-check"></i> Accept</button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmModal" data-action="{{ route('admin.proposals.reject', $proposal->id) }}" data-message="Are you sure you want to reject this proposal?"><i class="fas fa-times"></i> Reject</button>
                                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#confirmModal" data-action="{{ route('admin.proposals.revision', $proposal->id) }}" data-message="Are you sure you want to send this proposal for revision?"><i class="fas fa-edit"></i> Revision</button>
                                @elseif($proposal->status == 'accepted' || $proposal->status == 'rejected' || $proposal->status == 'revision')
                                    <span class="text-muted">Action completed</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Konfirmasi -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirm Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalMessage">
                    Are you sure you want to proceed with this action?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <form id="modalForm" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Confirm</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Menambahkan script untuk tooltip dan modal interaktif -->
    @push('scripts')
        <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Font Awesome Icons -->
        <script>
            $(document).ready(function () {
                $('[data-toggle="tooltip"]').tooltip(); // Enable tooltips

                // Handle modal for form action
                $('#confirmModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var action = button.data('action'); // Extract action URL
                    var message = button.data('message'); // Extract message

                    // Update the modal's content
                    var modal = $(this);
                    modal.find('#modalMessage').text(message);
                    modal.find('#modalForm').attr('action', action);
                });
            });
        </script>
    @endpush
@endsection
