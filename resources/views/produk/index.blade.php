<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk</title>
    <!-- Link CDN untuk Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #222;
            padding: 10px 0;
            display: flex;
            justify-content: center;
        }
        .navbar-container {
            display: flex;
            gap: 20px;
        }
        .navbar-container a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            padding: 10px;
            transition: background 0.3s ease;
        }
        .navbar-container a:hover, .navbar-container a.active {
            background-color: #444;
            border-radius: 5px;
        }
        .navbar-container i {
            margin-right: 8px;
        }
        h1 {
            text-align: center;
            margin-top: 30px;
        }
        a {
            background-color: #555;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin: 10px 0;
            display: inline-block;
        }
        a:hover {
            background-color: #666;
        }
        .products-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .product-card {
            background-color: #222;
            border-radius: 5px;
            width: 250px;
            padding: 20px;
            text-align: center;
        }
        .product-image {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .product-info {
            padding: 10px;
        }
        .product-name {
            font-size: 1.2em;
            margin: 10px 0;
        }
        .product-description {
            font-size: 0.9em;
            color: #ccc;
            margin: 10px 0;
        }
        .product-price {
            font-size: 1.1em;
            margin: 10px 0;
        }
        .product-stock {
            font-size: 0.9em;
            color: #ccc;
            margin: 10px 0;
        }
        .edit-button, .delete-button {
            padding: 8px 15px;
            background-color: #555;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-top: 10px;
            display: inline-block;
        }
        .edit-button:hover, .delete-button:hover {
            background-color: #666;
        }
        .delete-form {
            display: inline-block;
            margin-top: 10px;
        }
        .add-button {
            background-color: #555;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin: 20px;
        }
        .add-button:hover {
            background-color: #666;
        }
        .success-message {
            background-color: #28a745;
            padding: 10px;
            color: white;
            border-radius: 5px;
            margin: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="navbar-container">
        <a href="{{ route('produk.index') }}" class="{{ Request::is('produk') ? 'active' : '' }}"><i class="fas fa-box"></i>Produk</a>
        <a href="{{ route('penjualan.index') }}" class="{{ Request::is('penjualan') ? 'active' : '' }}"><i class="fas fa-cash-register"></i>Penjualan</a>
        <a href="{{ route('pelanggan.index') }}" class="{{ Request::is('pelanggan') ? 'active' : '' }}"><i class="fas fa-users"></i>Pelanggan</a>
        <!-- Ganti dengan route yang sesuai untuk detail penjualan -->
        <a href="{{ route('detailpenjualan.index') }}" class="{{ Request::is('detailpenjualan') ? 'active' : '' }}"><i class="fas fa-info-circle"></i>Detail Penjualan</a>
    </div>
</div>

    </div>
    <div class="container">
        <h1>Daftar Produk</h1>
        <a href="{{ route('produk.create') }}" class="add-button"><i class="fas fa-plus-circle"></i>Tambah Produk Baru</a>
        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif

        <div class="products-grid">
    @foreach($produks as $produk)
        <div class="product-card">
            <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar Produk" class="product-image">
            <div class="product-info">
                <h5 class="product-name">{{ $produk->nama_produk }}</h5>
                <p class="product-description">{{ $produk->deskripsi }}</p>
                <p class="product-price">Harga: Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
                <p class="product-stock">Stok: {{ $produk->stok }}</p>
                
                <!-- Link Edit hanya perlu satu kali dalam loop -->
                <a href="{{ route('produk.edit', $produk->produkID) }}" class="edit-button">Edit</a>

                <!-- Form untuk Hapus Produk -->
                <form action="{{ route('produk.destroy', $produk->produkID) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button"><i class="fas fa-trash-alt"></i>Hapus</button>
                </form>
            </div>
        </div>
    @endforeach
</div>

    </div>
</body>
</html>
