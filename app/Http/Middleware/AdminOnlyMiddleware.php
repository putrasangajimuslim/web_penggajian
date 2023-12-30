<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnlyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('karyawan')->check()) {
            // Periksa apakah pengguna adalah admin
            if (Auth::guard('karyawan')->user()->role == 'admin') {
                return $next($request);
            }
        }

        // Jika pengguna bukan admin atau tidak login, tampilkan 404
        abort(404);
    }
}
