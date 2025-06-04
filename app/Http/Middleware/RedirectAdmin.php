<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika ada session role admin/super_admin, redirect ke dashboard admin
        if (session('user_role') && in_array(session('user_role'), ['ADMIN', 'SUPER_ADMIN'])) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
