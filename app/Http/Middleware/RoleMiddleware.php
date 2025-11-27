<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle($request, Closure $next, ...$roles)
    {
        // Jika belum login, redirect ke login
        if (!Auth::check()) {
            return redirect('/login');
        }

        $user = Auth::user();

        // Jika role user TIDAK ADA di daftar roles → tolak
        if (!in_array($user->tipe_pengguna, $roles)) {
            return abort(403, 'Anda tidak punya akses ke halaman ini.');
        }

        return $next($request);
    }
}
