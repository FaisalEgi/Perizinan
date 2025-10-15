<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IzinController extends Controller
{
    /**
     * Orang Tua: Menampilkan daftar izin milik user yang login
     * Admin: Redirect ke halaman adminIndex
     */
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.izin.index');
        }

        $izin = Izin::where('user_id', Auth::id())->latest()->get();
        return view('izin.index', compact('izin'));
    }

    /**
     * Admin: Menampilkan semua izin
     */
    public function adminIndex()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $izin = Izin::with('user')->latest()->get();
        return view('izin.admin_index', compact('izin'));
    }

    /**
     * Form untuk ajukan izin (khusus orang tua)
     */
    public function create()
    {
        if (Auth::user()->role !== 'orangtua') {
            abort(403, 'Unauthorized');
        }

        return view('izin.create');
    }

    /**
     * Simpan izin baru ke database (orang tua)
     */
    public function store(Request $request)
{
    if (Auth::user()->role !== 'orangtua') {
        abort(403, 'Unauthorized');
    }

    // Validasi input
    $request->validate([
        'nama_santri' => 'required|string|max:255',
        'kelas' => 'required|string|max:100',
        'alamat_tujuan' => 'required|string|max:255',
        'alasan' => 'required|string|max:255',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        'nama_penjemput' => 'required|string',
        'status_penjemput' => 'required|in:Orang Tua,Wali',
    ]);

    // Simpan data izin ke database
    Izin::create([
        'user_id' => Auth::id(),
        'nama_santri' => $request->nama_santri,
        'kelas' => $request->kelas,
        'alamat_tujuan' => $request->alamat_tujuan,
        'alasan' => $request->alasan,
        'tanggal_mulai' => $request->tanggal_mulai,
        'tanggal_selesai' => $request->tanggal_selesai,
        'nama_penjemput' => $request->nama_penjemput,
        'status_penjemput' => $request->status_penjemput,
        'status' => 'pending',
    ]);

    return redirect()->route('izin.index')->with('success', 'Pengajuan izin berhasil dikirim.');
}


    /**
     * Update status izin (hanya admin)
     */
    public function updateStatus($id, $status)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized');
        }

        $izin = Izin::findOrFail($id);
        $izin->status = $status;
        $izin->save();

        return redirect()->route('admin.izin.index')->with('success', "Izin berhasil $status.");
    }

    /**
     * Cetak izin (khusus orang tua untuk izin yang disetujui)
     */
    public function cetak($id)
    {
        $izin = Izin::where('id', $id)
            ->where('user_id', Auth::id())
            ->where('status', 'diterima')
            ->firstOrFail();

        return view('izin.cetak', compact('izin'));
    }
}
