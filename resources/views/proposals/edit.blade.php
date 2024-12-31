@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-4">Edit Proposal</h2>

        <!-- Form untuk mengedit proposal -->
        <form action="{{ route('proposals.update', $proposal->id) }}" method="POST" id="editProposalForm" novalidate>
            @csrf
            @method('PUT')
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-body">
                    <!-- Input Title -->
                    <div class="mb-4">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ old('title', $proposal->title) }}" required>
                        <div class="invalid-feedback">
                            Please enter a title for the proposal.
                        </div>
                    </div>

                    <!-- Textarea Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="description" rows="4" required>{{ old('description', $proposal->description) }}</textarea>
                        <div class="invalid-feedback">
                            Please provide a description.
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-lg w-50">
                            <i class="fas fa-pencil-alt me-2"></i> Update Proposal
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Custom JS for form validation -->
    <script>
        // JavaScript untuk validasi form custom
        (function () {
            'use strict';
            window.addEventListener('load', function () {
                // Ambil semua form yang perlu divalidasi
                var forms = document.getElementsByClassName('needs-validation');
                // Loop melalui form dan cegah submit jika tidak valid
                Array.prototype.filter.call(forms, function (form) {
                    form.addEventListener('submit', function (event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();
    </script>

    <!-- Custom CSS for more styling -->
    <style>
        /* Custom Form Input Styling */
        .form-control:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            border-color: #007bff;
        }

        .form-label {
            font-weight: bold;
        }

        /* Hover effect on the Submit button */
        .btn-primary {
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Card Styling */
        .card-body {
            background-color: #f9f9f9;
        }

        .card {
            border-radius: 15px;
        }

        .container {
            max-width: 600px;
        }

        /* Make the Submit button bigger */
        .btn-lg {
            font-size: 18px;
        }

        /* Form background with a slight shadow */
        .card {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        /* Invalid input styling */
        .form-control.is-invalid {
            border-color: #dc3545;
        }
        .form-control.is-invalid:focus {
            box-shadow: 0 0 5px rgba(220, 53, 69, 0.5);
        }
    </style>
@endsection
