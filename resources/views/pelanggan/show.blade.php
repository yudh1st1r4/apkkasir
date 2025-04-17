<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pelanggan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-container {
            max-width: 400px;
            margin: auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 5px solid #002147; /* Biru Dongker */
        }
        .header {
            background: #007bff; /* Biru */
            padding: 20px;
            text-align: center;
            color: white;
            border-bottom: 5px solid #002147; /* Biru Dongker */
        }
        .header i {
            font-size: 50px;
        }
        .content {
            padding: 20px;
            background: white;
        }
        .icon-text {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #002147; /* Biru Dongker */
            margin: 5px 0;
        }
        .icon-text i {
            color: #007bff; /* Biru */
        }
        .btn-back {
            display: block;
            width: 100%;
            text-align: center;
            margin-top: 10px;
            background: #002147; /* Biru Dongker */
            color: white;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container vh-100 d-flex align-items-center justify-content-center">
    <div class="card-container">
        <!-- Header -->
        <div class="header">
            <i class="far fa-money-bill-alt"></i>
            <h2>Detail Pelanggan</h2>
        </div>

        <!-- Konten -->
        <div class="content">
            <h3><strong>Nama Pelanggan</strong></h3>
            <p style="color: grey;">Pelanggan Setia</p>

            <div class="mt-3">
                <div class="icon-text"><i class="fas fa-user"></i> {{ $pelanggan->nama }}</div>
                <div class="icon-text"><i class="fas fa-map-marker-alt"></i> {{ $pelanggan->alamat }}</div>
                <div class="icon-text"><i class="fas fa-envelope"></i> {{ $pelanggan->email }}</div>
                <div class="icon-text"><i class="fas fa-phone"></i> {{ $pelanggan->nomortelepon }}</div>
            </div>

            <!-- Tombol Kembali -->
            <a href="{{ route('pelanggan.index') }}" class="btn-back">Kembali</a>
        </div>
    </div>
</div>

</body>
</html>
