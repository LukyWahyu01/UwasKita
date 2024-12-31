@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ __('Dashboard') }}</h4>
                </div>
                <div class="card-body">
                    <!-- Tampilkan pesan status jika ada -->
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i> {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Logika Role -->
                    @if (auth()->user()->role === 'admin')
                        <script>
                            window.location.href = "{{ route('admin.dashboard') }}";
                        </script>
                    @elseif (auth()->user()->role === 'mahasiswa')
                        <script>
                            window.location.href = "{{ route('mahasiswa.dashboard') }}";
                        </script>
                    @else
                        <div class="alert alert-danger" role="alert">
                            <i class="fas fa-exclamation-triangle me-2"></i> {{ __('Akses tidak diizinkan.') }}
                        </div>
                        <p class="text-center mt-3">
                            <a href="{{ route('home') }}" class="btn btn-secondary">
                                <i class="fas fa-home me-2"></i> Kembali ke Beranda
                            </a>
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional Custom Styles -->
<style>
    .card {
        border-radius: 1rem;
        overflow: hidden;
    }

    .card-header {
        font-size: 1.25rem;
        font-weight: bold;
    }

    .btn {
        transition: transform 0.2s ease;
    }

    .btn:hover {
        transform: scale(1.05);
    }
</style>
@endsection
