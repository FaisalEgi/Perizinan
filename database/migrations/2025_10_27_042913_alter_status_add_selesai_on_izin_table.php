<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends \Illuminate\Database\Migrations\Migration
{
    public function up(): void
    {
        // Tambah nilai 'selesai' ke enum kolom status
        DB::statement("ALTER TABLE `izin`
            MODIFY `status` ENUM('pending','diterima','ditolak','selesai')
            NOT NULL DEFAULT 'pending'");
    }

    public function down(): void
    {
        // Revert kalau perlu (hapus 'selesai')
        DB::statement("ALTER TABLE `izin`
            MODIFY `status` ENUM('pending','diterima','ditolak')
            NOT NULL DEFAULT 'pending'");
    }
};
