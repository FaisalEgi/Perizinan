<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Orang Tua - Sistem Perizinan Santri</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #007bff, #6dd5fa, #ffffff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
        }

        .dashboard-card {
            width: 100%;
            max-width: 680px;
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            animation: fadeIn 0.8s ease-in-out;
        }

        .card-header {
            background: linear-gradient(135deg, #0066cc, #0099ff);
            color: #fff;
            padding: 25px 20px;
            text-align: center;
            border-bottom: none;
        }

        .card-header h3 {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .card-body {
            padding: 35px 25px;
            text-align: center;
        }

        .card-body p {
            color: #555;
        }

        .btn-custom {
            display: inline-block;
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 500;
            font-size: 15px;
            transition: all 0.3s ease;
        }

        .btn-izin {
            background: linear-gradient(135deg, #007bff, #00aaff);
            color: #fff;
        }

        .btn-izin:hover {
            background: linear-gradient(135deg, #0066cc, #0099e6);
            transform: translateY(-2px);
        }

        .btn-logout {
            background: linear-gradient(135deg, #dc3545, #e85d6d);
            color: #fff;
        }

        .btn-logout:hover {
            background: linear-gradient(135deg, #c82333, #d64554);
            transform: translateY(-2px);
        }

        .button-group {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="dashboard-card">
        <div class="card-header">
            <h3>Dashboard Orang Tua</h3>
            <p class="mb-0 small text-light">Sistem Perizinan Santri</p>
        </div>

        <div class="card-body">
            <p class="fs-5 mb-3">Halo, <strong>{{ Auth::user()->name }}</strong> 👋</p>
            <p class="text-secondary mb-4">
                Selamat datang! Di sini Anda dapat <strong>mengajukan izin</strong> dan 
                <strong>memantau status</strong> pengajuan secara online dengan mudah.
            </p>

            <div class="button-group mt-4">
                <a href="{{ route('izin.create') }}" class="btn-custom btn-izin">Ajukan Izin</a>
                <a href="{{ route('izin.index') }}" class="btn-custom btn-izin">Lihat Daftar Izin</a>
                <a href="#" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="btn-custom btn-logout">
                    Logout
                </a>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Setelah logout, redirect ke halaman login_custom
        const form = document.getElementById('logout-form');
        form.addEventListener('submit', function() {
            setTimeout(() => {
                window.location.href = "{{ route('login') }}"; // arahkan ke login_custom
            }, 500);
        });
    </script>

</body>
</html>
