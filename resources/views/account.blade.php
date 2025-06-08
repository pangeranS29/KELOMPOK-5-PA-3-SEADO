<x-front-layout>
    <main class="flex flex-col md:flex-row justify-center items-start md:space-x-10 min-h-screen"
        style="background-color: #000000;">
        <div class="w-full max-w-6xl flex flex-col md:flex-row space-y-6 md:space-y-0 md:space-x-8 py-6">
            <!-- Sidebar -->
            <aside
                class="bg-gray-800 p-4 md:p-6 rounded-lg w-full md:w-64 flex-shrink-0 max-h-screen overflow-y-auto sticky top-0">
                <div class="text-center mb-4 md:mb-6">
                    <p class="font-bold text-sm md:text-base text-white">{{ Auth::user()->name }}</p>
                    <p class="text-xs md:text-base text-white">{{ Auth::user()->email }}</p>
                </div>
                <nav class="space-y-2 md:space-y-4">
                    <a href="{{ url('/account?tab=profile') }}"
                        class="flex items-center space-x-2 p-2 md:p-3 rounded-lg text-sm md:text-base {{ ($activeTab ?? '') === 'profile' ? 'bg-gray-600 text-white' : 'bg-gray-700 hover:bg-gray-600 text-white' }}">
                        <i class="fas fa-user"></i><span>Akun</span>
                    </a>
                    <a href="{{ url('/account?tab=transaction') }}"
                        class="flex items-center space-x-2 p-2 md:p-3 rounded-lg text-sm md:text-base {{ ($activeTab ?? '') === 'transaction' ? 'bg-gray-600 text-white' : 'bg-gray-700 hover:bg-gray-600 text-white' }}">
                        <i class="fas fa-box"></i><span>Pesanan Saya</span>
                    </a>
                    <a href="{{ url('/account?tab=reset-password') }}"
                        class="flex items-center space-x-2 p-2 md:p-3 rounded-lg text-sm md:text-base {{ ($activeTab ?? '') === 'reset-password' ? 'bg-gray-600 text-white' : 'bg-gray-700 hover:bg-gray-600 text-white' }}">
                        <i class="fas fa-key"></i><span>Ubah Kata Sandi</span>
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center space-x-2 p-2 md:p-3 rounded-lg bg-gray-700 hover:bg-gray-600 text-sm md:text-base text-white w-full text-left">
                            <i class="fas fa-power-off"></i><span>Keluar</span>
                        </button>
                    </form>
                </nav>
            </aside>

            <!-- Main Content Section -->
            <section class="bg-gray-800 p-4 md:p-6 rounded-lg w-full space-y-4 md:space-y-6">
                @if (($activeTab ?? '') === 'transaction')
                    <h2 class="text-white text-xl font-semibold">Pesanan Saya</h2>
                    <div class="space-y-4 md:space-y-6">
                        <!-- Table Header -->
                        <center>
                            <div
                                class="bg-gray-700 p-3 md:p-4 rounded-lg grid grid-cols-1 md:grid-cols-12 gap-x-4 gap-y-2">
                                <div class="col-span-4">
                                    <span class="font-semibold text-white">Paket & Waktu</span>
                                </div>
                                <div class="col-span-2">
                                    <span class="font-semibold text-white">ID Pesanan</span>
                                </div>
                                <div class="col-span-3">
                                    <span class="font-semibold text-white">Status Pembayaran</span>
                                </div>
                                <div class="col-span-3">
                                    <span class="font-semibold text-white">Aksi</span>
                                </div>
                            </div>
                        </center>>

                        @forelse ($bookings as $booking)
                            <div
                                class="bg-gray-700 p-3 md:p-4 rounded-lg grid grid-cols-1 md:grid-cols-12 gap-x-4 gap-y-2">
                                <!-- Package Info -->
                                <div class="md:col-span-4 flex items-center space-x-3 md:space-x-4">
                                    <img alt="Paket Image" class="h-8 md:h-12 rounded-full" height="50"
                                        src="{{ $booking->detail_paket->thumbnail ?? asset('images/default.jpg') }}"
                                        width="50" />
                                    <div>
                                        <p class="font-semibold text-sm md:text-base text-white">
                                            {{ $booking->detail_paket->pilihpaket->nama_paket ?? 'Nama Paket Tidak Tersedia' }}
                                        </p>
                                        <p class="text-sm md:text-base  text-white">
                                            {{ Carbon\Carbon::parse($booking->waktu_mulai)->translatedFormat('d F Y, H:i') }}
                                            -
                                            {{ Carbon\Carbon::parse($booking->waktu_selesai)->translatedFormat('d F Y, H:i') }}
                                        </p>
                                    </div>
                                </div>


                                <!-- Order ID -->
                                <div
                                    class="md:col-span-2 text-xs md:text-base text-white flex items-center justify-center text-center">
                                    <p class="md:hidden font-semibold">ID Pesanan</p>
                                    <p class="font-semibold truncate">{{ $booking->id }}</p>
                                </div>


                                <!-- Payment Status -->
                                <div class="md:col-span-3 flex items-center justify-center">
                                    @if ($booking->status_pembayaran === 'pending' && $booking->metode_pembayaran && empty($booking->bukti_pembayaran))
                                        <a href="{{ route('front.payment.show', $booking->id) }}"
                                            class="bg-blue-500 text-white py-1 px-3 rounded-lg text-xs text-center">
                                            Lanjutkan Pembayaran
                                        </a>
                                    @elseif ($booking->status_pembayaran === 'pending')
                                        <a href="{{ route('front.payment', $booking->id) }}"
                                            class="bg-blue-500 text-white py-1 px-3 rounded-lg text-sm text-center">
                                            Bayar Sekarang
                                        </a>
                                    @elseif ($booking->status_pembayaran === 'menunggu_konfirmasi')
                                        <span class="bg-yellow-500 text-white py-1 px-3 rounded-lg text-sm text-center">
                                            Menunggu Konfirmasi
                                        </span>
                                    @elseif ($booking->status_pembayaran === 'canceled')
                                        <span
                                            class="bg-red-500 text-white py-1 px-3 rounded-lg text-sm text-center inline-block min-w-[180px] ">
                                            Dibatalkan
                                        </span>
                                    @elseif ($booking->status_pembayaran === 'expired')
                                        <span class="bg-red-500 text-white py-1 px-3 rounded-lg text-sm text-center">
                                            Kadaluarsa
                                        </span>
                                    @elseif ($booking->status_pembayaran === 'success')
                                        <span
                                            class="bg-green-500 text-white py-1 px-3 rounded-lg text-sm text-center inline-block min-w-[180px]">
                                            Lunas
                                        </span>
                                    @elseif ($booking->status_pembayaran === 'rejected')
                                        <a href="{{ route('front.payment', $booking->id) }}"
                                            class="bg-blue-500 text-white py-1 px-3 rounded-lg text-sm text-center">
                                            Bayar Kembali
                                        </a>
                                    @elseif ($booking->status_pembayaran === 'meminta_refund')
                                        <span class="bg-yellow-500 text-white py-1 px-3 rounded-lg text-sm text-center">
                                            Permintaan Refund
                                        </span>
                                    @elseif ($booking->status_pembayaran === 'refunded')
                                        <span
                                            class="bg-green-500 text-white py-1 px-3 rounded-lg text-sm text-center inline-block min-w-[180px]">
                                            Refund
                                        </span>
                                    @endif
                                </div>

                                <!-- Action Buttons -->
                                <div class="md:col-span-3 flex flex-col items-center space-y-2 justify-center">
                                    @if ($booking->status_pembayaran === 'success' && now()->lte($booking->waktu_selesai))
                                        <a href="{{ route('front.cetak.resi', $booking->id) }}"
                                            class="bg-yellow-500 text-white py-1 px-3 rounded-lg text-xs whitespace-nowrap w-full text-center"
                                            target="_blank">
                                            Cetak Resi
                                        </a>
                                        <button onclick="showRefundModal('{{ $booking->id }}')"
                                            class="bg-red-500 text-white py-1 px-3 rounded-lg text-xs whitespace-nowrap w-full">
                                            Minta Refund
                                        </button>
                                    @elseif ($booking->status_pembayaran === 'refunded')
                                        <a href="{{ asset('storage/' . $booking->refund_proof) }}" target="_blank"
                                            class="bg-blue-500 text-white py-1 px-3 rounded-lg text-sm whitespace-nowrap w-full text-center">
                                            Bukti Refund
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @empty
                            <p class="text-white">Belum ada transaksi.</p>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="mt-6">
                        {{ $bookings->appends(request()->query())->links() }}
                    </div>

                    <!-- Refund Modal -->
                    <div id="refundModal"
                        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                        <div class="bg-gray-800 rounded-lg p-6 w-full max-w-md">
                            <h3 class="text-white text-xl font-semibold mb-4">Permintaan Refund</h3>
                            <form id="refundForm" method="POST">
                                @csrf
                                <input type="hidden" name="booking_id" id="booking_id">
                                <div class="mb-4">
                                    <label class="block text-white text-sm mb-2">Silakan konfirmasi refund dengan
                                        admin:</label>
                                    <div class="bg-gray-700 p-3 rounded text-white text-sm mb-3">
                                        <p>1. Permintaan refund akan diproses dalam 1x24 jam</p>
                                        <p>2. Dana akan dikembalikan ke rekening asal</p>
                                        <p>3. Hubungi admin jika ada pertanyaan</p>
                                    </div>
                                    <label for="refund_reason" class="block text-white text-sm mb-2">Alasan Refund
                                        (wajib diisi)</label>
                                    <textarea name="refund_reason" id="refund_reason" rows="3"
                                        class="w-full p-2 rounded bg-gray-700 border border-gray-600 text-white"
                                        placeholder="Mohon jelaskan alasan refund Anda" required></textarea>
                                </div>
                                <div class="flex justify-end space-x-3">
                                    <button type="button" onclick="hideRefundModal()"
                                        class="px-4 py-2 bg-gray-600 text-white rounded">Batal</button>
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded">Kirim
                                        Permintaan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @elseif (($activeTab ?? '') === 'reset-password')
                    <h2 class="text-white text-xl font-semibold">Ubah Kata Sandi</h2>
                    <!-- Form reset password -->
                    <form action="{{ route('front.account.reset-password') }}" method="POST" id="resetPasswordForm"
                        class="space-y-4 mt-4">
                        @csrf
                        <div>
                            <label class="block mb-1 text-sm text-white" for="current_password">Kata Sandi Saat
                                Ini</label>
                            <input class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-sm text-white"
                                id="current_password" type="password" name="current_password" required />
                        </div>

                        <div>
                            <label class="block mb-1 text-sm text-white" for="new_password">Kata Sandi Baru</label>
                            <input class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-sm text-white"
                                id="new_password" type="password" name="new_password" required />
                        </div>

                        <div>
                            <label class="block mb-1 text-sm text-white" for="new_password_confirmation">Konfirmasi
                                Kata Sandi Baru</label>
                            <input class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-sm text-white"
                                id="new_password_confirmation" type="password" name="new_password_confirmation"
                                required />
                        </div>

                        <button type="submit" onclick="confirmResetPassword()"
                            class="mt-3 p-2 bg-yellow-500 text-black rounded text-sm">
                            Ubah Kata Sandi
                        </button>


                    </form>
                @elseif (($activeTab ?? '') === 'profile')
                    <h2 class="text-white text-xl font-semibold">Detail Akun</h2>
                    <section class="bg-gray-700 p-4 md:p-8 rounded-lg w-full space-y-4 md:space-y-6">

                        <!-- Edit Profile Form -->
                        <form action="{{ route('front.account.update') }}" method="POST" id="profileForm"
                            class="space-y-3 md:space-y-4">
                            @csrf
                            @method('PUT')

                            <div>
                                <label class="block mb-1 text-sm text-white" for="name">Name</label>
                                <input id="name" name="name" type="text"
                                    class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-sm text-white"
                                    value="{{ Auth::user()->name }}">
                                <p id="nameError" class="text-red-400 text-xs mt-1 hidden">Nama hanya boleh berisi
                                    huruf dan spasi.</p>
                            </div>

                            <div>
                                <label class="block mb-1 text-sm text-white" for="email">E-mail</label>
                                <input class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-sm text-white"
                                    id="email" type="email" name="email"
                                    value="{{ Auth::user()->email }}" />
                            </div>

                            <div>
                                <label class="block mb-1 text-sm text-white" for="phone">Nomor Telepon</label>
                                <input id="phone" name="phone" type="tel"
                                    class="w-full p-2 rounded bg-gray-800 border border-gray-600 text-sm text-white"
                                    value="{{ Auth::user()->phone }}">
                                <p id="phoneError" class="text-red-400 text-xs mt-1 hidden">Hanya angka yang
                                    diperbolehkan.</p>
                            </div>

                            <button type="button" onclick="confirmUpdateProfile()"
                                class="mt-3 md:mt-4 p-2 bg-yellow-500 text-black rounded text-sm md:text-base">
                                Ubah Akun
                            </button>
                        </form>
                    </section>
                @else
                    <a href="{{ route('index') }}"
                        class="inline-block mx-auto bg-yellow-500 text-black py-2 px-6 rounded-lg text-sm md:text-base hover:bg-yellow-400 transition">
                        Pesan Paket Jetski
                    </a>
                @endif
            </section>
        </div>
    </main>

    <script>
        // Fungsi validasi input name
        function handleNameInput() {
            const nameInput = document.getElementById('name');
            const nameError = document.getElementById('nameError');
            let value = nameInput.value;

            const cleanedValue = value.replace(/[^A-Za-z\s]/g, '');
            if (value !== cleanedValue) {
                nameInput.value = cleanedValue;
            }

            if (cleanedValue.trim() === '') {
                nameError.classList.remove('hidden');
            } else {
                nameError.classList.add('hidden');
            }
        }

        // Fungsi validasi input phone
        function handlePhoneInput() {
            const phoneInput = document.getElementById('phone');
            const phoneError = document.getElementById('phoneError');
            let value = phoneInput.value;

            const cleanedValue = value.replace(/\D/g, '');
            if (value !== cleanedValue) {
                phoneInput.value = cleanedValue;
            }

            if (cleanedValue.trim() === '') {
                phoneError.classList.remove('hidden');
            } else {
                phoneError.classList.add('hidden');
            }
        }

        // Panggil fungsi saat DOM selesai dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const nameInput = document.getElementById('name');
            const phoneInput = document.getElementById('phone');

            if (nameInput) {
                nameInput.addEventListener('input', handleNameInput);
                nameInput.addEventListener('blur', handleNameInput);
                handleNameInput(); // Jalankan sekali saat halaman dimuat
            }

            if (phoneInput) {
                phoneInput.addEventListener('input', handlePhoneInput);
                phoneInput.addEventListener('blur', handlePhoneInput);
                handlePhoneInput(); // Jalankan sekali saat halaman dimuat
            }
        });


        function showRefundModal(bookingId) {
            document.getElementById('booking_id').value = bookingId;
            document.getElementById('refundForm').action = `/account/request-refund/${bookingId}`;
            document.getElementById('refundModal').classList.remove('hidden');
        }

        function hideRefundModal() {
            document.getElementById('refundModal').classList.add('hidden');
        }

        document.getElementById('refundForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const bookingId = document.getElementById('booking_id').value;
            const reason = document.getElementById('refund_reason').value;
            const adminPhone = '{{ env('ADMIN_PHONE') }}';

            // Template pesan WhatsApp untuk admin
            const whatsappMessage = `*PERMINTAAN REFUND BARU*\n\n` +
                `ID Booking: ${bookingId}\n` +
                `Pelanggan: {{ Auth::user()->name }}\n` +
                `Email: {{ Auth::user()->email }}\n` +
                `No. HP: {{ Auth::user()->phone }}\n\n` +
                `*Alasan Refund:*\n${reason}\n\n` +
                `*Tindakan:*\n` +
                `1. Verifikasi transaksi\n` +
                `2. Proses refund ke rekening asal\n` +
                `3. Konfirmasi ke pelanggan\n\n` +
                `*Catatan:*\n` +
                `- Batas waktu proses 1x24 jam\n` +
                `- Jika ada pertanyaan, hubungi pelanggan`;

            const encodedMessage = encodeURIComponent(whatsappMessage);

            fetch(this.action, {
                    method: 'POST',
                    body: new FormData(this),
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    hideRefundModal();
                    if (data.success) {
                        Swal.fire({
                            title: 'Permintaan Terkirim!',
                            html: `Permintaan refund berhasil dikirim.<br><br>
                   <b>Silakan lanjutkan konfirmasi via WhatsApp:</b>`,
                            icon: 'success',
                            showCancelButton: true,
                            confirmButtonColor: '#25D366',
                            confirmButtonText: 'Buka WhatsApp',
                            cancelButtonText: 'Tutup'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.open(`https://wa.me/${adminPhone}?text=${encodedMessage}`,
                                    '_blank');
                            }
                            window.location.reload();
                        });
                    } else {
                        Swal.fire('Gagal', data.message, 'error');
                    }
                })
                .catch(error => {
                    hideRefundModal();
                    Swal.fire('Error', 'Terjadi kesalahan saat mengirim permintaan.', 'error');
                });
        });

        function confirmUpdateProfile() {
            const form = document.getElementById('profileForm');
            const name = document.getElementById('name')?.value || '';
            const email = document.getElementById('email')?.value || '';
            const phone = document.getElementById('phone')?.value || '';

            Swal.fire({
                title: 'Konfirmasi Perubahan Akun',
                html: `
                <div class="text-left">
                    <p class="mb-2"><strong>Nama:</strong> ${name}</p>
                    <p class="mb-2"><strong>Email:</strong> ${email}</p>
                    <p><strong>Nomor Telepon:</strong> ${phone || '-'}</p>
                </div>
                <p class="mt-4 text-sm">Anda yakin ingin menyimpan perubahan ini?</p>
            `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#f59e0b',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Simpan Perubahan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Menyimpan...',
                        html: 'Sedang menyimpan perubahan akun',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    if (form) {
                        form.submit();
                    } else {
                        Swal.fire('Error', 'Form tidak ditemukan.', 'error');
                    }
                }
            });
        }

        function confirmResetPassword() {
            const form = document.getElementById('resetPasswordForm');
            const currentPassword = document.getElementById('current_password')?.value || '';
            const newPassword = document.getElementById('new_password')?.value || '';
            const confirmPassword = document.getElementById('new_password_confirmation')?.value || '';

            // Validasi sebelum menampilkan konfirmasi
            if (newPassword !== confirmPassword) {
                Swal.fire({
                    title: 'Error',
                    text: 'Konfirmasi kata sandi baru tidak cocok',
                    icon: 'error',
                    confirmButtonColor: '#f59e0b'
                });
                return;
            }

            Swal.fire({
                title: 'Konfirmasi Ubah Kata Sandi',
                html: `
            <div class="text-left">
                <p class="mb-2 text-sm"><strong>Kata Sandi Baru:</strong> ${'•'.repeat(newPassword.length)}</p>
                <p class="text-xs text-gray-400 mt-2">Anda yakin ingin mengubah kata sandi Anda?</p>
            </div>
        `,
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#f59e0b',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Ubah Kata Sandi',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Memproses...',
                        html: 'Sedang mengubah kata sandi',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    if (form) {
                        form.submit();
                    } else {
                        Swal.fire('Error', 'Form tidak ditemukan.', 'error');
                    }
                }
            });
        }

        // Tambahkan event listener ke form
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('resetPasswordForm');
            if (form) {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    confirmResetPassword();
                });
            }
        });
    </script>
</x-front-layout>
