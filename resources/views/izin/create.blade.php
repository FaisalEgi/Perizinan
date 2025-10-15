<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Izin Baru - Perizinan Santri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #007bff, #00bfff);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
        }

        .izin-card {
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 40px 30px;
            width: 100%;
            max-width: 600px;
            animation: fadeInUp 0.6s ease;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .izin-card h3 {
            text-align: center;
            color: #007bff;
            font-weight: 700;
            margin-bottom: 25px;
        }

        label {
            font-weight: 500;
            color: #333;
        }

        textarea, input[type="text"], input[type="date"], select {
            border-radius: 10px;
            border: 1px solid #ccc;
            padding: 10px;
            transition: all 0.3s ease;
        }

        textarea:focus, input:focus, select:focus {
            border-color: #007bff;
            box-shadow: 0 0 6px rgba(0, 123, 255, 0.4);
            outline: none;
        }

        .btn-submit {
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            padding: 12px 25px;
            transition: all 0.3s ease;
        }

        .btn-submit:hover {
            background: #0056b3;
            transform: translateY(-2px);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #007bff;
            text-decoration: none;
            font-weight: 600;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="izin-card">
    <h3><i class="fas fa-plus-circle me-2"></i>Ajukan Izin Baru</h3>

    {{-- Menampilkan pesan error jika ada --}}
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

        {{-- NAMA SANTRI --}}
        <div class="mb-3">
            <label for="nama_santri">Nama Santri</label>
            <input type="text" id="nama_santri" name="nama_santri" class="form-control"
                placeholder="Masukkan nama lengkap santri" value="{{ old('nama_santri') }}" required>
        </div>

        {{-- KELAS --}}
        <div class="mb-3">
            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas" class="form-control"
                placeholder="Contoh: 9A / XI IPA 1" value="{{ old('kelas') }}" required>
        </div>

        {{-- ALAMAT TUJUAN --}}
        <div class="mb-3">
            <label for="alamat_tujuan">Alamat Tujuan</label>
            <textarea id="alamat_tujuan" name="alamat_tujuan" rows="3" class="form-control"
                placeholder="Masukkan alamat tempat tujuan izin" required>{{ old('alamat_tujuan') }}</textarea>
        </div>

        {{-- ALASAN --}}
        <div class="mb-3">
            <label for="alasan">Alasan Izin</label>
            <textarea id="alasan" name="alasan" rows="4" class="form-control"
                placeholder="Jelaskan alasan izin secara detail..." required>{{ old('alasan') }}</textarea>
        </div>

        {{-- TANGGAL MULAI --}}
        <div class="mb-3">
            <label for="tanggal_mulai">Tanggal Mulai</label>
            <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control"
                value="{{ old('tanggal_mulai') }}" required>
        </div>

        {{-- TANGGAL SELESAI --}}
        <div class="mb-3">
            <label for="tanggal_selesai">Tanggal Selesai</label>
            <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="form-control"
                value="{{ old('tanggal_selesai') }}" required>
        </div>

        {{-- NAMA PENJEMPUT --}}
        <div class="mb-3">
            <label for="nama_penjemput">Nama Penjemput</label>
            <input type="text" id="nama_penjemput" name="nama_penjemput" class="form-control"
                placeholder="Masukkan nama penjemput" value="{{ old('nama_penjemput') }}" required>
        </div>

        {{-- STATUS PENJEMPUT (ORANG TUA / WALI) --}}
        <div class="mb-4">
            <label for="status_penjemput">Penjemput adalah</label>
            <select id="status_penjemput" name="status_penjemput" class="form-select" required>
                <option value="">-- Pilih Salah Satu --</option>
                <option value="Orang Tua" {{ old('status_penjemput') == 'Orang Tua' ? 'selected' : '' }}>Orang Tua</option>
                <option value="Wali" {{ old('status_penjemput') == 'Wali' ? 'selected' : '' }}>Wali</option>
            </select>
        </div>

        <button type="submit" class="btn btn-submit w-100">Ajukan Izin</button>
    </form>

    <div class="back-link">
        <a href="{{ route('izin.index') }}">← Kembali ke Daftar Izin</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
