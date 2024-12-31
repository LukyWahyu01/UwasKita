create user

@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-header bg-gradient-primary text-white text-center">
            <h3 class="mb-0">
                <i class="fas fa-user-plus me-2"></i> Create New User
            </h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.store-user') }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row g-3">
                    <!-- Name -->
                    <div class="col-md-6">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <input type="text" class="form-control shadow-sm" id="name" name="name" placeholder="Enter full name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="invalid-feedback">Please enter a valid name.</div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control shadow-sm" id="email" name="email" placeholder="Enter email address" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                    </div>

                    <!-- Role -->
                    <div class="col-md-6">
                        <label for="role" class="form-label fw-bold">Role</label>
                        <select class="form-control shadow-sm" id="role" name="role" required>
                            <option value="" disabled selected>Select role</option>
                            <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="invalid-feedback">Please select a role.</div>
                    </div>

                    <!-- Password -->
                    <div class="col-md-6">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control shadow-sm" id="password" name="password" placeholder="Enter a strong password" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <div class="invalid-feedback">Please enter a valid password.</div>
                    </div>

                    <!-- Password Confirmation -->
                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label fw-bold">Confirm Password</label>
                        <input type="password" class="form-control shadow-sm" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                        <div class="invalid-feedback">Please confirm your password.</div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-lg shadow-sm">
                        <i class="fas fa-save me-2"></i> Create User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Custom Script for Form Validation -->
<script>
    (function () {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>

<!-- Custom CSS for Form Enhancements -->
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
        border-radius: 0.5rem;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .btn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .card-header {
        background: linear-gradient(45deg, #007bff, #0056b3);
    }
</style>
@endsection