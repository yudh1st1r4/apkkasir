<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Penjualan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
</head>
<body>
    <h1>Tambah Penjualan</h1>
    <div class="container mt-5">
    <a href="{{ route('penjualan.index') }}">Kembali ke Daftar Penjualan</a>

    <form action="{{ route('penjualan.store') }}" method="POST">
        @csrf
        <label for="tanggalpenjualan">Tanggal Penjualan:</label>
        <input type="date" name="tanggalpenjualan" required><br><br>

        <label for="totalharga">Total Harga:</label>
        <input type="number" name="totalharga" step="0.01" required><br><br>

        <label for="pelangganID">Pelanggan:</label>
        <select name="pelangganID" required>
            <option value="">-- Pilih Pelanggan --</option>
            @foreach ($pelanggan as $item)
                <option value="{{ $item->pelangganID}}">{{ $item->nama}}</option>
            @endforeach
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
