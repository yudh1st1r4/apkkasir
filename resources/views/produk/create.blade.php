<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Produk</h1>

        <!-- Form to create a new Produk -->
        <form action="{{ route('produk.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="namaproduk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="namaproduk" name="namaproduk" value="{{ old('namaproduk') }}" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga') }}" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stok</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Produk</button>
        </form>
    </div>
</body>
</html>
