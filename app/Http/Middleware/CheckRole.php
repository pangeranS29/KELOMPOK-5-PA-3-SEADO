<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        if (!$user || !in_array($user->roles, $roles)) {
            abort(403, 'Tindakan Tidak Di Izinkan .');
        }

        return $next($request);
    }
}
