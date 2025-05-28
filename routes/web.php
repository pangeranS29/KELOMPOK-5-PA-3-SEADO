<?php

use App\Models\Berita;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\DetailController;
use App\Http\Controllers\Front\AccountController;
use App\Http\Controllers\Front\LandingController;
use App\Http\Controllers\Front\PaymentController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\BeritaController as FrontBeritaController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaPaketController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\PilihPaketController as AdminPilihPaketController;
use App\Http\Controllers\Admin\DetailPaketController as AdminDetailPaketController;
use App\Http\Controllers\Auth\RegisteredUserController;

// Route Registrasi
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// Route Verifikasi Email
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
*/
Route::name('front.')->group(function () {
    // Public routes (no auth required)

      Route::get('/', [LandingController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [DetailController::class, 'index'])->name('detail');

    // Berita Routes (public)
    Route::prefix('berita')->name('berita.')->group(function () {
        Route::get('/', [FrontBeritaController::class, 'index'])->name('index');
        Route::get('/{slug}', [FrontBeritaController::class, 'show'])->name('show');
    });

    // Authenticated routes (require login)
    Route::middleware(['auth', 'verified'])->group(function () {

        // Payment routes
        Route::get('/payment/success/{bookingId}', [PaymentController::class, 'success'])->name('payment.success');
        Route::get('/payment/{bookingId}', [PaymentController::class, 'index'])->name('payment');

        // Checkout routes
        Route::get('/checkout/{id}', [CheckoutController::class, 'index'])->name('checkout');
        Route::post('/checkout/{id}', [CheckoutController::class, 'store'])->name('checkout.store');

        // Payment processing routes
        Route::get('/payment/{bookingId}/upload', [PaymentController::class, 'showUploadForm'])->name('payment.show');
        Route::post('/payment/update/{bookingId}', [PaymentController::class, 'updatePaymentMethod'])->name('payment.update');
        Route::post('/payment/upload/{bookingId}', [PaymentController::class, 'uploadBuktiPembayaran'])->name('payment.upload');
        Route::post('/payment/{booking}/check-expired', [PaymentController::class, 'checkExpired'])->name('payment.check-expired');
        Route::post('/payment/{booking}/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
        Route::get('/cetak-resi/{bookingId}', [PaymentController::class, 'cetakResi'])->name('cetak.resi');

        // Account routes
        Route::get('/account', [AccountController::class, 'index'])->name('account');
        Route::put('/account/update', [AccountController::class, 'update'])->name('account.update');
        Route::post('/account/reset-password', [AccountController::class, 'resetPassword'])->name('account.reset-password');
        Route::post('/account/request-refund/{id}', [AccountController::class, 'requestRefund'])
            ->name('front.account.request-refund');
        Route::post('/booking/{booking}/check-status', [AccountController::class, 'checkBookingStatus'])
            ->name('booking.check-status');

        // API routes
        Route::get('/api/berita/latest', [FrontBeritaController::class, 'latest'])->name('api.berita.latest');
        Route::get('/api/payments/latest', [FrontBeritaController::class, 'latestPayments'])->name('api.payments.latest');
        Route::post('/api/berita/mark-all-read', [FrontBeritaController::class, 'markAllAsRead'])->name('api.berita.markAllAsRead');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
     // 'verified', This ensures admin users must verify their email
    // You might want to add an 'admin' role check here if you have role management
])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('pilihpakets', AdminPilihPaketController::class);
    Route::resource('detail_pakets', AdminDetailPaketController::class);

    // Booking routes
    Route::resource('bookings', AdminBookingController::class);
    Route::post('/bookings/{booking}/accept', [AdminBookingController::class, 'accept'])->name('bookings.accept');
    Route::post('/bookings/{booking}/reject', [AdminBookingController::class, 'reject'])->name('bookings.reject');
    Route::post('/bookings/{booking}/process-refund', [AdminBookingController::class, 'processRefund'])->name('bookings.process-refund');

    // Berita Routes
    Route::resource('beritas', AdminBeritaPaketController::class)
        ->except(['show'])
        ->names([
            'index' => 'beritas.index',
            'create' => 'beritas.create',
            'store' => 'beritas.store',
            'edit' => 'beritas.edit',
            'update' => 'beritas.update',
            'destroy' => 'beritas.destroy',
        ]);

    Route::get('beritas/{berita}', [AdminBeritaPaketController::class, 'show'])
        ->name('beritas.show');
});
