<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Pelanggan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#2f2f35] min-h-screen flex items-center justify-center">

  <div class="w-[90%] max-w-4xl bg-[#1f1f26] text-white rounded-3xl overflow-hidden shadow-2xl p-10">

    <!-- Header -->
    <h4 class="text-sm text-gray-400 mb-2">Dashboard</h4>
    <h1 class="text-3xl font-bold mb-2">
      Edit Pelanggan<span class="text-blue-500">.</span>
    </h1>
    <p class="text-sm text-gray-400 mb-6">Perbarui data pelanggan yang sudah ada</p>

    <!-- Error -->
    @if ($errors->any())
      <div class="bg-red-500 text-white text-sm p-3 rounded mb-4">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- Form -->
    <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST" class="space-y-4">
      @csrf
      @method('PUT')

      <!-- Nama -->
      <div>
        <label for="nama" class="block text-sm text-gray-300 mb-1">Nama</label>
        <input 
          type="text" 
          id="nama" 
          name="nama" 
          value="{{ old('nama', $pelanggan->nama) }}" 
          required
          class="w-full bg-[#2d2d36] px-4 py-3 rounded-lg text-sm placeholder-gray-400 
                 focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Masukkan nama pelanggan"
        />
      </div>

      <!-- Alamat -->
      <div>
        <label for="alamat" class="block text-sm text-gray-300 mb-1">Alamat</label>
        <input 
          type="text" 
          id="alamat" 
          name="alamat" 
          value="{{ old('alamat', $pelanggan->alamat) }}" 
          required
          class="w-full bg-[#2d2d36] px-4 py-3 rounded-lg text-sm placeholder-gray-400 
                 focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Masukkan alamat pelanggan"
        />
      </div>

      <!-- Nomor Telepon -->
      <div>
        <label for="nomortelepon" class="block text-sm text-gray-300 mb-1">nomor telepon</label>
        <input 
          type="text" 
          id="nomortelepon" 
          name="nomortelepon" 
          value="{{ old('nomortelepon', $pelanggan->nomortelepon) }}" 
          required
          class="w-full bg-[#2d2d36] px-4 py-3 rounded-lg text-sm placeholder-gray-400 
                 focus:outline-none focus:ring-2 focus:ring-blue-500"
          placeholder="Masukkan nomor telepon"
        />
      </div>

      <!-- Tombol -->
      <div class="flex justify-between gap-4">
        <a 
          href="{{ route('pelanggan.index') }}"
          class="w-full bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 
                 rounded-lg text-center focus:ring-2 focus:ring-gray-500"
        >
          Batal
        </a>
        <button 
          type="submit"
          class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 
                 rounded-lg focus:ring-2 focus:ring-blue-500"
        >
          Update
        </button>
      </div>
    </form>

  </div>

</body>
</html>
