<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Tampilkan halaman login custom.
     */
    public function create(): View
    {
        return view('auth.login_custom');
    }

    /**
     * Proses login user.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Ambil data login
        $credentials = $request->only('email', 'password');

        // Gunakan remember me = true agar user tidak logout saat close browser
        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Redirect sesuai role user
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif (in_array($user->role, ['orangtua', 'user'])) {
                return redirect()->route('user.dashboard');
            }

            Auth::logout();
            return redirect('/')
                ->with('error', 'Role pengguna tidak dikenali. Hubungi administrator.');
        }

        // Jika login gagal
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    /**
     * Logout dan hapus sesi user.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        // ❗ Jangan hapus seluruh session kecuali token keamanan
        // agar remember me tetap aktif
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
