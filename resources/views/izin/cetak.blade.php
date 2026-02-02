<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Jalan Santri</title>

    <style>
        /* ✅ Cetak A4 portrait */
        @page {
            size: A4 portrait;
            margin: 20mm;
        }

        body {
            font-family: "Times New Roman", serif;
            margin: 40px;
        }

        .ttd img {
        width: 200px;
        height: auto;
        margin-top: 5px;
            }

.img-ttd {
    width: 220px;
    height: auto;
    margin: 10px 0;
    display: block;
    margin-left: auto;
    margin-right: auto;
}

        .kop {
            text-align: center;
            border-bottom: 3px double #000;
            padding-bottom: 5px;
            margin-bottom: 10px;
            position: relative;
        }

        .kop img {
            width: 100px;
            position: absolute;
            left: -40px;
            top: -20px;
        }

        .kop h2 {
            margin: 0;
            font-size: 22px;
        }

        .kop h3 {
            margin: 0;
            font-size: 20px;
        }

        .kop p {
            margin: 0;
            font-size: 14px;
            font-style: italic;
        }

        .arab {
            text-align: center;
            font-size: 18px;
            margin-top: 10px;
        }

        h3.judul {
            text-align: center;
            text-decoration: underline;
            margin-top: 5px;
            font-size: 20px;
            letter-spacing: 5px;
        }

        .isi {
            font-size: 15px;
            margin-top: 20px;
            line-height: 1.7;
        }

        .kotak {
            border: 1px solid #000;
            padding: 10px 20px;
            width: 85%;
            margin: 10px auto;
        }

        table.data {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        table.data td {
            vertical-align: top;
            padding: 2px 0;
        }

        .ttd {
            margin-top: 40px;
        }

        .ttd table {
            width: 100%;
        }

        .ttd td {
            text-align: center;
            vertical-align: bottom;
        }

        .catatan {
            font-size: 13px;
            margin-top: 30px;
        }

        @media print {
            .tidak-dicetak {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="kop">
        <img src="{{ asset('images/logo.png') }}" alt="Logo Pesantren">
        <h2>PENGASUHAN SANTRI</h2>
        <h3>PESANTREN MUHAMMADIYAH AL-FURQON</h3>
        <p>Jl. Raya Barat No. 21 A Singaparna ☎ (0265) 545721 Tasikmalaya</p>
    </div>

    <div class="arab">بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ</div>
    <h3 class="judul">S U R A T &nbsp; J A L A N</h3>

    <div class="isi">
        Yang bertanda tangan di bawah ini, Bagian Pengasuhan Santri Pesantren Muhammadiyah Al-Furqon Singaparna  
        memberikan izin kepada santri:
        <br><br>

        {{-- Data santri dan penjemput --}}
        <table class="data">
            <tr>
                <td style="width:50%; vertical-align:top; padding-right:20px;">
                    <table style="width:100%;">
                        <tr>
                            <td width="130">Nama Santri</td>
                            <td>: {{ $izin->nama_santri }}</td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td>: {{ $izin->kelas }}</td>
                        </tr>
                        <tr>
                            <td>Alamat Tujuan</td>
                            <td>: {{ $izin->alamat_tujuan }}</td>
                        </tr>
                        <tr>
                            <td>Alasan</td>
                            <td>: {{ $izin->alasan }}</td>
                        </tr>
                    </table>
                </td>

                <td style="width:50%; vertical-align:top; padding-left:20px;">
                    <table style="width:100%;">
                        <tr>
                            <td>Nama Penjemput</td>
                            <td>: {{ $izin->nama_penjemput }}</td>
                        </tr>
                        <tr>
                            <td>Status Penjemput</td>
                            <td>: {{ $izin->status_penjemput }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        @php
            \Carbon\Carbon::setLocale('id');
        @endphp

        <div class="kotak">
            <table width="100%">
                <tr>
                    <td width="140">Dimulai dari </td>
                    <td>: Hari {{ \Carbon\Carbon::parse($izin->tanggal_mulai)->translatedFormat('l') }}
                        s/d {{ \Carbon\Carbon::parse($izin->tanggal_selesai)->translatedFormat('l') }}</td>
                </tr>
                <tr>
                    <td>Tanggal </td>
                    <td>: {{ \Carbon\Carbon::parse($izin->tanggal_mulai)->translatedFormat('d F Y') }}
                        s/d {{ \Carbon\Carbon::parse($izin->tanggal_selesai)->translatedFormat('d F Y') }}</td>
                </tr>
                <tr>
                    <td>Terhitung selama </td>
                    <td>: {{ \Carbon\Carbon::parse($izin->tanggal_mulai)->diffInDays(\Carbon\Carbon::parse($izin->tanggal_selesai)) + 1 }} hari</td>
                </tr>
            </table>
        </div>

        <div class="ttd">
    <table>
        <tr>
            <!-- KIRI -->
            <td width="50%" style="text-align:center; vertical-align:top;">
              <br>Orang Tua / Wali Santri<br><br><br><br><br>
                ( ................................... )
            </td>

            <!-- KANAN -->
            <td width="50%" style="text-align:center; vertical-align:top;">
                Singaparna, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                Bagian Pengasuhan Santri

                <img src="{{ asset('images/ttd.png') }}" alt="TTD" class="img-ttd">
            </td>
        </tr>
    </table>
</div>


        <div class="catatan">
            <strong>Catatan:</strong><br>
            1. Harap diserahkan kepada Bagian Pengasuhan Santri setibanya kembali di pondok.<br>
            2. Santri yang terlambat kembali ke pondok akan dikenakan <strong>sanksi disiplin</strong>.
        </div>
    </div>

    {{-- Tombol cetak ulang --}}
    <div class="tidak-dicetak" style="text-align:center; margin-top:50px;">
        <button onclick="window.print()">🖨️ Cetak Surat Jalan</button>
    </div>


</body>
</html>
