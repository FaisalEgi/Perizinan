<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::user();

                // 🔹 Redirect sesuai role pengguna
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard'); // ⬅ ubah ke dashboard admin
                } elseif ($user->role === 'orangtua' || $user->role === 'user') {
                    return redirect()->route('user.dashboard');
                } else {
                    return redirect()->route('home');
                }
            }
        }

        return $next($request);
    }
}
