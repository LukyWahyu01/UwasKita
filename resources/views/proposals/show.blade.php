@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-lg">
            <div class="card-header bg-gradient-primary text-white">
                <h2 class="mb-0">{{ $proposal->title }}</h2>
            </div>
            <div class="card-body">
                <!-- Status -->
                <div class="mb-4">
                    <h5>Status:</h5>
                    <span class="badge {{ $proposal->status == 'draft' ? 'bg-secondary' : ($proposal->status == 'accepted' ? 'bg-success' : 'bg-warning') }}">
                        {{ ucfirst($proposal->status) }}
                    </span>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <h5>Description:</h5>
                    <p>{{ $proposal->description }}</p>
                </div>

                <!-- Action Button (Back to Proposals) -->
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('proposals.index') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-arrow-left me-2"></i>Back to Proposals
                    </a>
                    <a href="{{ route('proposals.edit', $proposal->id) }}" class="btn btn-warning btn-lg">
                        <i class="fas fa-edit me-2"></i>Edit Proposal
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Styles -->
    <style>
        /* Card Styling */
        .card {
            border-radius: 15px;
        }

        .card-header {
            background: linear-gradient(45deg, #007bff, #0056b3);
            color: white;
            padding: 15px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        /* Hover Effect for Action Buttons */
        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Badge for Status */
        .badge {
            font-size: 1rem;
            padding: 0.5rem 1rem;
            font-weight: bold;
        }

        /* Custom Font for Proposal Title */
        .card-header h2 {
            font-size: 1.8rem;
            font-weight: bold;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .card-header h2 {
                font-size: 1.5rem;
            }

            .btn-lg {
                font-size: 14px;
            }
        }
    </style>
@endsection
