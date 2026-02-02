<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin - Pesantren Muhammadiyah Al-Furqon Tasikmalaya</title>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2e0e6ad4b.js" crossorigin="anonymous"></script>

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-image: url('/images/Al-Furqon.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .overlay {
      background: linear-gradient(
        rgba(0, 80, 40, 0.8),
        rgba(0, 120, 80, 0.85)
      );
      min-height: 100vh;
    }

    .glass {
      background: rgba(255, 255, 255, 0.92);
      backdrop-filter: blur(12px);
      border-radius: 20px;
    }
  </style>
</head>

<body>
<div class="overlay flex items-center justify-center px-4">

  <div class="glass shadow-2xl p-10 w-full max-w-md text-center animate-fadeIn">

    <!-- Logo / Ikon -->
    <div class="mb-4">
      <i class="fas fa-mosque text-5xl text-green-600"></i>
    </div>

    <!-- Judul -->
    <h1 class="text-2xl font-bold text-green-700 mb-1">
      Dashboard Admin
    </h1>

    <p class="text-gray-600 mb-8">
      Kelola perizinan santri dan pantau aktivitas kepulangan dengan mudah dan tertib.
    </p>

    <!-- Tombol -->
    <div class="flex flex-col gap-4">

      <!-- Kelola Izin -->
      <a href="{{ route('admin.izin.index') }}"
         class="bg-gradient-to-r from-green-600 to-green-700 text-white py-3 px-5 rounded-xl font-semibold shadow-md hover:from-green-700 hover:to-green-800 transition flex items-center justify-center gap-2">
        <i class="fas fa-cogs"></i>
        Kelola Izin Santri
      </a>

      <!-- Logout -->
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
                class="bg-gradient-to-r from-red-500 to-red-600 text-white py-3 px-5 rounded-xl font-semibold shadow-md hover:from-red-600 hover:to-red-700 transition w-full flex items-center justify-center gap-2">
          <i class="fas fa-sign-out-alt"></i>
          Logout
        </button>
      </form>

    </div>

    <!-- Footer kecil -->
    <div class="mt-8 text-xs text-gray-500">
      © {{ date('Y') }} Pesantren Muhammadiyah Al-Furqon Tasikmalaya
    </div>

  </div>
</div>

</body>
</html>
