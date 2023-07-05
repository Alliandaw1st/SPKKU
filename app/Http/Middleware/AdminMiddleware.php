<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Lakukan logika untuk memeriksa apakah pengguna adalah admin atau bukan
        // Misalnya, Anda dapat memeriksa nilai is_admin pada model User
        if (!$request->user()->is_admin) {
            // Jika bukan admin, redirect atau kembalikan response yang diinginkan
            return redirect('/alternatif')->with('error', 'Anda tidak memiliki akses sebagai operator.');
        }

        return $next($request);
    }
}
