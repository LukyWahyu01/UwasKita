<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - STMIK Bandung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #6ab1d7, #007bff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }
        .logo {
            max-width: 100px;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card p-4" style="max-width: 400px; margin: auto;">
            <div class="text-center">
                <img src="{{ asset('images/stmikbadnung.png') }}" alt="STMIK Bandung Logo" class="logo">
                <h3 class="mb-4">Buat Account Anda</h3>
            </div>
            <form action="{{ route('register') }}" method="POST">
    @csrf
    <!-- Nama Lengkap -->
    <div class="mb-3">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Lengkap" required>
    </div>
    
    <!-- Alamat Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Alamat Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email" required>
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
    </div>

    <!-- Konfirmasi Password -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password Anda" required>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary w-100">Daftar</button>
</form>


            <div class="text-center mt-3">
                <small class="text-muted">Sudah Punya Account? <a href="{{ route('login') }}" class="text-decoration-none">Login </a></small>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
