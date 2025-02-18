<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = Auth::user();

        if ($user) {
            $idLevel = $user->id_level; // Misalnya `id_level` adalah kolom yang menyimpan level pengguna

            // Mengatur aturan berdasarkan role
            switch ($idLevel) {
                case 1:
                    // Role 1 dapat mengakses semua
                    return $next($request);
                case 2:
                    // Role 2 hanya bisa mengakses kasir dan waiter
                    if (in_array($request->route()->getName(), ['kasir', 'waiter'])) {
                        return $next($request);
                    }
                    return redirect()->route('dashboard'); // Gagal akses, kembali ke dashboard
                case 3:
                    // Role 3 hanya bisa mengakses kasir
                    if ($request->route()->getName() == 'kasir') {
                        return $next($request);
                    }
                    return redirect()->route('dashboard'); // Gagal akses, kembali ke dashboard
                case 5:
                    // Role 5 hanya bisa mengakses order
                    if (in_array($request->route()->getName(), ['dashboard', 'kasir'])) {
                        return $next($request);
                    }
                    return redirect()->route('dashboard'); // Gagal akses, kembali ke dashboard
                default:
                    return $next($request); // Role lainnya (misalnya role 4), bisa akses halaman apapun
            }
        }

        // Jika pengguna tidak ada (belum login), redirect ke login
        return redirect()->route('login');

    }
}
