
    <h1>Edit Detail Penjualan</h1>

    <form action="{{ route('detailpenjualan.update', $detail->detailID) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="penjualanID">Penjualan</label>
            <select name="penjualanID" required>
                @foreach ($penjualans as $penjualan)
                    <option value="{{ $penjualan->penjualanID }}" {{ $penjualan->penjualanID == $detail->penjualanID ? 'selected' : '' }}>{{ $penjualan->penjualanID }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="namaproduk">Produk</label>
            <select name="namaproduk" required>
                @foreach ($produks as $produk)
                    <option value="{{ $produk->namaproduk }}" {{ $produk->namaproduk == $detail->namaproduk ? 'selected' : '' }}>{{ $produk->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="jumlahproduk">Jumlah Produk</label>
            <input type="number" name="jumlahproduk" value="{{ $detail->jumlahproduk }}" required>
        </div>

        <div>
            <label for="subtotal">Subtotal</label>
            <input type="text" name="subtotal" value="{{ $detail->subtotal }}" required>
        </div>

        <button type="submit">Update</button>
    </form>
