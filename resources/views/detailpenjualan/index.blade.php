<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .container {
            margin-left: 250px;
            padding: 20px;
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
        .add-btn, .btn-primary {
            background-color: #ffcc00;
            border-color: #ffcc00;
            color: #000;
        }
        .add-btn:hover, .btn-primary:hover {
            background-color: #e6b800;
            border-color: #e6b800;
        }
        .table {
            background-color: #222;
            border-radius: 10px;
        }
        .table th, .table td {
            text-align: left;
            padding: 12px;
        }
        .table th {
            background-color: #111;
        }
        .table td a, .table td form button {
            background-color: #555;
            color: white;
            border-radius: 5px;
            padding: 5px 10px;
            text-decoration: none;
        }
        .table td form button {
            border: none;
        }
        .table td a:hover, .table td form button:hover {
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
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i>Home</a>
        <a href="{{ route('produk.index') }}"><i class="fas fa-box"></i>Produk</a>
        <a href="{{ route('penjualan.index') }}"><i class="fas fa-cash-register"></i>Penjualan</a>
        <a href="{{ route('pelanggan.index') }}"><i class="fas fa-users"></i>Pelanggan</a>
        <a href="{{ route('detailpenjualan.index', 1) }}" class="active"><i class="fas fa-info-circle"></i>Detail Penjualan</a>
    </div>

    <div class="container mt-4">
        <h2 class="text-center mb-4">Detail Penjualan</h2>
        <a href="{{ route('detailpenjualan.create') }}" class="btn btn-primary mb-3">Tambah Detail Penjualan</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Penjualan ID</th>
                    <th>Nama Produk</th>
                    <th>Jumlah Produk</th>
                    <th>Subtotal</th>
                    <th>Waktu</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($detailPenjualan as $detail)
    @dd($detail) <!-- This will dump the model data and stop execution -->
    <tr>
        <td>{{ $detail->id }}</td>
        <td>{{ optional($detail->penjualan)->penjualanID }}</td>
        <td>{{ optional($detail->produk)->namaproduk }}</td>
        <td>{{ $detail->jumlahproduk }}</td>
        <td>Rp {{ number_format($detail->subtotal, 2, ',', '.') }}</td>
        <td>{{ $detail->created_at }}</td>
        <td>
            <a href="{{ route('detailpenjualan.edit', $detail->id) }}"><i class="fas fa-edit"> Edit</i></a>
            <form action="{{ route('detailpenjualan.destroy', $detail->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">
                    <i class="fas fa-trash-alt"></i> Hapus
                </button>
            </form>
        </td>
    </tr>
@endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
