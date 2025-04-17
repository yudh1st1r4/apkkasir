<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard</title>
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
      box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
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
      transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .sidebar a i {
      margin-right: 12px;
    }

    .sidebar a:hover, .sidebar a.active {
      background-color: #1d3557;
      transform: scale(1.05);
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
      box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
      margin-bottom: 30px;
      font-size: 28px;
      font-weight: 600;
      text-align: center;
      transition: transform 0.3s;
    }

    .dashboard-card:hover {
      transform: translateY(-5px);
    }

    .cards {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: space-between;
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
    }

    .card h3 {
      font-size: 16px;
      margin: 5px 0;
    }

    .card p {
      font-size: 20px;
      font-weight: bold;
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
      flex: 1 1 320px;
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

    select {
      margin-bottom: 15px;
      padding: 5px 10px;
      border-radius: 5px;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <div class="logo"><i class="far fa-money-bill-alt" style="font-size: 28px;"></i></div>
  <div class="menu-title">Main Menu</div>
  <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
  <div class="menu-title">Management</div>
  <a href="{{ route('produk.index') }}"><i class="fas fa-box"></i> Produk</a>
  <a href="{{ route('penjualan.index') }}"><i class="fas fa-cash-register"></i> Penjualan</a>
  <a href="{{ route('pelanggan.index') }}"><i class="fas fa-users"></i> Pelanggan</a>
  <div class="menu-title">Laporan</div>
  <a href="{{ route('laporan.index') }}"><i class="fas fa-history"></i> Laporan</a>
  <div class="menu-title">Profile</div>
  <a href="{{ route('profile') }}"><i class="fas fa-user"></i> Profile</a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
  <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt"></i> Logout</a>
</div>

<div class="content">
  <div class="dashboard-card">Dashboard</div>

  <div class="cards">
    <div class="card"><i class="fas fa-box"></i><h3>Total Produk</h3><p>{{ $totalProduk }}</p></div>
    <div class="card"><i class="fas fa-shopping-cart"></i><h3>Total Penjualan</h3><p>{{ $totalPenjualan }}</p></div>
    <div class="card"><i class="fas fa-wallet"></i><h3>Uang Masuk</h3><p>Rp {{ number_format($totalUangMasuk, 0, ',', '.') }}</p></div>
    <div class="card"><i class="fas fa-users"></i><h3>Total Pelanggan</h3><p>{{ $totalPelanggan }}</p></div>
  </div>

  <div class="chart-table-container">
    <div class="table-container">
      <h3>Customer Rank (by Total Spending)</h3>
      <table>
        <thead><tr><th>Rank</th><th>Customer</th><th>Total</th></tr></thead>
        <tbody>
          @foreach($pelanggan as $key => $customer)
            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $customer->nama }}</td>
              <td>Rp {{ number_format($customer->penjualan_sum_subtotal, 0, ',', '.') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="table-container">
  <h3>Daftar Produk</h3>
  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
      </tr>
    </thead>
    <tbody>
      @forelse($produk as $key => $item)
        <tr>
          <td>{{ $key + 1 }}</td>
          <td>{{ $item->namaproduk }}</td>
          <td>Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
          <td>{{ $item->stock }}</td>
        </tr>
      @empty
        <tr>
          <td colspan="4" style="text-align: center;">Belum ada produk.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>

    <div class="chart-container">
      <h3>Grafik Penjualan</h3>
      <label for="timeFilter">Lihat Data:</label>
      <select id="timeFilter">
        <option value="monthly" {{ $filter == 'monthly' ? 'selected' : '' }}>Bulanan</option>
        <option value="yearly" {{ $filter == 'yearly' ? 'selected' : '' }}>Tahunan</option>
      </select>
      <canvas id="salesChart"></canvas>
    </div>
  </div>
</div>

<script>
  const ctx = document.getElementById("salesChart").getContext("2d");
  const labels = @json($penjualan->pluck('periode'));
  const sales = @json($penjualan->pluck('total'));

  new Chart(ctx, {
    type: "bar",
    data: {
      labels: labels,
      datasets: [{
        label: "Total Penjualan",
        data: sales,
        backgroundColor: "rgba(69, 123, 157, 0.6)",
        borderColor: "rgba(29, 53, 87, 1)",
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true }
      }
    }
  });

  document.getElementById("timeFilter").addEventListener("change", function () {
    window.location.href = `?filter=${this.value}`;
  });

  document.querySelectorAll(".sidebar a").forEach(link => {
    if (link.href === window.location.href) {
      link.classList.add("active");
    }
  });
</script>

</body>
</html>
