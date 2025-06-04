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
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // If user is authenticated and has admin role
        if ($user && $this->isAdmin($user)) {
            // Check if the request is for an admin route to prevent redirect loops
            if (!$this->isAdminRoute($request)) {
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }

    /**
     * Check if user has admin role
     */
    protected function isAdmin(User $user): bool
    {
        return in_array($user->roles, [User::ROLE_ADMIN, User::ROLE_SUPER_ADMIN]);
    }

    /**
     * Check if the request is for an admin route
     */
    protected function isAdminRoute(Request $request): bool
    {
        $path = $request->path();
        return str_starts_with($path, 'admin') ||
               $request->routeIs('admin.*') ||
               in_array($path, ['admin', 'admin/login']);
    }
}
