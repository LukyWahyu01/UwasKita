<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand fw-bold" href="#">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>

        <!-- Toggler for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <!-- Profile Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/orang.png') }}" alt="User Avatar" class="rounded-circle me-2" style="width: 32px; height: 32px;">
                        <span>{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="fas fa-user-circle me-2"></i> Profil Saya</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Custom Styles -->
<style>
    .navbar {
        padding: 1rem;
        transition: background-color 0.3s ease, transform 0.3s ease;
        background-color: #2c3e50; /* Updated background color */
    }

    .navbar:hover {
        transform: translateY(-2px); /* Subtle effect on hover */
    }

    .navbar-brand {
        font-size: 1.25rem;
        transition: transform 0.2s ease;
    }

    .navbar-brand:hover {
        transform: scale(1.1);
    }

    .nav-link {
        color: #fff;
        transition: color 0.3s ease;
    }

    .nav-link:hover {
        color: #ffdd57; /* A soft yellow color on hover */
    }

    .dropdown-menu {
        border-radius: 0.5rem;
        border: none;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        background-color: #34495e; /* Dropdown background color */
    }

 

    /* Responsive navbar tweaks */
    @media (max-width: 992px) {
        .navbar {
            padding: 0.8rem;
        }
    }
</style>
