<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
            background-color: #f9f9f9;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .section-header {
            margin-bottom: 40px;
        }

        .section-subtitle {
            font-size: 14px;
            font-weight: 600;
            color: #1A73E8;
            text-transform: uppercase;
            letter-spacing: 1px;
            display: block;
            margin-bottom: 10px;
        }

        .section-title {
            font-size: 36px;
            font-weight: 700;
            color: #333;
            margin-bottom: 15px;
        }

        .section-description {
            font-size: 18px;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .text-accent {
            color: #1A73E8;
        }

        .btn-primary {
            background-color: #1A73E8;
            border-color: #1A73E8;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #155ab6;
            border-color: #155ab6;
            transform: scale(1.05);
        }

        .navbar {
            background-color: #333;
            padding: 15px 0;
        }

        .navbar-brand {
            font-size: 24px;
            font-weight: 700;
            color: #fff !important;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-size: 16px;
            font-weight: 500;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #1A73E8 !important;
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }

        .hero {
            position: relative;
            background-image: url('https://i.pinimg.com/736x/2c/85/77/2c857711709b9bcc2f8c77a9762b1061.jpg');
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 100px 0 80px;
            overflow: hidden;
            height:450px;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
        }

        .hero-shape {
            position: absolute;
            bottom: -50px;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to bottom, rgba(255, 111, 97, 0) 0%, #1A73E8 100%);
            z-index: 1;
        }

        .stats {
            background-color: #fff;
            padding: 40px 0;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 36px;
            font-weight: 700;
            color: #333;
            margin-bottom: 10px;
        }

        .stat-text {
            font-size: 16px;
            color: #666;
        }

        .process-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .process-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .process-icon {
            margin: 0 auto 20px;
            width: 60px;
            height: 60px;
            background-color: #1A73E8;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 24px;
        }

        .footer {
            background-color: #2c2c2c;
            color: #fff;
            padding: 40px 0;
        }

        .footer h5 {
            margin-bottom: 20px;
        }

        .footer ul li {
            margin-bottom: 8px;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        .footer a:hover {
            color: #1A73E8;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="far fa-money-bill-alt"></i> Cashier<span class="text-accent">App</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="#planner">About</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero -->
    <header class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start mb-5 mb-lg-0">
                    <h1>Optimize Your Sales</h1>
                    <p class="lead">Let our App help you manage your cashier system efficiently and effectively.</p>
                    <div class="animate__animated animate__fadeInUp animate__delay-2s">
                        <a href="#how-it-works" class="btn btn-primary btn-lg me-2">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-shape"></div>
    </header>
    <section class="stats py-4">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-3">
                    <h3 class="stat-number">100%</h3>
                    <p class="stat-text">Aplikasi Kasir Buatan SMK</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h3 class="stat-number">4+</h3>
                    <p class="stat-text">Fitur Unggulan</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h3 class="stat-number">98%</h3>
                    <p class="stat-text">Tingkat Kepuasan Pengguna</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section id="how-it-works" class="py-5 animate__animated animate__fadeInUp">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-subtitle">Proses Sederhana</span>
                <h2 class="section-title">Cara Kerja Aplikasi Kasir</h2>
                <p class="section-description">Aplikasi kasir kami memudahkan transaksi bisnis Anda dalam tiga langkah mudah</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="process-card">
                        <div class="process-icon"><i class="bi bi-cart"></i></div>
                        <h3>Tambah Produk</h3>
                        <p>Masukkan produk yang ingin dijual ke dalam aplikasi kasir Anda.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="process-card">
                        <div class="process-icon"><i class="bi bi-credit-card"></i></div>
                        <h3>Proses Pembayaran</h3>
                        <p>Terima pembayaran dengan mudah menggunakan berbagai metode pembayaran.</p>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="process-card">
                        <div class="process-icon"><i class="bi bi-receipt"></i></div>
                        <h3>Cetak Struk</h3>
                        <p>Setelah transaksi selesai, cetak struk pembelian untuk pelanggan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <h5>Cashier<span class="text-accent">App</span></h5>
                    <p>Let our App help you manage your cashier system efficiently and effectively.</p>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mb-4">
                            <h5>Quick Links</h5>
                            <ul class="list-unstyled">
                                <li><a href="#">About</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-8 col-md-6 mb-4">
                            <h5 class="mb-3">👨‍💻 Data Pembuat</h5>
                            <ul class="list-unstyled">
                                <li><i class="bi bi-person-fill me-2"></i> Nama: Yudhistira Firdaus</li>
                                <li><i class="bi bi-mortarboard-fill me-2"></i> Sekolah: SMK Informatika UTAMA</li>
                                <li><i class="bi bi-envelope-fill me-2"></i> Email: yudhistiraf12@email.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
