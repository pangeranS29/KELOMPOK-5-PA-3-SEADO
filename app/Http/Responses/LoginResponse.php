<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        // Jika SUPER_ADMIN, arahkan ke halaman Data Pengguna
        if ($user->roles === 'SUPER_ADMIN') {
            return redirect()->route('admin.datauser.index');
        }

        // Jika ADMIN, arahkan ke dashboard admin
        if ($user->roles === 'ADMIN') {
            return redirect()->route('admin.dashboard');
        }

        // Jika ada input redirect_to, arahkan ke sana
        if ($request->has('redirect_to')) {
            return redirect()->intended($request->input('redirect_to'));
        }

        // Default: pengguna biasa diarahkan ke landing page
        return redirect()->route('front.index');
    }
}
