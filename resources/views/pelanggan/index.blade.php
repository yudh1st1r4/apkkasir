<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
  margin-left: 260px;
  padding: 30px;
  width: calc(100% - 260px);
}

.dashboard-card {
  background: white;
  padding: 24px;
  border-radius: 15px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.05);
  margin-bottom: 30px;
  font-size: 28px;
  font-weight: 600;
  text-align: center;
}

.cards {
  display: flex;
  gap: 20px;
  justify-content: space-between;
  flex-wrap: wrap;
}

.card {
  background: linear-gradient(135deg, #1d3557, #457b9d);
  padding: 20px;
  border-radius: 12px;
  color: white;
  flex: 1;
  min-width: 200px;
  text-align: center;
  box-shadow: 0 4px 14px rgba(0,0,0,0.1);
  transition: transform 0.3s;
}

.card:hover {
  transform: translateY(-5px);
}

.card i {
  font-size: 30px;
  margin-bottom: 8px;
  display: block;
}

.chart-table-container {
  display: flex;
  gap: 20px;
  margin-top: 30px;
  flex-wrap: wrap;
}

.table-container, .chart-container {
  background: white;
  padding: 20px;
  border-radius: 12px;
  box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
  flex: 1;
  min-width: 320px;
}

h3 {
  margin-bottom: 15px;
  font-size: 18px;
  color: #333;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  padding: 10px;
  text-align: left;
  border-bottom: 1px solid #eee;
}

th {
  background-color: #1d3557;
  color: white;
}

canvas#salesChart {
  width: 100% !important;
  height: 300px !important;
}

select {
  padding: 6px 10px;
  border-radius: 6px;
  border: 1px solid #ccc;
  margin-bottom: 10px;
}
/* Responsive Layout */
@media screen and (max-width: 768px) {
  .cards, .chart-table-container {
    flex-direction: column;
  }

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

/* Layout */
.content {
  margin-left: 250px;
  padding: 25px;
  width: calc(100% - 250px);
  min-height: 100vh;
  background-color: #f0f2f5; /* Disamakan dengan body */
}


/* Header */
.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 25px;
}

/* Product Grid */
.products-grid {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  gap: 20px;
}

/* Product Card */
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

.product-image {
  width: 100%;
  height: auto;
  border-radius: 10px;
}

/* Text Styling */
.product-name {
  font-size: 1.4em;
  margin: 15px 0 5px;
  color: #003366;
  font-weight: 700;
}

.product-description,
.product-stock {
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

/* Buttons */
.edit-button,
.delete-button {
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

/* Others */
.transparant {
  color: rgb(0, 22, 48);
}
.action-buttons a,
.action-buttons button {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 36px;
  height: 36px;
  margin-right: 6px;
  border: none;
  border-radius: 50%;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
}

.action-buttons a i,
.action-buttons button i {
  pointer-events: none;
}

.action-buttons a:nth-child(1) {
  background-color: #17a2b8; /* View */
  color: white;
}

.action-buttons a:nth-child(2) {
  background-color: #ffc107; /* Edit */
  color: white;
}

.action-buttons button {
  background-color: #dc3545; /* Delete */
  color: white;
}

.action-buttons a:hover,
.action-buttons button:hover {
  transform: scale(1.1);
  opacity: 0.9;
}
.btn {
    padding: 8px 16px;
    border: none;
    border-radius: 6px;
    text-decoration: none;
    color: white;
    background-color: #1d3557;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #457b9d;
}

.btn-primary {
    background-color: #1d3557;
}

    </style>
     <script>
        document.addEventListener("DOMContentLoaded", function() {
            let links = document.querySelectorAll(".sidebar a");
            links.forEach(link => {
                if (link.href === window.location.href) {
                    link.classList.add("active");
                }
            });
        });
    </script>
</head>
<body>
<div class="sidebar">
    <div class="logo text-center mb-3">
        <i class='far fa-money-bill-alt' style='font-size:36px'></i>
    </div>

    <div class="menu-title">Main Menu</div>

    {{-- Dashboard sesuai role --}}
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

    {{-- Logout dengan POST --}}
    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i> Logout
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>


    <div class="content">
        <div class="header">
            <h1>Data Pelanggan</h1>
            @if(auth()->user()->role == 'admin')
            <td class="action-buttons"><a href="{{ route('pelanggan.create') }}" class="btn">Tambah Pelanggan</a></td>
            @endif
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Nomor telepon</th>
                        @if(auth()->user()->role == 'admin')
                            <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pelanggan as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->nomortelepon ?? '-' }}</td> 

                        @if(auth()->user()->role == 'admin')
                        <td class="action-buttons">
                            <a href="{{ route('pelanggan.show', $item->id) }}"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('pelanggan.edit', $item->id) }}"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus pelanggan ini?');">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
