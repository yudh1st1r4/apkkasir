<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penjualan</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #222;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            border: 1px solid #444;
            text-align: left;
        }
        th {
            background-color: #000;
        }
        td a, td form button {
            padding: 8px 15px;
            background-color: #555;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            display: inline-block;
            margin-right: 5px;
        }
        td form button {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="navbar-container">
            <a href="{{ route('produk.index') }}" class="{{ Request::is('produk') ? 'active' : '' }}"><i class="fas fa-box"></i>Produk</a>
            <a href="{{ route('penjualan.index') }}" class="{{ Request::is('penjualan') ? 'active' : '' }}"><i class="fas fa-cash-register"></i>Penjualan</a>
            <a href="{{ route('pelanggan.index') }}" class="{{ Request::is('pelanggan') ? 'active' : '' }}"><i class="fas fa-users"></i>Pelanggan</a>
            <a href="{{ route('detailpenjualan.index', 1) }}" class="{{ Request::is('penjualan/*') ? 'active' : '' }}"><i class="fas fa-info-circle"></i>Detail Penjualan</a>
        </div>
    </div>
    <div>
        <h1>Daftar Penjualan</h1>
        <a href="{{ route('penjualan.create') }}"><i class="fas fa-plus-circle"></i>Tambah Penjualan</a>
        <table>
            <thead>
                <tr>
                    <th>Tanggal Penjualan</th>
                    <th>Total Harga</th>
                    <th>Pelanggan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($penjualan as $penjualan)
                    <tr>
                        <td>{{ $penjualan->tanggalpenjualan }}</td>
                        <td>{{ $penjualan->totalharga }}</td>
                        <td>{{ $penjualan->pelanggan->nama }}</td>
                        <td>
                            <a href="{{ route('penjualan.edit', $penjualan->penjualanID) }}"><i class="fas fa-edit"></i>Edit</a>
                            <form action="{{ route('penjualan.destroy', $penjualan->penjualanID) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"><i class="fas fa-trash-alt"></i> Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
