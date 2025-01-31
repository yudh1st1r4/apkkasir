<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        h1 {
            font-size: 2.5em;
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
        }
        a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2em;
            background-color: #333;
            padding: 10px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: inline-block;
            transition: background 0.3s ease;
        }
        a:hover {
            background-color: #555;
        }
        table {
            width: 100%;
            border-collapse: collapse;
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
        td {
            background-color: #222;
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
            table, th, td {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h1>Detail Penjualan</h1>
    <a href="{{ route('detailpenjualan.create', ['penjualanID' => $penjualan->id]) }}">Tambah Detail Penjualan</a>
    <div class="table-container">
        <table>
            <tr>
                <th>ID</th>
                <th>Penjualan ID</th>
                <th>Produk</th>
                <th>Jumlah Produk</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
            @foreach ($detailPenjualans as $detail)
            <tr>
                <td>{{ $detail->id }}</td>
                <td>{{ $detail->penjualan->tanggalpenjualan }}</td>
                <td>{{ $detail->produk->namaproduk }}</td>
                <td>{{ $detail->jumlahproduk }}</td>
                <td>{{ $detail->subtotal }}</td>
                <td>
                    <a href="{{ route('detailpenjualan.edit', $detail) }}">Edit</a>
                    <form action="{{ route('detailpenjualan.destroy', $detail) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
