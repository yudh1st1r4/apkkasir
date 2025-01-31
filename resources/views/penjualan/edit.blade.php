<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penjualan</title>
</head>
<body>
    <h1>Edit Penjualan</h1>

    <a href="{{ route('penjualan.index') }}">Kembali ke Daftar Penjualan</a>

    <form action="{{ route('penjualan.update', $penjualan->penjualanID) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="tanggalpenjualan">Tanggal Penjualan:</label>
        <input type="date" name="tanggalpenjualan" value="{{ $penjualan->tanggalpenjualan }}" required><br><br>

        <label for="totalharga">Total Harga:</label>
        <input type="number" name="totalharga" step="0.01" value="{{ $penjualan->totalharga }}" required><br><br>

        <label for="pelangganID">Pelanggan:</label>
        <select name="pelangganID" required>
            <option value="">-- Pilih Pelanggan --</option>
            @foreach ($pelanggan as $item)
                <option value="{{ $item->pelangganID }}" {{ $penjualan->pelangganID == $item->pelangganID ? 'selected' : '' }}>
                    {{ $item->namapelanggan }}
                </option>
            @endforeach
        </select><br><br>

        <button type="submit">Update</button>
    </form>
</body>
</html>
