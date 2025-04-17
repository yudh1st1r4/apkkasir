<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kasir App - Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#2f2f35] min-h-screen flex items-center justify-center">

  <div class="w-[90%] max-w-5xl bg-[#1f1f26] text-white rounded-3xl overflow-hidden shadow-2xl flex flex-col md:flex-row">
    
    <!-- Left Side: Form -->
    <div class="w-full md:w-1/2 p-10 relative z-10">
      <h4 class="text-sm text-gray-400 mb-2">Welcome to</h4>
      <h1 class="text-4xl font-bold mb-2">Kasir App<span class="text-blue-500">.</span></h1>
      <p class="text-sm text-gray-400 mb-6">Manage your sales efficiently</p>

      <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <div>
          <label for="email" class="block text-sm text-gray-300 mb-1">Email</label>
          <input id="email" type="email" name="email" required autofocus
            class="w-full bg-[#2d2d36] px-4 py-3 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="you@example.com">
        </div>

        <div>
          <label for="password" class="block text-sm text-gray-300 mb-1">Password</label>
          <input id="password" type="password" name="password" required
            class="w-full bg-[#2d2d36] px-4 py-3 rounded-lg text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Enter your password">
        </div>

        <div class="flex items-center mb-2">
          <input id="remember_me" type="checkbox" name="remember"
            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring focus:ring-blue-200">
          <label for="remember_me" class="ml-2 text-sm text-gray-400">Remember me</label>
        </div>

        <div class="flex justify-between items-center">
          @if (Route::has('password.request'))
          <a href="{{ route('password.request') }}" class="text-sm text-blue-400 hover:underline">Forgot password?</a>
          @endif

          <button type="submit"
            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:ring-2 focus:ring-blue-500">
            Log In
          </button>
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
