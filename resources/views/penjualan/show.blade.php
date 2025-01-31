<!-- resources/views/detailpenjualan/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Detail Penjualan</title>
</head>
<body>
    <h1>Tambah Detail Penjualan</h1>
    <form action="{{ route('detailpenjualan.store') }}" method="POST">
        @csrf
        <label for="pelanggan_id">Pelanggan:</label>
        <select name="pelanggan_id" id="pelanggan_id">
            @foreach($pelanggan as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
        </select>
        
        <label for="detail">Detail:</label>
        <input type="text" name="detail" id="detail" required>
        
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
