<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Produk</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#2f2f35] min-h-screen flex items-center justify-center">

  <div class="w-[90%] max-w-5xl bg-[#1f1f26] text-white rounded-3xl overflow-hidden shadow-2xl flex flex-col md:flex-row">
    
    <!-- Left Side: Form -->
    <div class="w-full md:w-1/2 p-10 relative z-10">
      <h4 class="text-sm text-gray-400 mb-2">Dashboard</h4>
      <h1 class="text-3xl font-bold mb-2">Edit Produk<span class="text-blue-500">.</span></h1>
      <p class="text-sm text-gray-400 mb-6">Perbarui data produk yang sudah ada</p>

      <!-- Menampilkan error validasi -->
      @if ($errors->any())
        <div class="bg-red-500 text-white text-sm p-3 rounded mb-4">
          <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Form Edit Produk -->
      <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
          <label for="namaproduk" class="block text-sm text-gray-300 mb-1">Nama Produk</label>
          <input type="text" id="namaproduk" name="namaproduk" value="{{ old('namaproduk', $produk->namaproduk) }}" required
            class="w-full bg-[#2d2d36] px-4 py-3 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Masukkan nama produk">
        </div>

        <div>
          <label for="deskripsi" class="block text-sm text-gray-300 mb-1">Deskripsi</label>
          <textarea id="deskripsi" name="deskripsi" rows="3" required
            class="w-full bg-[#2d2d36] px-4 py-3 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Deskripsi singkat produk">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
        </div>

        <div>
          <label for="harga" class="block text-sm text-gray-300 mb-1">Harga</label>
          <input type="number" id="harga" name="harga" value="{{ old('harga', $produk->harga) }}" required
            class="w-full bg-[#2d2d36] px-4 py-3 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Harga produk">
        </div>

        <div>
          <label for="stock" class="block text-sm text-gray-300 mb-1">Stok</label>
          <input type="number" id="stock" name="stock" value="{{ old('stock', $produk->stock) }}" required
            class="w-full bg-[#2d2d36] px-4 py-3 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Jumlah stok">
        </div>

        <div class="flex justify-between gap-4">
          <button type="submit"
            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:ring-2 focus:ring-blue-500">
            Update Produk
          </button>
          <a href="{{ route('produk.index') }}"
            class="w-full bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded-lg text-center focus:ring-2 focus:ring-gray-500">
            Batal
          </a>
        </div>
      </form>
    </div>

    <!-- Right Side: Background Image -->
    <div class="w-full md:w-1/2 hidden md:block relative">
      <div class="absolute inset-0 bg-cover bg-center opacity-30"
        style="background-image: url('https://i.pinimg.com/736x/2c/85/77/2c857711709b9bcc2f8c77a9762b1061.jpg');"></div>
      <div class="absolute inset-0 bg-gradient-to-r from-[#1f1f26] to-transparent"></div>
    </div>

  </div>

</body>
</html>
