<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Izin extends Model
{
    use HasFactory;

    protected $table = 'izin'; // nama tabel sesuai migration

    protected $fillable = [
    'user_id',
    'nama_santri',
    'kelas',
    'alamat_tujuan',
    'alasan',
    'tanggal_mulai',
    'tanggal_selesai',
    'nama_penjemput',       
    'status_penjemput',
    'status',
    'alasan_penolakan'
];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
