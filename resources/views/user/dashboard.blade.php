<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Orang Tua - Sistem Perizinan Santri</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background:
                linear-gradient(rgba(0, 70, 140, 0.75), rgba(0, 70, 140, 0.75)),
                url('/images/Al-Furqon.jpg') no-repeat center center / cover;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            padding: 20px;
        }

        .dashboard-card {
            width: 100%;
            max-width: 820px;
            background: rgba(255, 255, 255, 0.92);
            backdrop-filter: blur(12px);
            border-radius: 22px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            animation: fadeIn 0.8s ease-in-out;
        }

        .card-header {
            background: linear-gradient(135deg, #0d6efd, #198cff);
            color: #fff;
            padding: 30px 25px;
            text-align: center;
        }

        .card-header h3 {
            font-weight: 700;
            margin-bottom: 5px;
        }

        .card-header span {
            font-size: 14px;
            opacity: 0.9;
        }

        .card-body {
            padding: 40px 30px;
            text-align: center;
        }

        .welcome-text {
            font-size: 18px;
            font-weight: 500;
        }

        .welcome-text span {
            font-weight: 600;
            color: #0d6efd;
        }

        .desc-text {
            color: #555;
            margin-top: 10px;
            margin-bottom: 35px;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .menu-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 25px 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-decoration: none;
            color: #333;
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }

        .menu-icon {
            font-size: 36px;
            margin-bottom: 15px;
        }

        .icon-izin {
            color: #0d6efd;
        }

        .icon-list {
            color: #198754;
        }

        .icon-logout {
            color: #dc3545;
        }

        .menu-card h5 {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .menu-card p {
            font-size: 14px;
            color: #666;
        }

        .footer-text {
            text-align: center;
            font-size: 13px;
            color: #777;
            margin-top: 35px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(25px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="dashboard-card">

    <div class="card-header">
        <h3>Dashboard Orang Tua</h3>
        <span>Pesantren Muhammadiyah Al-Furqon Tasikmalaya</span>
    </div>

    <div class="card-body">
        <div class="welcome-text">
            Assalamu’alaikum, <span>{{ Auth::user()->name }}</span> 👋
        </div>

        <div class="desc-text">
            Melalui sistem ini, Anda dapat <strong>mengajukan izin santri</strong>  
            dan <strong>memantau status izin</strong> secara cepat dan transparan.
        </div>

        <div class="menu-grid">
            <a href="{{ route('izin.create') }}" class="menu-card">
                <div class="menu-icon icon-izin">📝</div>
                <h5>Ajukan Izin</h5>
                <p>Ajukan izin santri secara online dengan mudah.</p>
            </a>

            <a href="{{ route('izin.index') }}" class="menu-card">
                <div class="menu-icon icon-list">📋</div>
                <h5>Daftar Izin</h5>
                <p>Lihat status izin: pending, diterima, ditolak, atau selesai.</p>
            </a>

            <a href="#" class="menu-card"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="menu-icon icon-logout">🚪</div>
                <h5>Logout</h5>
                <p>Keluar dari sistem perizinan santri.</p>
            </a>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

        <div class="footer-text">
            © {{ date('Y') }} Pesantren Muhammadiyah Al-Furqon Tasikmalaya
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
