@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-header bg-gradient-primary text-white d-flex justify-content-between align-items-center">
            <h3 class="mb-0">
                <i class="fas fa-graduation-cap"></i> Selamat Datang Mahasiswa 
            </h3>
            <span class="badge bg-light text-dark">Role: {{ auth()->user()->role }}</span>
        </div>
        <div class="card-body">
            <div class="row align-items-center">
                <!-- Keterangan dan Tombol -->
                <div class="col-md-6 text-center text-md-start">
                    <p class="fs-4 mb-3">Hai, <strong>{{ auth()->user()->name }}</strong>!</p>
                    <p class="text-muted mb-4">
                        Kelola aktivitas Anda dan tetap dapatkan informasi terkini terkait perjalanan akademis Anda.
                    </p>
                    <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-md-start">
                        <a href="{{ route('proposals.index') }}" class="btn btn-primary btn-lg shadow-sm">
                            <i class="fas fa-file-alt me-2"></i> View Proposals
                        </a>
                        <a href="{{ route('profile') }}" class="btn btn-outline-secondary btn-lg shadow-sm">
                            <i class="fas fa-user me-2"></i> View Profile
                        </a>
                    </div>
                </div>
                <!-- Ilustrasi -->
                <div class="col-md-6 text-center">
                    <img src="{{ asset('images/stmikbadnung.png') }}" alt="Dashboard Illustration" 
                         class="img-fluid" style="max-height: 250px;">
                </div>
            </div>
        </div>
        <div class="card-footer bg-light d-flex justify-content-between">
            <a href="#" class="text-primary text-decoration-none">butuh bantuan?</a>
        </div>
    </div>
</div>
@endsection
