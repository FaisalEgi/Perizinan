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
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-green-700 flex items-center">
                <i class="fas fa-cogs mr-2"></i>Kelola Izin Santri
            </h1>

            <a href="{{ route('admin.dashboard') }}" 
               class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-green-100">
            <div class="p-6">
                @if($izin->isEmpty())
                    <div class="text-center py-12">
                        <i class="fas fa-clipboard-list text-6xl text-green-300 mb-4"></i>
                        <h3 class="text-lg font-semibold text-green-800 mb-2">Belum ada pengajuan izin</h3>
                        <p class="text-green-600">Tunggu orang tua mengajukan izin untuk santri.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-green-200">
                            <thead class="bg-green-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Nama Santri</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Orang Tua / Wali</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Alamat Tujuan</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Nama Penjemput</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Status Penjemput</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Alasan</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Tanggal Mulai</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Tanggal Selesai</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-green-800 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-green-100">
                                @foreach($izin as $item)
                                <tr class="hover:bg-green-50 transition">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $item->nama_santri }}</td>
                                    <td class="px-6 py-4 text-sm font-medium text-gray-800">{{ $item->user->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $item->alamat_tujuan }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $item->nama_penjemput }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $item->status_penjemput }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ Str::limit($item->alasan, 50) }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-600">{{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') }}</td>
                                    <td class="px-6 py-4">
                                        @if($item->status === 'pending')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                <i class="fas fa-clock mr-1"></i> Pending
                                            </span>
                                        @elseif($item->status === 'diterima')
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                <i class="fas fa-check mr-1"></i> Diterima
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                <i class="fas fa-times mr-1"></i> Ditolak
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium">
                                        @if($item->status === 'pending')
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.izin.terima', $item->id) }}" 
                                                   onclick="return confirm('Terima izin ini?')"
                                                   class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 transition">
                                                   <i class="fas fa-check mr-1"></i>Terima
                                                </a>
                                                <a href="{{ route('admin.izin.tolak', $item->id) }}" 
                                                   onclick="return confirm('Tolak izin ini?')"
                                                   class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                                   <i class="fas fa-times mr-1"></i>Tolak
                                                </a>
                                            </div>
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

</body>
</html>
