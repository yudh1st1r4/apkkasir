<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Produk</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }

    body {
      display: flex;
      background-color: #f0f2f5;
      color: #1f2d3d;
    }

    .sidebar {
      width: 240px;
      background: #0a0a23;
      color: white;
      height: 100vh;
      padding: 20px;
      position: fixed;
    }

    .sidebar .logo {
      font-size: 22px;
      font-weight: bold;
      text-align: center;
      margin-bottom: 30px;
    }

    .sidebar a {
      display: flex;
      align-items: center;
      padding: 12px;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .sidebar a i {
      margin-right: 12px;
    }

    .sidebar a:hover, .sidebar a.active {
      background-color: #1d3557;
      transform: scale(1.03);
    }

    .menu-title {
      font-size: 12px;
      text-transform: uppercase;
      margin: 20px 0 10px 10px;
      color: #bbb;
    }

    .content {
      margin-left: 250px;
      padding: 25px;
      width: calc(100% - 250px);
      min-height: 100vh;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      margin-bottom: 25px;
    }

    .search-bar {
      padding: 10px 15px 10px 40px;
      margin-left: 20px;
      border: 1px solid #ccc;
      border-radius: 30px;
      font-size: 1em;
      width: 250px;
      background-color: #fff;
      background-image: url('https://cdn-icons-png.flaticon.com/512/622/622669.png');
      background-size: 20px;
      background-repeat: no-repeat;
      background-position: 12px center;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .search-bar:focus {
      border-color: #1d3557;
      box-shadow: 0 0 0 3px rgba(29, 53, 87, 0.2);
      outline: none;
    }

    .products-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 20px;
    }

    .product-card {
      background-color: #fff;
      border-radius: 15px;
      padding: 20px;
      text-align: center;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .product-name {
      font-size: 1.4em;
      margin: 15px 0 5px;
      color: #003366;
      font-weight: 700;
    }

    .product-description, .product-stock {
      font-size: 1em;
      color: #666;
      margin-bottom: 8px;
    }

    .product-price {
      font-size: 1.2em;
      color: #ff6600;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .edit-button, .delete-button {
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: bold;
      margin: 5px;
      text-align: center;
      transition: background-color 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .edit-button {
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
    }

    .edit-button:hover {
      background-color: #0056b3;
    }

    .delete-button {
      background-color: #dc3545;
      color: #fff;
    }

    .delete-button:hover {
      background-color: #a71d2a;
    }

    @media screen and (max-width: 768px) {
      .content {
        margin-left: 0;
        width: 100%;
        padding: 20px;
      }

      .search-bar {
        width: 100%;
        margin: 10px 0;
      }
    }
  </style>
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <i class='far fa-money-bill-alt' style='font-size:36px'></i>
    </div>

    <div class="menu-title">Main Menu</div>
    @if(Auth::user()->role === 'kasir')
      <a href="{{ route('kasir.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
    @else
      <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
    @endif

    <div class="menu-title">Management</div>
    <a href="{{ route('produk.index') }}"><i class="fas fa-box"></i> Produk</a>
    <a href="{{ route('penjualan.index') }}"><i class="fas fa-cash-register"></i> Penjualan</a>
    <a href="{{ route('pelanggan.index') }}"><i class="fas fa-users"></i> Pelanggan</a>

    <div class="menu-title">Laporan</div>
    <a href="{{ route('laporan.index') }}"><i class="fas fa-history"></i> Laporan</a>

    <div class="menu-title">Profile</div>
    <a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a>

    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="fas fa-sign-out-alt"></i> Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
  </div>

  <div class="content">
  <div class="header">
  <h1>Daftar Produk</h1>
  <div>
    <input type="text" id="searchBar" placeholder="Cari produk..." class="search-bar" onkeyup="searchProducts()">
  </div>

  @if(Auth::user()->role !== 'kasir')
    <a href="{{ route('produk.create') }}" class="edit-button">
      <i class="fas fa-plus-circle"></i> Tambah Produk Baru
    </a>
  @endif
</div>

    @if(session('success'))
      <div class="success-message" id="successMessage">
        <span class="icon">✅</span>
        <span>{{ session('success') }}</span>
        <button class="close-btn" onclick="document.getElementById('successMessage').style.display='none'">✖</button>
      </div>
    @endif

    <div class="products-grid">
      @foreach($produks as $produk)
        <div class="product-card">
          <h5 class="product-name">{{ $produk->namaproduk }}</h5>
          <p class="product-description">{{ $produk->deskripsi }}</p>
          <p class="product-price">Harga: Rp{{ number_format($produk->harga, 0, ',', '.') }}</p>
          <p class="product-stock">
            Stok: {{ $produk->stock }}
            @if($produk->stock <= 5)
              <span style="color: red; font-weight: bold;">(Stok Hampir Habis!)</span>
            @endif
          </p>
          @if(Auth::user()->role !== 'kasir')
  <a href="{{ route('produk.edit', $produk->id) }}" class="edit-button"> Edit </a>
@endif

          <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button"><i class="fas fa-trash-alt"></i> Hapus</button>
          </form>
        </div>
      @endforeach
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.querySelectorAll(".sidebar a").forEach(link => {
        if (link.href === window.location.href) {
          link.classList.add("active");
        }
      });

      document.querySelectorAll(".product-stock").forEach(function(stock) {
        const stok = parseInt(stock.textContent.match(/\d+/));
        if (stok <= 5) {
          alert("⚠️ Beberapa produk hampir habis! Periksa stok sebelum kehabisan.");
        }
      });
    });

    function searchProducts() {
      const searchTerm = document.getElementById("searchBar").value.toLowerCase();
      const productCards = document.querySelectorAll(".product-card");

      productCards.forEach(function(card) {
        const productName = card.querySelector(".product-name").textContent.toLowerCase();
        const productDescription = card.querySelector(".product-description").textContent.toLowerCase();
        card.style.display = (productName.includes(searchTerm) || productDescription.includes(searchTerm)) ? "block" : "none";
      });
    }
  </script>
</body>
</html>
