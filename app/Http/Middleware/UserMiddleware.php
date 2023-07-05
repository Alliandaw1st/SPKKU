<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Lakukan logika untuk memeriksa apakah pengguna adalah user atau bukan
        // Misalnya, Anda dapat memeriksa nilai is_admin pada model User
        if ($request->user()->is_admin) {
            // Jika admin, redirect atau kembalikan response yang diinginkan
            return redirect('/user')->with('error', 'Anda tidak memiliki akses sebagai decision maker.');
        }

        return $next($request);
    }
}
