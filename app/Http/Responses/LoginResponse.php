<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        // Jika admin atau super admin, arahkan ke dashboard admin
        if ($user->roles === 'ADMIN' || $user->roles === 'SUPER_ADMIN') {
            return redirect()->route('admin.dashboard');
        }

        // Jika ada input redirect_to (misal dari login form), arahkan ke sana
        if ($request->has('redirect_to')) {
            return redirect()->intended($request->input('redirect_to'));
        }

        // Jika bukan admin/super admin dan tidak ada redirect_to, arahkan ke landing page
        return redirect()->route('front.index');
    }
}
