<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah user sudah login dan apakah role-nya sesuai
        if (!Auth::check()) {
            // Jika user tidak login, kembalikan error 403
            abort(403, 'Unauthorized');
        }

        $userRole = Auth::user()->role;

        // Cek apakah role user sesuai dengan yang diinginkan
        if ($userRole !== $role) {
            // Jika role tidak sesuai, kembalikan error 403
            abort(403, 'Unauthorized - Role tidak sesuai');
        }

        return $next($request);
    }
}
