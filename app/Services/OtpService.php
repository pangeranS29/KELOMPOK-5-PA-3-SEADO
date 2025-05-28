<?php

namespace App\Services;

use App\Models\OtpVerification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpVerificationMail;

class OtpService
{
    public function generateOtp($email)
    {
        // Delete any existing OTP for this email
        OtpVerification::where('email', $email)->delete();

        // Generate a 6-digit OTP
        $otp = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

        // Store OTP in database
        OtpVerification::create([
            'email' => $email,
            'otp' => $otp,
            'expires_at' => Carbon::now()->addMinutes(15)
        ]);

        // Send OTP via email
        Mail::to($email)->send(new OtpVerificationMail($otp));

        return $otp;
    }

    public function verifyOtp($email, $otp)
    {
        $otpRecord = OtpVerification::where('email', $email)
            ->where('otp', $otp)
            ->first();

        if (!$otpRecord) {
            return false;
        }

        if (Carbon::now()->gt($otpRecord->expires_at)) {
            return false;
        }

        // Delete the OTP after verification
        $otpRecord->delete();

        return true;
    }
}
