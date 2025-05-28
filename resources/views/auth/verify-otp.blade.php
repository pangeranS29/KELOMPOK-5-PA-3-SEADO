<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Kami telah mengirimkan kode OTP ke email Anda. Silakan masukkan kode tersebut di bawah ini.
        </div>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('otp.verify') }}">
            @csrf

            <div>
                <x-label for="otp" value="{{ __('Kode OTP') }}" />
                <x-input id="otp" class="block mt-1 w-full" type="text" name="otp" required autofocus autocomplete="one-time-code" maxlength="6" />
            </div>

            <div class="flex items-center justify-between mt-4">
                <button type="button" onclick="event.preventDefault(); document.getElementById('resend-form').submit();" class="text-sm text-gray-600 hover:text-gray-900">
                    Kirim Ulang OTP
                </button>

                <x-button>
                    {{ __('Verifikasi') }}
                </x-button>
            </div>
        </form>

        <form id="resend-form" method="POST" action="{{ route('otp.resend') }}">
            @csrf
        </form>
    </x-authentication-card>
</x-guest-layout>
