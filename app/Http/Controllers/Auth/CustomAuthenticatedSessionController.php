<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Requests\LoginRequest;

class CustomAuthenticatedSessionController extends Controller
{
    public function store(LoginRequest $request)
    {
        // Ambil user berdasarkan email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.']);
        }

        // Cek status_user
        if ($user->status_user !== User::STATUS_ACTIVE) {
            return back()->withErrors(['email' => 'Akun Anda non-aktif. Silakan hubungi admin.']);
        }

        // Jika aktif, maka autentikasi
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }
}
