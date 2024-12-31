@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-header bg-gradient-primary text-white d-flex align-items-center">
        <h3 class="mb-0 text-black">
    <i class="fas fa-user-circle me-2"></i> Profile Anda
</h3>

        </div>
        <div class="card-body">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control bg-light" id="name" value="{{ $user->name }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control bg-light" id="email" value="{{ $user->email }}" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label fw-bold">Role</label>
                        <input type="text" class="form-control bg-light" id="role" value="{{ $user->role }}" disabled>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/perempuan.png') }}" alt="Profile Illustration" class="img-fluid" style="max-height: 200px;">
                </div>
            </div>
        </div>
        <div class="card-footer bg-light d-flex justify-content-between align-items-center">
            <button type="button" class="btn btn-primary shadow-sm hover-effect" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                <i class="fas fa-edit me-2"></i> Edit Profile
            </button>
            <small class="text-muted">Last updated: {{ $user->updated_at->format('d M Y') }}</small>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin mengedit profil Anda?</p>
                <p class="text-muted small">Ini akan mengarahkan Anda ke halaman edit profil</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                    <i class="fas fa-arrow-right me-2"></i> Lanjutkan
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Tooltip Initialization -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
</script>

<!-- Custom CSS for Hover Effects -->
<style>
    .hover-effect:hover {
        transform: scale(1.05);
        transition: transform 0.3s ease-in-out;
    }
    .text-black {
        color: black;
    }
</style>
@endsection
