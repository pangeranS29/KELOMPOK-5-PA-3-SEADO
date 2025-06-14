<x-guest-layout>
    <div class="w-full max-w-md bg-gray-900 bg-opacity-80 backdrop-blur-sm rounded-xl p-8 border border-gray-800 shadow-2xl">
        <div class="text-center mb-2">
            <i class="fas fa-user-circle text-5xl text-yellow-500 mb-4"></i>
        </div>

        <h2 class="text-3xl font-bold text-center mb-6 text-yellow-400">Login</h2>

        {{-- Pesan sukses --}}
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-500">
                {{ session('status') }}
            </div>
        @endif

        {{-- Pesan error umum --}}
        @if (session('error'))
            <div id="inactive-message" class="mb-4 font-medium text-sm text-red-500">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf

            <input type="hidden" name="redirect_to" value="{{ request('redirect_to') }}">

            {{-- Email --}}
            <div class="mb-5">
                <label for="email" class="block text-gray-400 mb-2">Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-500"></i>
                    </span>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus
                        class="w-full pl-10 p-3 bg-gray-800 text-white rounded-lg border border-gray-700 focus:outline-none focus:border-yellow-500 transition duration-300 @error('email') border-red-500 @enderror">
                </div>
                @error('email')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-6">
                <label for="password" class="block text-gray-400 mb-2">Kata Sandi</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-500"></i>
                    </span>
                    <input id="password" name="password" type="password" required
                        class="w-full pl-10 pr-10 p-3 bg-gray-800 text-white rounded-lg border border-gray-700 focus:outline-none focus:border-yellow-500 transition duration-300 @error('password') border-red-500 @enderror">
                    <button type="button" class="absolute inset-y-0 right-0 pr-3 flex items-center focus:outline-none"
                        onclick="togglePassword()">
                        <i id="eye-icon" class="fas fa-eye text-gray-500 hover:text-yellow-500 cursor-pointer"></i>
                    </button>
                </div>
                @error('password')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                @enderror
            </div>

            {{-- Lupa Password --}}
            <div class="flex items-center justify-end mb-6">
                @if (Route::has('password.request'))
                    <a class="text-sm text-yellow-500 hover:text-yellow-400 hover:underline"
                        href="{{ route('password.request') }}">
                        Lupa Kata Sandi?
                    </a>
                @endif
            </div>

            {{-- Tombol Masuk --}}
            <button type="submit"
                class="w-full p-3 bg-gradient-to-r from-yellow-500 to-yellow-600 text-black font-bold rounded-lg hover:from-yellow-600 hover:to-yellow-700 transition duration-300 shadow-lg hover:shadow-yellow-500/20">
                Masuk
            </button>
        </form>

        {{-- Link Register --}}
        <div class="mt-8 text-center text-gray-400">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-yellow-500 hover:text-yellow-400 hover:underline">
                Daftar Sekarang
            </a>
        </div>
    </div>
</x-guest-layout>

{{-- Script JS --}}
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }

    // SweetAlert jika akun non-aktif
    document.addEventListener('DOMContentLoaded', function () {
        const inactiveMessage = document.getElementById('inactive-message');
        if (inactiveMessage && inactiveMessage.textContent.toLowerCase().includes('dinonaktifkan')) {
            Swal.fire({
                icon: 'error',
                title: 'Akun Dinonaktifkan',
                text: 'Akun Anda telah dinonaktifkan. Silahkan hubungi administrator via WhatsApp: 085763189029.',
                confirmButtonColor: '#f59e0b',
                confirmButtonText: 'Mengerti'
            });
        }
    });
</script>
