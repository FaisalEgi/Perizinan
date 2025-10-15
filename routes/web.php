<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IzinController;
use Illuminate\Support\Facades\Route;

// Halaman awal: form login khusus perizinan santri
Route::get('/', function () {
    // Jika sudah login
    if (Auth::check()) {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (in_array($user->role, ['orangtua', 'user'])) {
            return redirect()->route('user.dashboard');
        }
    }

    // Jika belum login
    return redirect()->route('login');
})->name('home');

// Route Orang Tua
Route::middleware(['auth', 'role:orangtua'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
    Route::get('/izin', [IzinController::class, 'index'])->name('izin.index');
    Route::get('/izin/create', [IzinController::class, 'create'])->name('izin.create');
    Route::post('/izin', [IzinController::class, 'store'])->name('izin.store');
    Route::get('/izin/{id}/cetak', [IzinController::class, 'cetak'])->name('izin.cetak');
});

// Route Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // 🟩 Tambahkan ini — dashboard admin
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // 🟢 Route untuk kelola izin (sudah benar)
    Route::get('/admin/izin', [IzinController::class, 'adminIndex'])->name('admin.izin.index');
    Route::get('/admin/izin/{id}/terima', [IzinController::class, 'updateStatus'])
        ->defaults('status', 'diterima')
        ->name('admin.izin.terima');
   Route::post('/admin/izin/{id}/tolak', [IzinController::class, 'tolak'])
    ->name('admin.izin.tolak');

});

// Semua route yang butuh login (misal profile)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
