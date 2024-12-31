<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - STMIK Bandung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body {
            scroll-behavior: smooth;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #007bff;
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
        }

        .header {
            background: url('https://via.placeholder.com/1920x1080') center/cover no-repeat;
            color: white;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .header::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 123, 255, 0.7);
            z-index: 0;
        }

        .header-content {
            z-index: 1;
            text-align: center;
        }

        .header-content img {
            margin-bottom: 20px;
        }

        .features {
            padding: 50px 0;
        }

        .feature-card {
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(9, 152, 255, 0.2);
        }

        footer {
            background-color:rgb(2, 133, 255);
            color: white;
            padding: 20px 0;
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">STMIK Bandung</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Fitur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Kontak</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary mx-2" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-secondary" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <img src="/images/stmikbadnung.png" alt="Logo STMIK Bandung" width="150">
            <h1>Selamat Datang di STMIK Bandung</h1>
            <p>Solusi lengkap untuk pengajuan proposal Anda</p>
            <a href="#features" class="btn btn-light btn-lg">Jelajahi Fitur Kami</a>
        </div>
    </header>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <h2 class="text-center mb-5">Fitur Kami</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card feature-card text-center p-4">
                        <i class="bi bi-speedometer2 display-4 text-primary"></i>
                        <h4 class="mt-3">Pengajuan Cepat</h4>
                        <p>Pengajuan proposal yang cepat dan mudah bagi mahasiswa.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card text-center p-4">
                        <i class="bi bi-shield-lock display-4 text-primary"></i>
                        <h4 class="mt-3">Keamanan</h4>
                        <p>Data Anda disimpan dengan aman dan terlindungi.</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card feature-card text-center p-4">
                        <i class="bi bi-layout-text-sidebar-reverse display-4 text-primary"></i>
                        <h4 class="mt-3">Mudah Digunakan</h4>
                        <p>Antarmuka yang intuitif dan mudah digunakan untuk semua pengguna</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Kontak Kami</h2>
            <form action="/contact" method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" placeholder="Nama " required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="mb-3">
    <textarea class="form-control" name="message" rows="5" placeholder="Pesan" required></textarea>
</div>
<div class="text-center">
    <button type="button" class="btn btn-primary" onclick="window.location.href='https://wa.me/qr/ONIURUR7VDVQL1'">
        Kirim Pesan
    </button>
</div>

                </div>
                    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Tentang Kami</h2>
            <p class="text-center">STMIK Bandung merupakan lembaga pendidikan tinggi terkemuka yang berdedikasi untuk menyediakan pendidikan berkualitas di bidang teknologi informasi. Misi kami adalah untuk memberdayakan mahasiswa dengan pengetahuan dan keterampilan yang diperlukan untuk unggul dalam karier mereka dan berkontribusi terhadap kemajuan teknologi.</p>
            <p class="text-center">Kami menawarkan berbagai program yang dirancang untuk memenuhi kebutuhan siswa dan tuntutan industri. Fakultas kami yang berpengalaman dan fasilitas canggih memastikan bahwa siswa menerima pendidikan komprehensif yang mempersiapkan mereka menghadapi tantangan tenaga kerja modern.</p>
            <div class="text-center">
    <button type="button" class="btn btn-primary" onclick="window.location.href='https://wa.me/qr/ONIURUR7VDVQL1'">
        Hubungi Kami
    </button>
        </div>
    </section>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 STMIK Bandung.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
