<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credits | CashierApp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #111;
            color: #fff;
            overflow-x: hidden;
            height: 100vh;
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
        }

        .navbar-nav .nav-link:hover {
            color: #1A73E8 !important;
        }

        .credits-container {
            width: 100%;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .credits-text {
            white-space: nowrap;
            font-size: 24px;
            line-height: 2;
            font-weight: 400;
            animation: scroll 30s linear infinite;
            text-align: center;
        }

        @keyframes scroll {
            0% {
                transform: translateY(100%);
            }
            100% {
                transform: translateY(-100%);
            }
        }

        .container {
            position: relative;
            padding: 20px;
            text-align: center;
        }

        .title {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 30px;
            color: #1A73E8;
        }

        .subtitle {
            font-size: 20px;
            font-weight: 500;
            color: #ccc;
            margin-bottom: 50px;
        }

        .footer {
            background-color: #2c2c2c;
            color: #fff;
            padding: 40px 0;
            margin-top: 50px;
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
            <a class="navbar-brand" href="#"><i class="bi bi-cash-coin"></i> Cashier<span class="text-accent">App</span></a>
        </div>
    </nav>

    <!-- Credits Section -->
    <div class="credits-container">
        <div class="credits-text">
            <div>
                <h1 class="title">Credits</h1>
                <p class="subtitle">Aplikasi ini dibuat oleh tim yang berdedikasi dengan penuh semangat.</p>
                <div>
                    <p><strong>Tim Pengembang:</strong></p>
                    <p>Yudhistira Firdaus (Pengembang Utama)</p>
                    <p>Mahmudin S.Kom (Pembimbing Program)</p>
                    <p>? (Asesor UKK)</p>
                    <p>Seluruh teman teman yang membantu (Support)</p>
                </div>
                <div>
                    <p><strong>Sejarah Singkat Aplikasi:</strong></p>
                    <p>Aplikasi CashierApp dimulai sebagai proyek dari seorang pelajar SMK yang tertarik untuk mengembangkan sistem kasir yang sederhana namun efektif. Dengan latar belakang pengalaman dalam pengembangan web dan berbagai kebutuhan bisnis kecil, Yudhistira Firdaus memulai proyek ini pada tahun 2024 dengan tujuan untuk mempermudah transaksi di toko-toko kecil.</p>
                    <p>Setelah beberapa bulan pengembangan dan pengujian, CashierApp resmi dirilis pada awal 2025. Aplikasi ini dirancang untuk membantu para pemilik usaha kecil dalam mengelola penjualan, inventaris produk, dan transaksi pembayaran secara otomatis dengan antarmuka yang ramah pengguna.</p>
                </div>

                <p><strong>Terima kasih telah menggunakan CashierApp!</strong></p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>&copy; 2025 CashierApp. All Rights Reserved.</p>
                    <p><a href="https://github.com/YudhistiraF12" target="_blank">GitHub Repository</a></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
