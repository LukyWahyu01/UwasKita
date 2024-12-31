<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
        }
        .navbar {
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }
        .sidebar {
            background-color: #fff;
            color: #333;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
            height: 100vh;
        }
        .sidebar a {
            color: #333;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .sidebar a.active, .sidebar a:hover {
            background: #2575fc;
            color: #fff;
        }
    </style>

    <!-- Push custom styles from views -->
    @stack('styles')
</head>
<body>
    <div id="app">
        <!-- Top Bar -->
        @include('partials.topbar')

        <div class="d-flex">
            <!-- Sidebar -->
            @include('partials.sidebar')

            <!-- Main Content -->
            <div class="container-fluid p-4" style="flex-grow: 1;">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
