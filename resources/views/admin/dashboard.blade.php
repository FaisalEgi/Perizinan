<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2e0e6ad4b.js" crossorigin="anonymous"></script>
</head>
<body class="bg-green-50 min-h-screen flex flex-col items-center justify-center">
  <div class="bg-white rounded-xl shadow-lg p-10 w-full max-w-md text-center">
    <h1 class="text-2xl font-bold text-green-700 mb-4">Selamat Datang, Admin</h1>
    <p class="text-gray-600 mb-6">Kelola izin santri dan pantau aktivitas di sini.</p>

    <div class="flex flex-col gap-3">
      <!-- Tombol ke halaman kelola izin -->
      <a href="{{ route('admin.izin.index') }}" 
         class="bg-green-600 text-white py-2 px-4 rounded-lg hover:bg-green-700 transition inline-block">
         <i class="fas fa-cogs mr-2"></i>Kelola Izin Santri
      </a>

      <!-- Tombol logout -->
      <form method="POST" action="{{ route('logout') }}" class="mt-2">
          @csrf
          <button type="submit" 
                  class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition w-full">
              <i class="fas fa-sign-out-alt mr-2"></i>Keluar
          </button>
      </form>
    </div>
  </div>

  
</body>
</html>
