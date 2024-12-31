<div class="sidebar p-3 bg-light shadow-lg" style="width: 250px; min-height: 100vh; background-color: #f7f7f7;">
    <h5 class="text-center fw-bold text-primary mb-4">Menu</h5>
    <div class="list-group list-group-flush">
        <!-- Sidebar untuk Mahasiswa -->
        @if(auth()->user()->role == 'mahasiswa')
            <a href="{{ route('mahasiswa.dashboard') }}" 
               class="list-group-item list-group-item-action {{ request()->is('mahasiswa') ? 'active' : '' }} d-flex align-items-center">
                <i class="fas fa-home me-3 text-primary"></i> Dashboard
            </a>
            <a href="{{ route('profile') }}" 
               class="list-group-item list-group-item-action {{ request()->is('profile') ? 'active' : '' }} d-flex align-items-center">
                <i class="fas fa-user me-3 text-secondary"></i> Profile
            </a>
            <a href="{{ route('proposals.index') }}" 
               class="list-group-item list-group-item-action d-flex align-items-center">
                <i class="fas fa-book me-3 text-success"></i> Proposal
            </a>
          
        @endif

        <!-- Sidebar untuk Admin -->
        @if(auth()->user()->role == 'admin')
            <a href="{{ route('admin.dashboard') }}" 
               class="list-group-item list-group-item-action {{ request()->is('admin') ? 'active' : '' }} d-flex align-items-center">
                <i class="fas fa-home me-3 text-primary"></i> Dashboard
            </a>
            <a href="{{ route('profile') }}" 
               class="list-group-item list-group-item-action {{ request()->is('profile') ? 'active' : '' }} d-flex align-items-center">
                <i class="fas fa-user me-3 text-secondary"></i> Profile
            </a>
            <a href="{{ route('admin.status-pengajuan') }}" 
               class="list-group-item list-group-item-action {{ request()->is('admin/status-pengajuan') ? 'active' : '' }} d-flex align-items-center">
                <i class="fas fa-check-circle me-3 text-success"></i> Status Pengajuan
            </a>
            <a href="{{ route('admin.manage-users') }}" 
               class="list-group-item list-group-item-action {{ request()->is('admin/manage-users') ? 'active' : '' }} d-flex align-items-center">
                <i class="fas fa-users me-3 text-warning"></i> Manage Users
            </a>
          
        @endif
    </div>
</div>

<!-- Custom Styles -->
<style>
    .sidebar {
        background-color: #f7f7f7; /* Soft light gray background */
        padding-top: 20px;
    }

    .list-group-item {
        border: none;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .list-group-item:hover {
        background-color: #e1e1e1; /* Light gray on hover */
        transform: scale(1.03); /* Subtle zoom effect */
    }

    .list-group-item.active {
        background-color: #007bff; /* Highlight active item */
        color: white;
    }

    .list-group-item i {
        font-size: 18px;
    }

    /* Adjust icons for better alignment */
    .list-group-item .me-3 {
        margin-right: 15px;
    }

    .sidebar h5 {
        font-size: 1.5rem;
    }

    /* Sidebar for smaller screens */
    @media (max-width: 992px) {
        .sidebar {
            width: 200px; /* Reduce width for mobile */
            padding: 15px;
        }

        .list-group-item {
            font-size: 14px; /* Smaller text for mobile */
        }
    }
</style>
