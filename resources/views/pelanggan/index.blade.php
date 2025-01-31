<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
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
        .header {
            width: 100%;
            height: 250px;
            background-color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        h1 {
            font-size: 2.5em;
            font-weight: bold;
            margin: 0;
        }
        .container {
            display: flex;
            padding: 20px;
            background-color: #111;
            margin-left: 250px;
        }
        .sidebar {
            width: 250px;
            background-color: #222;
            padding-top: 20px;
            position: fixed;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 15px 20px;
            border-radius: 5px;
            margin: 5px 0;
            transition: background 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #444;
        }
        .sidebar i {
            margin-right: 10px;
        }
        .search-form {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }
        .search-form input, .search-form button {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #444;
            border-radius: 5px;
            background-color: #222;
            color: white;
            width: 200px;
        }
        .table-container {
            width: 100%;
            overflow-x: auto;
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
        .add-btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #555;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .add-btn:hover {
            background-color: #666;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
                height: auto;
                flex-direction: row;
                justify-content: space-around;
            }
            .container {
                margin-left: 0;
                flex-direction: column;
            }
            .search-form {
                flex-direction: column;
            }
            .search-form input, .search-form button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">

        <a href="{{ route('produk.index') }}" class="{{ Request::is('produk') ? 'active' : '' }}"><i class="fas fa-box"></i>Produk</a>
        <a href="{{ route('penjualan.index') }}" class="{{ Request::is('penjualan') ? 'active' : '' }}"><i class="fas fa-cash-register"></i>Penjualan</a>
        <a href="{{ route('pelanggan.index') }}" class="{{ Request::is('pelanggan') ? 'active' : '' }}"><i class="fas fa-users"></i>Pelanggan</a>
        <a href="{{ route('detailpenjualan.index', 1) }}" class="{{ Request::is('penjualan/*') ? 'active' : '' }}"><i class="fas fa-info-circle"></i>Detail Penjualan</a>
    </div>
    <div class="container">
        <div>
            <a href="{{ route('pelanggan.create') }}" class="add-btn">Tambah Pelanggan</a>
            <form method="GET" action="{{ route('pelanggan.index') }}" class="search-form">
            </form>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Nomor Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nomortelepon }}</td>
                            <td>
                                <a href="{{ route('pelanggan.show', $item->pelangganID) }}"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('pelanggan.edit', $item->pelangganID) }}"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('pelanggan.destroy', $item->pelangganID) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
