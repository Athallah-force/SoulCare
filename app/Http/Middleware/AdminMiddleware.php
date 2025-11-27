<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check() || Auth::user()->tipe_pengguna !== 'Admin') {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
