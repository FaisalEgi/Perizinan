<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Izin Santri</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #f3f6fb;
    }
    table {
      border-collapse: separate;
      border-spacing: 0 8px;
    }
    tbody tr {
      background-color: #ffffff;
      border-radius: 8px;
      transition: all 0.2s ease-in-out;
    }
    tbody tr:hover {
      background-color: #e8f1ff;
      transform: scale(1.01);
    }
  </style>
</head>

<body class="bg-gray-100 min-h-screen">

  <!-- Header -->
  <div class="bg-gradient-to-r from-blue-600 to-blue-700 shadow-md sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h2 class="font-semibold text-xl text-white flex items-center gap-2">
        <i class="fas fa-list"></i> Daftar Izin Santri
      </h2>

      <div class="flex items-center gap-3">
        <!-- Tombol Kembali ke Dashboard -->
        <a href="{{ route('user.dashboard') }}" 
           class="bg-white hover:bg-blue-100 transition duration-200 text-blue-700 font-semibold py-2 px-4 rounded-lg shadow-md flex items-center gap-2">
          <i class="fas fa-home"></i> Dashboard
        </a>

        <!-- Tombol Ajukan Izin -->
        <a href="{{ route('izin.create') }}" 
           class="bg-white hover:bg-blue-100 transition duration-200 text-blue-700 font-semibold py-2 px-4 rounded-lg shadow-md flex items-center gap-2">
          <i class="fas fa-plus"></i> Ajukan Izin Baru
        </a>
      </div>
    </div>
  </div>

  <!-- Konten -->
  <div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white shadow-xl rounded-xl overflow-hidden">
        <div class="p-6 lg:p-8">

          @if($izin->isEmpty())
            <div class="text-center py-16">
              <i class="fas fa-inbox text-7xl text-blue-300 mb-6"></i>
              <h3 class="text-2xl font-semibold text-gray-800 mb-2">Belum Ada Pengajuan Izin</h3>
              <p class="text-gray-500 mb-6">Silakan ajukan izin santri terlebih dahulu.</p>
              <a href="{{ route('izin.create') }}" 
                 class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-lg shadow-md transition duration-200">
                <i class="fas fa-paper-plane mr-2"></i>Ajukan Izin Pertama
              </a>
            </div>
          @else
            <div class="overflow-x-auto">
              <table class="min-w-full text-sm">
                <thead class="bg-blue-50 border-b border-blue-200">
                  
                  <tr>
                    <th class="px-4 py-2 text-left font-semibold text-blue-800 uppercase tracking-wider">Nama Santri</th>
                    <th class="px-4 py-2 text-left font-semibold text-blue-800 uppercase tracking-wider">Kelas</th>
                    <th class="px-4 py-2 text-left font-semibold text-blue-800 uppercase tracking-wider">Alamat Tujuan</th>
                    <th class="px-4 py-2 text-left font-semibold text-blue-800 uppercase tracking-wider">Nama Penjemput</th>
                    <th class="px-4 py-2 text-left font-semibold text-blue-800 uppercase tracking-wider">Status Penjemput</th>
                    <th class="px-4 py-2 text-left font-semibold text-blue-800 uppercase tracking-wider">Alasan</th>
                    <th class="px-4 py-2 text-left font-semibold text-blue-800 uppercase tracking-wider">Tanggal Mulai</th>
                    <th class="px-4 py-2 text-left font-semibold text-blue-800 uppercase tracking-wider">Tanggal Selesai</th>
                    <th class="px-4 py-2 text-left font-semibold text-blue-800 uppercase tracking-wider">Status</th>
                    <th class="px-4 py-2 text-center font-semibold text-blue-800 uppercase tracking-wider">Aksi</th>
                  </tr>
                </thead>

                <tbody>
                  @foreach($izin as $item)
                  <tr class="shadow-sm hover:shadow-md transition duration-150">
                    <td class="px-4 py-2 font-medium text-gray-800">{{ $item->nama_santri }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $item->kelas }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $item->alamat_tujuan }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $item->nama_penjemput }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $item->status_penjemput }}</td>
                    <td class="px-4 py-2 text-gray-800">{{ $item->alasan }}</td>
                    <td class="px-4 py-2 text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}</td>
                    <td class="px-4 py-2 text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}</td>
                    
                    <td class="px-6 py-3">
                      @if($item->status === 'pending')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                          <i class="fas fa-clock mr-1"></i> Pending
                        </span>
                      @elseif($item->status === 'diterima')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                          <i class="fas fa-check mr-1"></i> Sedang Izin
                        </span>
                      @elseif($item->status === 'selesai')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                          <i class="fas fa-flag-checkered mr-1"></i> Izin Selesai
                        </span>
                        @if($item->keterangan_keterlambatan)
                          <div class="text-xs text-gray-600 mt-1">{{ $item->keterangan_keterlambatan }}</div>
                        @endif
                      @elseif($item->status === 'ditolak')
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                          <i class="fas fa-times mr-1"></i> Ditolak
                        </span>
                      @endif
                    </td>

                    <td class="px-6 py-3 text-center">
                      @if($item->status === 'diterima')
                        <button onclick="cetakIzin({{ $item->id }})" 
                                class="text-blue-600 hover:text-blue-800 transition duration-150 flex justify-center items-center gap-1">
                          <i class="fas fa-print"></i>
                          <span>Cetak</span>
                        </button>

                      @elseif($item->status === 'ditolak' && $item->alasan_penolakan)
                        <button onclick="lihatAlasan(`{{ $item->alasan_penolakan }}`)" 
                                class="text-red-600 hover:text-red-800 transition duration-150 flex justify-center items-center gap-1">
                          <i class="fas fa-info-circle"></i>
                          <span>Lihat Alasan</span>
                        </button>

                      @elseif($item->status === 'selesai' && $item->keterangan_keterlambatan)
                        <button onclick="lihatAlasan(`{{ $item->keterangan_keterlambatan }}`)" 
                                class="text-blue-600 hover:text-blue-800 transition duration-150 flex justify-center items-center gap-1">
                          <i class="fas fa-info-circle"></i>
                          <span>Lihat Keterangan</span>
                        </button>

                      @else
                        <span class="text-gray-400">-</span>
                      @endif
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          @endif

        </div>
      </div>
    </div>
  </div>

  <!-- Iframe tersembunyi untuk cetak -->
  <iframe id="frameCetak" style="display:none;"></iframe>

  <script>
  function cetakIzin(id) {
      fetch(`/izin/${id}/cetak`)
          .then(res => {
              if (!res.ok) throw new Error("Gagal memuat halaman cetak");
              return res.text();
          })
          .then(html => {
              const frame = document.getElementById('frameCetak');
              frame.contentDocument.open();
              frame.contentDocument.write(html);
              frame.contentDocument.close();
              setTimeout(() => {
                  frame.contentWindow.focus();
                  frame.contentWindow.print();
              }, 500);
          })
          .catch(err => alert(err.message));
  }

  function lihatAlasan(alasan) {
      const modal = document.createElement('div');
      modal.className = 'fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50';
      modal.innerHTML = `
        <div class="bg-white p-6 rounded-xl shadow-lg w-96 text-center animate-fadeIn">
          <h2 class="text-lg font-semibold text-blue-600 mb-3"><i class="fas fa-info-circle"></i> Keterangan</h2>
          <p class="text-gray-700 mb-6">${alasan}</p>
          <button onclick="this.parentElement.parentElement.remove()" 
                  class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Tutup</button>
        </div>
      `;
      document.body.appendChild(modal);
  }
  </script>
</body>
</html>
