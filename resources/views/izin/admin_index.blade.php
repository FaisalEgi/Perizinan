<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Izin Santri</title>
    <script src="https://kit.fontawesome.com/a2e0e6ad4d.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50 font-sans">

    <div class="max-w-7xl mx-auto py-10 px-6">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-green-700 flex items-center">
                <i class="fas fa-cogs mr-2"></i>Kelola Izin Santri
            </h1>

            <a href="{{ route('admin.dashboard') }}" 
               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Dashboard
            </a>
        </div>

        <!-- Tabs -->
        <div class="bg-white rounded-lg shadow border border-green-100 mb-6">
            <div class="flex justify-between items-center p-4 border-b border-green-100">
                <div class="flex gap-3 flex-wrap">
                    <button onclick="tampilkanTabel('pending')" id="tabPending"
                        class="px-4 py-2 rounded-lg bg-yellow-100 text-yellow-800 font-semibold hover:bg-yellow-200">
                        <i class="fas fa-clock mr-1"></i> Pending
                    </button>
                    <button onclick="tampilkanTabel('diterima')" id="tabDiterima"
                        class="px-4 py-2 rounded-lg bg-green-100 text-green-800 font-semibold hover:bg-green-200">
                        <i class="fas fa-check mr-1"></i> Diterima (Masih Izin)
                    </button>
                    <button onclick="tampilkanTabel('ditolak')" id="tabDitolak"
                        class="px-4 py-2 rounded-lg bg-red-100 text-red-800 font-semibold hover:bg-red-200">
                        <i class="fas fa-times mr-1"></i> Ditolak
                    </button>
                    <button onclick="tampilkanTabel('selesai')" id="tabSelesai"
                        class="px-4 py-2 rounded-lg bg-blue-100 text-blue-800 font-semibold hover:bg-blue-200">
                        <i class="fas fa-flag-checkered mr-1"></i> Izin Selesai
                    </button>
                </div>
            </div>

            <div class="p-6">
                <!-- Pencarian -->
                <div class="mb-4 flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-green-700">Daftar Izin</h2>
                    <input type="text" id="cari" placeholder="Cari nama santri..." 
                        class="border rounded-lg px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-green-400">
                </div>

                <!-- Table Wrapper -->
                <div class="overflow-x-auto">
                    @foreach (['pending', 'diterima', 'ditolak', 'selesai'] as $status)
                        <table id="tabel-{{ $status }}" class="min-w-full divide-y divide-green-200 hidden">
                            <thead class="bg-green-100">
                                <tr>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Nama Santri</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Kelas</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Orang Tua</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Alamat Tujuan</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Status Penjemput</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Penjemput</th>
                                    <th class="px-4 py-2 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Tanggal</th>

                                    @if($status === 'selesai')
                                        <th class="px-4 py-2 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Keterangan</th>
                                    @endif

                                    <th class="px-4 py-2 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="bg-white divide-y divide-green-100">
                                @forelse($izin->where('status', $status) as $item)
                                    <tr class="hover:bg-green-50 transition">
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $item->nama_santri }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $item->kelas }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-800">{{ $item->user->name }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $item->alamat_tujuan }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $item->status_penjemput }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-700">{{ $item->nama_penjemput }}</td>
                                        <td class="px-4 py-2 text-sm text-gray-600">
                                            {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M') }} - 
                                            {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}
                                        </td>

                                        @if($status === 'selesai')
                                            <td class="px-4 py-2 text-sm text-gray-700">
                                                @if($item->keterangan_keterlambatan)
                                                    @if(Str::contains($item->keterangan_keterlambatan, 'Terlambat'))
                                                        <span class="text-red-600 font-semibold">
                                                            <i class="fas fa-exclamation-circle"></i> {{ $item->keterangan_keterlambatan }}
                                                        </span>
                                                    @else
                                                        <span class="text-green-700 font-semibold">
                                                            <i class="fas fa-check-circle"></i> {{ $item->keterangan_keterlambatan }}
                                                        </span>
                                                    @endif
                                                @else
                                                    <span class="text-gray-500">-</span>
                                                @endif
                                            </td>
                                        @endif

                                        <td class="px-4 py-2 text-sm">
                                            @if($status === 'pending')
                                                <div class="flex space-x-2">
                                                    <a href="{{ route('admin.izin.terima', $item->id) }}" 
                                                       onclick="return confirm('Terima izin ini?')"
                                                       class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition">
                                                       <i class="fas fa-check mr-1"></i>Terima
                                                    </a>
                                                    <button onclick="bukaModal({{ $item->id }})"
                                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                                        <i class="fas fa-times mr-1"></i>Tolak
                                                    </button>
                                                </div>

                                            @elseif($status === 'ditolak')
                                                <button onclick="alert('Alasan penolakan: {{ $item->alasan_penolakan ?? 'Tidak ada alasan' }}')"
                                                    class="px-3 py-1 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">
                                                    <i class="fas fa-info-circle mr-1"></i>Lihat Alasan
                                                </button>

                                            @elseif($status === 'diterima')
                                                <button onclick="tandaiSelesai({{ $item->id }})"
                                                    class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                                                    <i class="fas fa-flag-checkered mr-1"></i>Selesai
                                                </button>

                                            @elseif($status === 'selesai')
                                                <span class="text-blue-600"><i class="fas fa-flag"></i> Selesai</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="{{ $status === 'selesai' ? 7 : 6 }}" class="text-center py-4 text-gray-500">
                                            Tidak ada data {{ $status }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tolak -->
    <div id="modalTolak" class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96">
            <h2 class="text-lg font-semibold mb-4 text-red-600">Alasan Penolakan</h2>
            <form id="formTolak" method="POST">
                @csrf
                <textarea name="alasan_penolakan" rows="4" class="w-full border rounded p-2" placeholder="Masukkan alasan penolakan..." required></textarea>
                <div class="mt-4 flex justify-end gap-2">
                    <button type="button" onclick="tutupModal()" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Kirim</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Tampilkan tabel default (pending)
        document.addEventListener('DOMContentLoaded', () => tampilkanTabel('pending'));

        function tampilkanTabel(status) {
            ['pending', 'diterima', 'ditolak', 'selesai'].forEach(s => {
                document.getElementById(`tabel-${s}`).classList.add('hidden');
                document.getElementById(`tab${s.charAt(0).toUpperCase() + s.slice(1)}`).classList.remove('ring', 'ring-green-400');
            });
            document.getElementById(`tabel-${status}`).classList.remove('hidden');
            document.getElementById(`tab${status.charAt(0).toUpperCase() + status.slice(1)}`).classList.add('ring', 'ring-green-400');
        }

        function bukaModal(id) {
            const modal = document.getElementById('modalTolak');
            const form = document.getElementById('formTolak');
            form.action = `/admin/izin/${id}/tolak`;
            modal.classList.remove('hidden');
        }

        function tutupModal() {
            document.getElementById('modalTolak').classList.add('hidden');
        }

        function tandaiSelesai(id) {
            if (confirm('Tandai izin ini sebagai selesai?')) {
                window.location.href = `/admin/izin/${id}/selesai`;
            }
        }

        // Filter pencarian
        document.getElementById('cari').addEventListener('input', function() {
            const kata = this.value.toLowerCase();
            document.querySelectorAll('tbody tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(kata) ? '' : 'none';
            });
        });
    </script>

</body>
</html>
