<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Buat Penjualan</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body class="bg-[#2f2f35] min-h-screen flex items-center justify-center text-white">

  <div class="w-[95%] max-w-3xl bg-[#1f1f26] p-8 rounded-3xl shadow-2xl">
    <h1 class="text-2xl font-bold mb-6 text-blue-500 flex items-center gap-2">
      <i class="fas fa-shopping-cart"></i> Buat Penjualan
    </h1>

    @if ($errors->any())
    <div class="bg-red-500/10 border border-red-500 text-red-400 p-4 rounded-lg mb-4">
      <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <form action="{{ route('penjualan.store') }}" method="POST">
      @csrf

      <div class="mb-4">
        <label class="block mb-1 text-sm" for="tanggalpenjualan">
          <i class="fas fa-calendar-alt mr-1"></i> Tanggal:
        </label>
        <input type="date" id="tanggalpenjualan" name="tanggalpenjualan"
          class="w-full bg-[#2d2d36] text-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required />
      </div>

      <div class="mb-4">
  <label class="block mb-1 text-sm" for="pelanggan_id">
    <i class="fas fa-user mr-1"></i> Pelanggan:
  </label>
  <select name="pelanggan_id" id="pelanggan_id"
    class="w-full bg-[#2d2d36] text-white p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
    <option value="" selected disabled>Pilih Pelanggan</option>
    @foreach($pelanggans as $pelanggan)
      <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama }}</option>
    @endforeach
  </select>
</div>

      <div id="produk-container" class="space-y-4 mb-4">
        <div class="produk-item flex flex-col md:flex-row gap-2">
          <select name="produk_id[]" class="produk-id w-full md:w-1/2 bg-[#2d2d36] text-white p-3 rounded-lg" required>
            <option value="" selected disabled>Pilih Produk</option>
            @foreach($produks as $produk)
              <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}">
                {{ $produk->namaproduk }} - Rp{{ number_format($produk->harga, 0, ',', '.') }}
              </option>
            @endforeach
          </select>
          <input type="number" name="jumlahproduk[]" value="1" min="1"
            class="jumlahproduk w-full md:w-1/6 bg-[#2d2d36] text-white p-3 rounded-lg" required>
          <input type="number" name="subtotal[]" readonly
            class="subtotal w-full md:w-1/4 bg-[#2d2d36] text-white p-3 rounded-lg" required>
          <button type="button" class="remove-product bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">
            <i class="fas fa-trash-alt">X</i>
          </button>
        </div>
      </div>

      <button type="button" id="add-product-btn"
        class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg mb-4">
        <i class="fas fa-plus-circle"></i> Tambah Produk
      </button>

      <div class="mb-4 text-sm">
        <label><i class="fas fa-receipt mr-1"></i> Total Harga: Rp <span id="total-harga">0</span></label>
      </div>

      <div class="mb-4">
        <label for="metode_pembayaran" class="block mb-1 text-sm"><i class="fas fa-credit-card mr-1"></i> Metode Pembayaran:</label>
        <select name="metode_pembayaran" id="metode_pembayaran"
          class="w-full bg-[#2d2d36] text-white p-3 rounded-lg" required>
          <option value="cash">Tunai</option>
          <option value="debit">Debit</option>
          <option value="credit">Kredit</option>
          <option value="qris">QRIS</option>
        </select>
      </div>

      <div class="flex gap-4 mb-6">
        <div class="w-1/2">
          <label for="uangmasuk" class="block mb-1 text-sm"><i class="fas fa-wallet mr-1"></i> Uang Masuk:</label>
          <input type="number" id="uangmasuk" name="uangmasuk"
            class="w-full bg-[#2d2d36] text-white p-3 rounded-lg" required />
        </div>
        <div class="w-1/2">
          <label for="uangkeluar" class="block mb-1 text-sm"><i class="fas fa-money-bill-wave mr-1"></i> Kembalian:</label>
          <input type="number" id="uangkeluar" name="uangkeluar" readonly
            class="w-full bg-[#2d2d36] text-white p-3 rounded-lg" />
        </div>
      </div>

      <button type="submit"
        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 rounded-lg">
        <i class="fas fa-save mr-1"></i> Simpan
      </button>
    </form>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const produkContainer = document.getElementById("produk-container");
      const addProductBtn = document.getElementById("add-product-btn");
      const totalHargaElem = document.getElementById("total-harga");
      const uangMasukElem = document.getElementById("uangmasuk");
      const uangKeluarElem = document.getElementById("uangkeluar");

      addProductBtn.addEventListener("click", function () {
        const newItem = produkContainer.querySelector(".produk-item").cloneNode(true);
        newItem.querySelector(".jumlahproduk").value = 1;
        newItem.querySelector(".subtotal").value = "";
        produkContainer.appendChild(newItem);
      });

      produkContainer.addEventListener("change", function (e) {
        if (e.target.classList.contains("produk-id")) {
          const selected = e.target.options[e.target.selectedIndex];
          const harga = selected.getAttribute("data-harga");
          const item = e.target.closest(".produk-item");
          item.setAttribute("data-harga", harga);
          hitungSubtotal(item);
        }
        if (e.target.classList.contains("jumlahproduk")) {
          hitungSubtotal(e.target.closest(".produk-item"));
        }
      });

      produkContainer.addEventListener("click", function (e) {
        if (e.target.closest(".remove-product")) {
          e.target.closest(".produk-item").remove();
          hitungTotalHarga();
        }
      });

      function hitungSubtotal(item) {
        const harga = parseFloat(item.getAttribute("data-harga")) || 0;
        const jumlah = parseInt(item.querySelector(".jumlahproduk").value) || 1;
        const subtotal = harga * jumlah;
        item.querySelector(".subtotal").value = subtotal.toFixed(0);
        hitungTotalHarga();
      }

      function hitungTotalHarga() {
        let total = 0;
        document.querySelectorAll(".subtotal").forEach(input => {
          total += parseFloat(input.value) || 0;
        });
        totalHargaElem.innerText = total.toLocaleString();
        hitungUangKeluar();
      }

      function hitungUangKeluar() {
        const uangMasuk = parseFloat(uangMasukElem.value.replace(/[^0-9]/g, "")) || 0;
        const total = parseFloat(totalHargaElem.innerText.replace(/[^0-9]/g, "")) || 0;
        const kembali = uangMasuk - total;
        uangKeluarElem.value = kembali.toLocaleString("id-ID");
      }

      uangMasukElem.addEventListener("input", hitungUangKeluar);
      hitungTotalHarga();
    });
  </script>

</body>
</html>
