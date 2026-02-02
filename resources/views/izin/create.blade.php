<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Izin Baru - Perizinan Santri</title>

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

        .izin-card {
            width: 100%;
            max-width: 720px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border-radius: 22px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.25);
            padding: 40px 35px;
            animation: fadeInUp 0.7s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .izin-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .izin-header h3 {
            font-weight: 700;
            color: #0d6efd;
            margin-bottom: 5px;
        }

        .izin-header p {
            font-size: 14px;
            color: #555;
        }

        label {
            font-weight: 500;
            color: #333;
            margin-bottom: 6px;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            padding: 10px 14px;
            border: 1px solid #ced4da;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        textarea {
            resize: none;
        }

        .btn-submit {
            background: linear-gradient(135deg, #0d6efd, #198cff);
            border: none;
            border-radius: 14px;
            font-weight: 600;
            padding: 13px;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background: linear-gradient(135deg, #0b5ed7, #157ad8);
            transform: translateY(-2px);
        }

        .back-link {
            text-align: center;
            margin-top: 25px;
        }

        .back-link a {
            text-decoration: none;
            font-weight: 600;
            color: #0d6efd;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        .footer-text {
            text-align: center;
            font-size: 13px;
            color: #666;
            margin-top: 30px;
        }
    </style>
</head>
<body>

<div class="izin-card">

    <div class="izin-header">
        <h3>📝 Ajukan Izin Baru</h3>
        <p>Pesantren Muhammadiyah Al-Furqon Tasikmalaya</p>
    </div>

    {{-- Pesan Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('izin.store') }}">
        @csrf

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nama Santri</label>
                <input type="text" name="nama_santri" class="form-control"
                       value="{{ old('nama_santri') }}" placeholder="Nama lengkap santri" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control"
                       value="{{ old('kelas') }}" placeholder="Contoh: IX A / XI IPA 1" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Alamat Tujuan</label>
            <textarea name="alamat_tujuan" rows="3" class="form-control"
                      placeholder="Alamat tujuan izin" required>{{ old('alamat_tujuan') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Alasan Izin</label>
            <textarea name="alasan" rows="4" class="form-control"
                      placeholder="Jelaskan alasan izin secara jelas" required>{{ old('alasan') }}</textarea>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" class="form-control"
                       value="{{ old('tanggal_mulai') }}" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" class="form-control"
                       value="{{ old('tanggal_selesai') }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nama Penjemput</label>
                <input type="text" name="nama_penjemput" class="form-control"
                       value="{{ old('nama_penjemput') }}" placeholder="Nama penjemput" required>
            </div>

            <div class="col-md-6 mb-4">
                <label>Penjemput</label>
                <select name="status_penjemput" class="form-select" required>
                    <option value="">-- Pilih --</option>
                    <option value="Orang Tua" {{ old('status_penjemput') == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
                    <option value="Wali" {{ old('status_penjemput') == 'Wali' ? 'selected' : '' }}>Wali</option>
                </select>
            </div>
        </div>

        <button type="submit" class="btn btn-submit w-100">
            Kirim Pengajuan Izin
        </button>
    </form>

    <div class="back-link">
        <a href="{{ route('izin.index') }}">← Kembali ke Daftar Izin</a>
    </div>

    <div class="footer-text">
        © {{ date('Y') }} Pesantren Muhammadiyah Al-Furqon Tasikmalaya
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
