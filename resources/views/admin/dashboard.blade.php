@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-header bg-gradient-success text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">
                <i class="fas fa-tools me-2"></i> Selamat datang Admin
            </h3>
            <span class="badge bg-light text-success">
                <i class="fas fa-user-shield me-1"></i> {{ auth()->user()->role }}
            </span>
        </div>
        <div class="card-body">
            <p class="text-muted">
                <i class="fas fa-info-circle me-2"></i> Di sini Anda dapat mengelola pengaturan sistem, pengguna, dan banyak lagi.
            </p>
            <div class="text-center mt-4">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-lg shadow-sm">
                        <i class="fas fa-sign-out-alt me-2"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
        <div class="card-footer bg-light text-muted text-center">
            <small>Last login: {{ auth()->user()->last_login_at ?? 'N/A' }}</small>
        </div>
    </div>
</div>

<!-- Custom Styles -->
<style>
    .card {
        border-radius: 1rem;
        overflow: hidden;
    }

    .card-header {
        font-size: 1.25rem;
        font-weight: bold;
        text-transform: uppercase;
        background: linear-gradient(45deg, #28a745, #218838);
    }

    .btn {
        border-radius: 0.5rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .card-footer {
        font-size: 0.9rem;
    }

    .badge {
        font-size: 0.85rem;
        padding: 0.5em 0.75em;
    }

    .text-muted {
        font-size: 1rem;
    }
</style>
@endsection
