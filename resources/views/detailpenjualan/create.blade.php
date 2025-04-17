<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Detail Penjualan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .form-control, .btn {
            background-color: #1e1e1e;
            color: #ffffff;
            border: 1px solid #333;
        }
        .form-control:focus {
            background-color: #252525;
            color: #ffffff;
        }
        .btn-primary {
            background-color: #ffcc00;
            border-color: #ffcc00;
            color: #000;
        }
        .btn-primary:hover {
            background-color: #e6b800;
            border-color: #e6b800;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Form Detail Penjualan</h2>
        <form action="{{ route('detailpenjualan.store') }}" method="POST">
            @csrf
            
            @if ($errors->any())
                <div class="mb-4 bg-danger text-white border border-danger p-3 rounded">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="penjualanID" class="form-label">Penjualan ID</label>
                    <select name="penjualanID" id="penjualanID" class="form-control" required>
                        @foreach($penjualans as $penjualan)
                            <option value="{{ $penjualan->penjualanID }}">{{ $penjualan->penjualanID }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="produkID" class="form-label">Nama Produk</label>
                    <select name="produkID" id="produkID" class="form-control" required>
                        @foreach($produks as $produk)
                            <option value="{{ $produk->produkID }}" data-harga="{{ $produk->harga }}">{{ $produk->namaproduk }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="jumlahproduk" class="form-label">Jumlah Produk</label>
                    <input type="number" name="jumlahproduk" id="jumlahproduk" class="form-control" min="1" required>
                </div>
                <div class="col-md-6">
                    <label for="subtotal" class="form-label">Subtotal</label>
                    <input type="text" name="subtotal" id="subtotal" class="form-control" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="uangmasuk" class="form-label">Uang Masuk</label>
                    <input type="number" name="uangmasuk" id="uangmasuk" class="form-control" min="0" required>
                </div>
                <div class="col-md-6">
                    <label for="uangkembalian" class="form-label">Uang Kembalian</label>
                    <input type="text" name="uangkembalian" id="uangkembalian" class="form-control" readonly>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary w-100">Simpan</button>
        </form>
    </div>

    <script>
        document.getElementById('produkID').addEventListener('change', updateSubtotal);
        document.getElementById('jumlahproduk').addEventListener('input', updateSubtotal);
        document.getElementById('uangmasuk').addEventListener('input', hitungKembalian);

        function updateSubtotal() {
            var harga = document.querySelector('#produkID option:checked').getAttribute('data-harga');
            var jumlah = document.getElementById('jumlahproduk').value;
            var subtotalField = document.getElementById('subtotal');

            if (harga && jumlah) {
                var subtotal = harga * jumlah;
                subtotalField.value = 'Rp ' + subtotal.toLocaleString('id-ID');
                hitungKembalian();
            } else {
                subtotalField.value = '';
            }
        }

        function hitungKembalian() {
            var subtotal = parseFloat(document.getElementById('subtotal').value.replace('Rp ', '').replace(',', '')) || 0;
            var uangMasuk = parseFloat(document.getElementById('uangmasuk').value) || 0;
            var uangkembalianField = document.getElementById('uangkembalian');

            if (uangMasuk >= subtotal) {
                var kembalian = uangMasuk - subtotal;
                uangkembalianField.value = 'Rp ' + kembalian.toLocaleString('id-ID');
            } else {
                uangkembalianField.value = 'Rp 0';
            }
        }
    </script>
</body>
</html>
