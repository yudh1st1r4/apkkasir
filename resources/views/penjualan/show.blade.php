<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <style>
        * { font-family: 'Courier New', monospace; }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #f4f4f4;
            flex-direction: column;
        }
        .struk {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 320px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .title { font-size: 18px; font-weight: bold; margin-bottom: 10px; }
        .info { text-align: left; font-size: 14px; margin-bottom: 10px; }
        .items {
            width: 100%;
            border-top: 1px dashed black;
            border-bottom: 1px dashed black;
            margin: 10px 0;
            padding: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        td {
            padding: 3px 0;
        }
        .total { font-size: 16px; font-weight: bold; text-align: right; }
        .footer { font-size: 12px; margin-top: 10px; font-style: italic; }
        .btn {
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            color: white;
        }
        .btn-download {
            background: #007bff;
        }
        .btn-download:hover {
            background: #0056b3;
        }
        @media print {
            .btn { display: none; }
        }
    </style>
</head>
<body>
    <div class="struk">
        <div class="title">STRUK PEMBELIAN</div>
        <div class="info">
            <p><strong>No. Transaksi:</strong> {{ $penjualan->id}}</p>
            <p><strong>Pelanggan:</strong> {{ $penjualan->pelanggan->nama ?? 'Umum' }}</p>
            <p><strong>Tanggal:</strong> {{ $penjualan->tanggalpenjualan ?? 'Tidak tersedia' }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ isset($penjualan->metodepembayaran) ? $penjualan->metodepembayaran : 'Tidak tersedia' }}</p>
        </div>

        <div class="items">
            <table>
                <tr>
                    <th style="text-align: left;">Nama Produk</th>
                    <th style="text-align: right;">Harga</th>
                    <th style="text-align: center;">Jumlah</th>
                    <th style="text-align: right;">Subtotal</th>
                </tr>
                @php 
                    $total = 0;
                @endphp
                @if (!empty($produk_list))
                    @foreach ($produk_list as $produk)
                        @php 
                            $total += $produk->subtotal;
                        @endphp
                        <tr>
                            <td>{{ $produk->namaproduk }}</td>
                            <td style="text-align: right;">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <td style="text-align: center;">x{{ $produk->jumlah }}</td>
                            <td style="text-align: right;">Rp {{ number_format($produk->subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr><td colspan="4" style="text-align: center;">Tidak ada produk.</td></tr>
                @endif
            </table>
        </div>
        @php 
            $ppn = $total * 0.10; // Hitung PPN 10%
            $kembalian = $penjualan->uangmasuk - ($total + $ppn);
        @endphp

        <div class="total">
            <p>Total: Rp {{ number_format($total + $ppn, 0, ',', '.') }}</p>
            <p>PPN (10%): Rp {{ number_format($ppn, 0, ',', '.') }}</p>
            <p>Uang Masuk: Rp {{ number_format($penjualan->uangmasuk, 0, ',', '.') }}</p>
            <p>Kembalian: Rp {{ number_format($kembalian, 0, ',', '.') }}</p>
        </div>

        <div class="footer">Terima kasih telah berbelanja!</div>
    </div>
    <div>
        <a href="{{ route('penjualan.index') }}" style="text-decoration: none;">
            <button class="btn btn-download">Kembali</button>
        </a>
        <button class="btn btn-download" onclick="window.print()">Cetak Struk</button>
    </div>
</body>
</html>
