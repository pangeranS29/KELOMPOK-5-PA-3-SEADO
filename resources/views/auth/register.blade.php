<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Nama Lengkap') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                    autofocus autocomplete="name" pattern="[A-Za-z\s]+" title="Hanya huruf dan spasi diperbolehkan" />
                <p id="nameError" class="mt-1 text-sm text-red-600 hidden">Nama lengkap hanya boleh mengandung huruf dan
                    spasi</p>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
                <p id="emailError" class="mt-1 text-sm text-red-600 hidden">Harus menggunakan email Google yang valid
                    (contoh: @gmail.com) yang sudah terdaftar</p>
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <x-label for="phone" value="{{ __('No Telepon') }}" />
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                    required autocomplete="tel" maxlength="12" />
                <p id="phoneError" class="mt-1 text-sm text-red-600 hidden">Nomor telepon harus berupa angka dan
                    maksimal 12 digit</p>
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4 relative">
                <x-label for="password" value="{{ __('Kata Sandi') }}" />
                <div class="relative">
                    <x-input id="password" class="block mt-1 w-full pl-10 pr-10" type="password" name="password"
                        required autocomplete="new-password" />
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <button type="button"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none"
                        onclick="togglePassword('password')">
                        <i id="password-eye" class="fas fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4 relative">
                <x-label for="password_confirmation" value="{{ __('Konfirmasi Kata Sandi') }}" />
                <div class="relative">
                    <x-input id="password_confirmation" class="block mt-1 w-full pl-10 pr-10" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <button type="button"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 focus:outline-none"
                        onclick="togglePassword('password_confirmation')">
                        <i id="password_confirmation-eye" class="fas fa-eye"></i>
                    </button>
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' =>
                                        '<a target="_blank" href="' .
                                        route('terms.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Terms of Service') .
                                        '</a>',
                                    'privacy_policy' =>
                                        '<a target="_blank" href="' .
                                        route('policy.show') .
                                        '" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">' .
                                        __('Privacy Policy') .
                                        '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    {{ __('Sudah Punya Akun?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Daftar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>

    <script>

         // Toggle password visibility
            function togglePassword(fieldId) {
                const passwordInput = document.getElementById(fieldId);
                const eyeIcon = document.getElementById(`${fieldId}-eye`);

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeIcon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    eyeIcon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            }

        document.addEventListener('DOMContentLoaded', function() {
            // Element references
            const nameInput = document.getElementById('name');
            const nameError = document.getElementById('nameError');
            const emailInput = document.getElementById('email');
            const emailError = document.getElementById('emailError');
            const phoneInput = document.getElementById('phone');
            const phoneError = document.getElementById('phoneError');
            const passwordInput = document.getElementById('password');
            const passwordConfirmationInput = document.getElementById('password_confirmation');
            const registerForm = document.querySelector('form[method="POST"]');

            // Validation functions
            function validateName(name) {
                return /^[A-Za-z\s]+$/.test(name);
            }

            function validateGoogleEmail(email) {
                if (!email.includes('@')) return false;
                const googleDomains = ['gmail.com', 'googlemail.com'];
                const domain = email.split('@')[1];
                return googleDomains.includes(domain);
            }

            function validatePhoneNumber(phone) {
                return /^\d{1,12}$/.test(phone);
            }

            function validatePassword(password) {
                return password.length >= 8;
            }

            function validatePasswordConfirmation(password, confirmation) {
                return password === confirmation;
            }

            // Event handlers
            function handleNameInput() {
                const name = this.value.trim();

                // Clean invalid characters immediately
                this.value = this.value.replace(/[^A-Za-z\s]/g, '');

                if (name === '') {
                    nameError.classList.add('hidden');
                    return;
                }

                if (!validateName(name)) {
                    nameError.classList.remove('hidden');
                } else {
                    nameError.classList.add('hidden');
                }
            }

            function handleEmailInput() {
                const email = this.value.trim();

                if (email === '') {
                    emailError.classList.add('hidden');
                    return;
                }

                if (!validateGoogleEmail(email)) {
                    emailError.classList.remove('hidden');
                } else {
                    emailError.classList.add('hidden');
                }
            }

            function handlePhoneInput() {
                // Only allow numbers
                this.value = this.value.replace(/\D/g, '');

                // Limit to 12 digits
                if (this.value.length > 12) {
                    this.value = this.value.substring(0, 12);
                }

                const phone = this.value.trim();

                if (phone === '') {
                    phoneError.classList.add('hidden');
                    return;
                }

                if (!validatePhoneNumber(phone)) {
                    phoneError.classList.remove('hidden');
                } else {
                    phoneError.classList.add('hidden');
                }
            }

            function addShakeAnimation(element) {
                element.classList.add('animate-shake');
                setTimeout(() => {
                    element.classList.remove('animate-shake');
                }, 500);
            }

            function handleFormSubmit(e) {
                let hasError = false;
                const name = nameInput.value.trim();
                const email = emailInput.value.trim();
                const phone = phoneInput.value.trim();
                const password = passwordInput.value;
                const passwordConfirmation = passwordConfirmationInput.value;

                // Validate name
                if (!validateName(name)) {
                    e.preventDefault();
                    nameError.classList.remove('hidden');
                    if (!hasError) {
                        nameInput.focus();
                        addShakeAnimation(nameInput);
                        hasError = true;
                    }
                }

                // Validate email
                if (!validateGoogleEmail(email)) {
                    e.preventDefault();
                    emailError.classList.remove('hidden');
                    if (!hasError) {
                        emailInput.focus();
                        addShakeAnimation(emailInput);
                        hasError = true;
                    }
                }

                // Validate phone
                if (!validatePhoneNumber(phone)) {
                    e.preventDefault();
                    phoneError.classList.remove('hidden');
                    if (!hasError) {
                        phoneInput.focus();
                        addShakeAnimation(phoneInput);
                        hasError = true;
                    }
                }

                // Validate password
                if (!validatePassword(password)) {
                    e.preventDefault();
                    if (!hasError) {
                        passwordInput.focus();
                        addShakeAnimation(passwordInput);
                        hasError = true;
                    }
                }

                // Validate password confirmation
                if (!validatePasswordConfirmation(password, passwordConfirmation)) {
                    e.preventDefault();
                    if (!hasError) {
                        passwordConfirmationInput.focus();
                        addShakeAnimation(passwordConfirmationInput);
                        hasError = true;
                    }
                }
            }

            // Event listeners
            nameInput.addEventListener('input', handleNameInput);
            emailInput.addEventListener('input', handleEmailInput);
            phoneInput.addEventListener('input', handlePhoneInput);

            nameInput.addEventListener('blur', handleNameInput);
            emailInput.addEventListener('blur', handleEmailInput);
            phoneInput.addEventListener('blur', handlePhoneInput);

            registerForm.addEventListener('submit', handleFormSubmit);
        });
    </script>

    <style>
        /* Animasi shake untuk input error */
        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            20%,
            60% {
                transform: translateX(-5px);
            }

            40%,
            80% {
                transform: translateX(5px);
            }
        }

        .animate-shake {
            animation: shake 0.5s cubic-bezier(.36, .07, .19, .97) both;
            border-color: #f87171;
            /* Warna merah untuk border */
        }
    </style>
</x-guest-layout>
