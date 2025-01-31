<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Detail Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }
        h1 {
            text-align: center;
            color: #fff;
        }
        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 15px;
            background-color: #333;
            color: #fff;
        }
        button {
            background-color: #444;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Tambah Detail Penjualan</h1>

    <form action="{{ route('detailpenjualan.store') }}" method="POST">
    @csrf

    <label for="penjualanID">Penjualan</label>
    <select name="penjualanID" required>
        <option value="" disabled selected>Pilih Penjualan</option>
        @foreach ($penjualan as $p)
            <option value="{{ $p->penjualanID }}">{{ $p->penjualanID }}</option>
        @endforeach
    </select>
    @error('penjualanID')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="produkID">Produk</label>
    <select name="produkID" required>
        <option value="" disabled selected>Pilih Produk</option>
        @foreach ($produks as $produk)
            <option value="{{ $produk->produkID }}">{{ $produk->namaproduk }}</option>
        @endforeach
    </select>
    @error('produkID')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="jumlahproduk">Jumlah Produk</label>
    <input type="number" name="jumlahproduk" required>
    @error('jumlahproduk')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="subtotal">Subtotal</label>
    <input type="text" name="subtotal" required>
    @error('subtotal')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <button type="submit">Simpan</button>
</form>

@if(session('success'))
    <div style="color: green;">{{ session('success') }}</div>
@endif
@if(session('error'))
    <div style="color: red;">{{ session('error') }}</div>
@endif

</div>

</body>
</html>
