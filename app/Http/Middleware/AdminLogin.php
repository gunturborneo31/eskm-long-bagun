<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/** Halaman admin hanya bisa dibuka setelah login lewat /login. */
class AdminLogin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->get('admin_login')) {
            return redirect()->guest('/login');
        }

        return $next($request);
    }
}
