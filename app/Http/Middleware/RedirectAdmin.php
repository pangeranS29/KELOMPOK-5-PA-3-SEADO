<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class RedirectAdmin
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && $this->isAdminOrSuperAdmin($user)) {
            if (!$this->isAdminRoute($request)) {
                // Redirect berdasarkan role
                return $this->redirectBasedOnRole($user);
            }
        }

        return $next($request);
    }

    /**
     * Cek apakah user ADMIN atau SUPER_ADMIN.
     */
    protected function isAdminOrSuperAdmin(User $user): bool
    {
        return in_array($user->roles, [User::ROLE_ADMIN, User::ROLE_SUPER_ADMIN]);
    }

    /**
     * Cek apakah request saat ini mengarah ke route admin.
     */
    protected function isAdminRoute(Request $request): bool
    {
        return $request->routeIs('admin.*') || str_starts_with($request->path(), 'admin');
    }

    /**
     * Redirect sesuai role user.
     */
    protected function redirectBasedOnRole(User $user): Response
    {
        if ($user->roles === User::ROLE_SUPER_ADMIN) {
            return redirect()->route('admin.datauser.index');
        }

        return redirect()->route('admin.dashboard');
    }
}
