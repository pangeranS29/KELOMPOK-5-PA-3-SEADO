<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtpVerificationController extends Controller
{
    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function showVerificationForm(Request $request)
    {
        if (!$request->session()->has('register_data')) {
            return redirect()->route('register');
        }

        return view('auth.verify-otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6'
        ]);

        $registerData = $request->session()->get('register_data');
        $email = $registerData['email'];

        if ($this->otpService->verifyOtp($email, $request->otp)) {
            // Create user
            $user = User::create([
                'name' => $registerData['name'],
                'email' => $email,
                'phone' => $registerData['phone'],
                'password' => $registerData['password'],
                'email_verified_at' => now(),
            ]);

            // Clear session
            $request->session()->forget('register_data');

            // Log in the user
            Auth::login($user);

            return redirect()->route('front.index');
        }

        return back()->withErrors(['otp' => 'Kode OTP tidak valid atau sudah kadaluarsa']);
    }

    public function resendOtp(Request $request)
    {
        $registerData = $request->session()->get('register_data');
        $email = $registerData['email'];

        $this->otpService->generateOtp($email);

        return back()->with('status', 'Kode OTP baru telah dikirim ke email Anda');
    }
}
