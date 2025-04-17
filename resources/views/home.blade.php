<!DOCTYPE html> 
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kasir</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
  position: relative;
  border-radius: 12px;
  color: black;
  background-color: white;
  flex: 1 1 calc(25% - 20px);
  min-width: 220px;
  height: 150px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;
  box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
  border: 4px solid #1d3557; /* warna border solid */
  padding: 20px;
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

@media screen and (max-width: 768px) {
  .cards, .chart-table-container {
    flex-direction: column;
  }
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
        <div class="logo text-center mb-3"><i class='far fa-money-bill-alt' style='font-size:36px'></i></div>
        <div class="menu-title">Main Menu</div>
        <a href="{{ route('kasir.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
        <div class="menu-title">Management</div>
        <a href="{{ route('produk.index') }}"><i class="fas fa-box"></i> Produk</a>
        <a href="{{ route('penjualan.index') }}"><i class="fas fa-cash-register"></i> Penjualan</a>
        <a href="{{ route('pelanggan.index') }}"><i class="fas fa-users"></i> Pelanggan</a>
        <div class="menu-title">Laporan</div>
        <a href="{{ route('laporan.index') }}"><i class="fas fa-history"></i> Laporan</a>
        <div class="logout-profile">
        <div class="menu-title">Profile</div>
        <div class="logout-profile">
            <a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
<a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fas fa-sign-out-alt"></i> Logout
</a>

            </div>
        </div>
    </div>
    <div class="content">
    <div class="dashboard-card">Dashboard Kasir</div>
        <div class="cards">
            <div class="card"><i class="fas fa-shopping-cart"></i><h3>Total Transaksi</h3><p>{{ $totalTransaksi }}</p></div>
            <div class="card"><i class="fas fa-wallet"></i><h3>Total Pendapatan</h3><p>Rp {{ number_format($totalUangMasuk, 0, ',', '.') }}</p></div>
        </div>
    </div>
</body>
</html>