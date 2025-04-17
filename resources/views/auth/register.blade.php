<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#2f2f35] min-h-screen flex items-center justify-center relative overflow-hidden">

  <!-- Background Image -->
  <div class="absolute inset-0 bg-cover bg-center opacity-20 blur-sm"
       style="background-image: url('https://i.pinimg.com/736x/2c/85/77/2c857711709b9bcc2f8c77a9762b1061.jpg');"></div>

  <!-- Gradient Overlay -->
  <div class="absolute inset-0 bg-gradient-to-r from-[#1f1f26] via-[#2f2f35] to-[#1f1f26] opacity-90"></div>

  <!-- Form -->
  <div class="relative z-10 w-[90%] max-w-md bg-[#1f1f26]/80 text-white p-8 rounded-2xl shadow-xl backdrop-blur-md">

    <h1 class="text-3xl font-bold mb-2 text-center">Register<span class="text-blue-500">.</span></h1>
    <p class="text-sm text-gray-400 mb-6 text-center">Silakan isi data untuk membuat akun baru</p>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
      @csrf

      <!-- Name -->
      <div>
        <label for="name" class="block text-sm mb-1">Name</label>
        <input id="name" name="name" type="text" required value="{{ old('name') }}"
               class="w-full px-4 py-3 rounded-lg bg-[#2d2d36] text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
               placeholder="Masukkan nama lengkap">
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block text-sm mb-1">Email</label>
        <input id="email" name="email" type="email" required value="{{ old('email') }}"
               class="w-full px-4 py-3 rounded-lg bg-[#2d2d36] text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
               placeholder="Masukkan email">
      </div>

      <!-- Role -->
      <div>
        <label for="role" class="block text-sm mb-1">Role</label>
        <select id="role" name="role" required
                class="w-full px-4 py-3 rounded-lg bg-[#2d2d36] text-sm text-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
          <option value="kasir" selected>Kasir</option>
          <option value="admin">Admin</option>
        </select>
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block text-sm mb-1">Password</label>
        <input id="password" name="password" type="password" required
               class="w-full px-4 py-3 rounded-lg bg-[#2d2d36] text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
               placeholder="Buat password">
      </div>

      <!-- Confirm Password -->
      <div>
        <label for="password_confirmation" class="block text-sm mb-1">Confirm Password</label>
        <input id="password_confirmation" name="password_confirmation" type="password" required
               class="w-full px-4 py-3 rounded-lg bg-[#2d2d36] text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
               placeholder="Ulangi password">
      </div>

      <div class="flex justify-between items-center text-sm">
        <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Sudah punya akun?</a>
        <button type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          Register
        </button>
      </div>
    </form>
  </div>

</body>
</html>
