<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RoleMiddleware
 *
 * Middleware ini digunakan untuk membatasi akses route berdasarkan role pengguna.
 *
 * Contoh penggunaan:
 * ```php
 * Route::get('/admin', [AdminController::class, 'index'])->middleware('role:admin');
 * ```
 * Middleware akan memeriksa apakah user yang sedang login memiliki role yang sesuai.
 * Jika tidak, akan mengembalikan HTTP 403 Unauthorized.
 */
class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Memeriksa role user yang sedang login. Jika role sesuai, request diteruskan
     * ke layer berikutnya. Jika tidak, request dibatalkan dengan status 403.
     *
     * @param  \Illuminate\Http\Request  $request  Objek request saat ini
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next  Closure berikutnya untuk meneruskan request
     * @param  string  $role  Role yang diperbolehkan mengakses route ini
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException Jika role user tidak sesuai atau belum login
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (Auth::check() && Auth::user()->role === $role) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
