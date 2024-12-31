@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
            <h3><i class="fas fa-user-edit me-2"></i> Edit Profil</h3>
            <a href="{{ route('profile') }}" class="btn btn-light btn-sm shadow-sm">
                <i class="fas fa-arrow-left me-1"></i> Kembali ke Profil
            </a>
        </div>
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="POST" id="editProfileForm">
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label fw-bold">Nama</label>
                    <input type="text" class="form-control bg-light shadow-sm" id="name" name="name" value="{{ $user->name }}" required>
                    <small class="text-muted">Nama lengkap Anda seperti yang muncul di profil.</small>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control bg-light shadow-sm" id="email" name="email" value="{{ $user->email }}" required>
                    <small class="text-muted">Kami akan mengirimkan pembaruan ke email ini.</small>
                </div>
                <div class="mb-4">
                    <label for="role" class="form-label fw-bold">Peran</label>
                    <input type="text" class="form-control bg-light shadow-sm" id="role" name="role" value="{{ $user->role }}" readonly>
                    <small class="text-muted">Peran Anda saat ini tidak dapat diubah.</small>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <button type="reset" class="btn btn-secondary shadow-sm">
                        <i class="fas fa-undo me-2"></i> Atur Ulang
                    </button>
                    <button type="submit" class="btn btn-primary shadow-sm">
                        <i class="fas fa-save me-2"></i> Perbarui Profil
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Konfirmasi Perubahan Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin memperbarui profil dengan perubahan ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" id="confirmUpdateBtn">
                    <i class="fas fa-check me-2"></i> Ya, Perbarui
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Custom Script for Modal and Notification -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('editProfileForm');
        const confirmButton = document.getElementById('confirmUpdateBtn');
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));
            confirmationModal.show();
        });

        confirmButton.addEventListener('click', function () {
            const successToast = new bootstrap.Toast(document.getElementById('successToast'));
            successToast.show();
            setTimeout(() => {
                form.submit();
            }, 1000); // Memberi jeda sebelum form dikirim
        });
    });
</script>

<!-- Toast Notification -->
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
    <div id="successToast" class="toast bg-success text-white border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <strong class="me-auto"><i class="fas fa-check-circle me-2"></i> Berhasil</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Tutup"></button>
        </div>
        <div class="toast-body">
            Profil Anda telah berhasil diperbarui!
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    .form-control {
        border-radius: 0.5rem;
        transition: box-shadow 0.3s ease;
    }

    .form-control:focus {
        box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        border-color: rgba(0, 123, 255, 0.8);
    }

    .btn {
        transition: transform 0.2s ease;
    }

    .btn:hover {
        transform: scale(1.05);
    }
</style>
@endsection
