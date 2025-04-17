<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Profile Card</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body class="bg-[#2f2f35] text-white flex items-center justify-center min-h-screen">

  <div class="bg-[#1f1f26] w-[90%] max-w-sm rounded-2xl shadow-xl overflow-hidden p-6">
    
    <!-- Profile Image -->
    <div class="flex flex-col items-center">
      <img id="selected-avatar" src="https://i.pinimg.com/736x/0b/97/6f/0b976f0a7aa1aa43870e1812eee5a55d.jpg"
           class="w-24 h-24 rounded-full border-4 border-blue-500 shadow-lg" />
      <h2 class="text-xl font-bold mt-4">Profile</h2>
    </div>

    <!-- User Info -->
    <div class="text-center mt-4">
      <p class="text-lg">Welcome, <strong>{{ Auth::user()->name }}</strong></p>
      <p class="text-sm text-gray-400">Email: {{ Auth::user()->email }}</p>
    </div>

    <!-- Avatar Selection -->
    <div class="flex justify-center gap-3 mt-4 flex-wrap avatar-selection">
      <img src="https://i.pinimg.com/736x/0b/97/6f/0b976f0a7aa1aa43870e1812eee5a55d.jpg"
           onclick="selectAvatar(this.src)" class="w-12 h-12 rounded-full cursor-pointer border-2 border-blue-500 transition-all selected" />
      <img src="https://i.pinimg.com/736x/6f/a3/6a/6fa36aa2c367da06b2a4c8ae1cf9ee02.jpg"
           onclick="selectAvatar(this.src)" class="w-12 h-12 rounded-full cursor-pointer border-2 border-transparent hover:border-blue-500" />
      <img src="https://i.pinimg.com/736x/8c/6d/db/8c6ddb5fe6600fcc4b183cb2ee228eb7.jpg"
           onclick="selectAvatar(this.src)" class="w-12 h-12 rounded-full cursor-pointer border-2 border-transparent hover:border-blue-500" />
      <img src="https://i.pinimg.com/736x/9f/db/f4/9fdbf4c61a5e5e91878cb7e59655e4a2.jpg"
           onclick="selectAvatar(this.src)" class="w-12 h-12 rounded-full cursor-pointer border-2 border-transparent hover:border-blue-500" />
    </div>

    <!-- Action Buttons -->
    <div class="mt-6 space-y-3">
      @if(Auth::user()->role == 'admin')
        <a href="{{ route('dashboard') }}"
           class="block text-center bg-blue-600 hover:bg-blue-700 font-semibold py-2 px-4 rounded transition">
           Admin Dashboard
        </a>
      @else
        <a href="{{ route('kasir.dashboard') }}"
           class="block text-center bg-blue-600 hover:bg-blue-700 font-semibold py-2 px-4 rounded transition">
           Kasir Dashboard
        </a>
      @endif

      <a href="{{ route('logout') }}"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
         class="block text-center bg-red-600 hover:bg-red-700 font-semibold py-2 px-4 rounded transition">
         Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
        @csrf
      </form>
    </div>
  </div>

  <script>
    function selectAvatar(imageUrl) {
      document.getElementById('selected-avatar').src = imageUrl;
      document.querySelectorAll('.avatar-selection img').forEach(img => img.classList.remove('border-blue-500', 'selected'));
      event.target.classList.add('border-blue-500', 'selected');
    }
  </script>

</body>
</html>
