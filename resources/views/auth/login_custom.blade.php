<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perizinan Santri</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
        }

        .login-card {
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
            padding: 40px 35px;
            width: 100%;
            max-width: 430px;
            animation: fadeInUp 0.6s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .pesantren-title {
            text-align: center;
            margin-bottom: 25px;
        }

        .pesantren-title h4 {
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 5px;
            font-size: 40px;
        }

        .pesantren-title h6 {
            font-weight: 700;
            color: #000000ff;
            margin-bottom: 5px;
            font-size: 25px;
        }

        .pesantren-title span {
            font-size: 14px;
            color: #555;
        }

        .login-card h5 {
            text-align: center;
            font-weight: 600;
            margin-bottom: 25px;
            color: #000000ff;
        }

        .form-label {
            font-weight: 500;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px 12px;
        }

        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.4);
        }

        .btn-primary {
            border-radius: 10px;
            font-weight: 600;
            padding: 10px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }

        .register-link a {
            color: #0d6efd;
            font-weight: 600;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .footer-text {
            text-align: center;
            font-size: 12px;
            color: #888;
            margin-top: 25px;
        }

        .modal-content {
            border-radius: 15px;
        }
    </style>
</head>
<body>

<div class="login-card">

    <div class="pesantren-title">
        <h4>Pesantren Muhammadiyah Al-Furqon</h4>
        <h6>Tasikmalaya</h6>
    </div>

    <h5>Sistem Perizinan Santri</h5>

    @if(session('error'))
        <div class="alert alert-danger text-center">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <!-- Modal Sukses -->
        <div class="modal fade" id="successModal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title w-100">🎉 Pendaftaran Berhasil</h5>
                    </div>
                    <div class="modal-body">
                        {{ session('success') }}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success w-100" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required autofocus>
        </div>

        <div class="mb-3">
            <label class="form-label">Kata Sandi</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-2">
            Masuk
        </button>
    </form>

    <div class="register-link">
        Belum punya akun?  
        <a href="{{ route('register') }}">Daftar sebagai Orangtua</a>
    </div>

    <div class="footer-text">
        © {{ date('Y') }} Pesantren Muhammadiyah Al-Furqon Tasikmalaya
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

@if(session('success'))
<script>
    const modal = new bootstrap.Modal(document.getElementById('successModal'), {
        backdrop: 'static',
        keyboard: false
    });
    modal.show();

    setTimeout(() => modal.hide(), 3000);
</script>
@endif

</body>
</html>
