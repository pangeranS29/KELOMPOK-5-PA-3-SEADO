<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\PilihPaket;
use App\Models\DetailPaket;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\BookingRequest;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $query = Booking::with(['user', 'detail_paket.pilihpaket'])->select('bookings.*');

            return DataTables::of($query)
                ->addColumn('user_name', function ($row) {
                    return $row->user ? $row->user->name : '-';
                })
                ->addColumn('phone', function ($row) {
                    return $row->user ? $row->user->phone : '-';
                })
                ->addColumn('nama_paket', function ($row) {
                    return $row->detail_paket && $row->detail_paket->pilihpaket
                        ? $row->detail_paket->pilihpaket->nama_paket
                        : '-';
                })
                ->addColumn('waktu_mulai', function ($row) {
                    return $row->waktu_mulai ? Carbon::parse($row->waktu_mulai)->translatedFormat('d F Y, H:i') : '-';
                })
                ->addColumn('waktu_selesai', function ($row) {
                    return $row->waktu_selesai ? Carbon::parse($row->waktu_selesai)->translatedFormat('d F Y, H:i') : '-';
                })
                ->addColumn('action', function ($booking) {
                    return '
                    <button class="block w-full px-3 py-2 mb-1 text-sm text-center text-white transition duration-200 bg-blue-500 border border-blue-500 rounded-md select-none ease hover:bg-blue-600 focus:outline-none focus:shadow-outline preview-btn"
                        data-id="' . $booking->id . '"
                        data-image="' . asset('storage/' . $booking->bukti_pembayaran) . '"
                        data-status="' . $booking->status_pembayaran . '"
                        data-phone="' . ($booking->user ? $booking->user->phone : '') . '">
                        <i class="fas fa-eye mr-1"></i> Tampilkan
                    </button>';
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.bookings.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        return view('admin.bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        $booking->update($request->all());
        return redirect()->route('admin.bookings.index')->with('success', 'Paket berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index');
    }

    /**
     * Accept the booking payment and notify customer
     */
    public function accept(Booking $booking)
    {
        $booking->update(['status_pembayaran' => 'success']);

        // Get customer phone number
        $customerPhone = $booking->user->phone;
        $customerEmail = $booking->user->email;

        // Format phone number properly
        $formattedPhone = $this->formatPhoneNumber($customerPhone);

        // Get admin phone from config
        $adminPhone = env('ADMIN_PHONE', '6285763189029');

        // Create WhatsApp confirmation message
        $message = "Halo " . $booking->user->name . ",\n\n";
        $message .= "Pembayaran Anda untuk booking #{$booking->id} telah berhasil diverifikasi.\n\n";
        $message .= "Detail Booking:\n";
        $message .= "Paket: " . $booking->detail_paket->pilihpaket->nama_paket . "\n";
        $message .= "Tanggal: " . \Carbon\Carbon::parse($booking->waktu_mulai)->translatedFormat('d F Y') . "\n";
        $message .= "Waktu: " . \Carbon\Carbon::parse($booking->waktu_mulai)->format('H:i') . " - " . \Carbon\Carbon::parse($booking->waktu_selesai)->format('H:i') . "\n\n";
        $message .= "Silakan cek di: Profile -> Transaksi Saya -> Cetak Resi\n\n";
        $message .= "Hubungi admin di: " . $adminPhone . " jika ada pertanyaan.";

        // URL encode the message
        $encodedMessage = urlencode($message);

        // Create WhatsApp deep link
        $whatsappUrl = "https://wa.me/{$formattedPhone}?text={$encodedMessage}";

        // Send email notification
        try {
            Mail::to($customerEmail)
                ->send(new \App\Mail\PaymentAcceptedMail($booking));
        } catch (\Exception $e) {
            Log::error('Failed to send acceptance email: ' . $e->getMessage());
        }

        return response()->json([
            'message' => 'Status pembayaran berhasil diubah',
            'whatsapp_url' => $whatsappUrl,
            'formatted_phone' => $formattedPhone // For debugging
        ]);
    }

    // Helper function to format phone numbers
    private function formatPhoneNumber($phone)
    {
        // Remove all non-digit characters
        $phone = preg_replace('/[^0-9]/', '', $phone);

        // If starts with '0', replace with '62'
        if (substr($phone, 0, 1) === '0') {
            $phone = '62' . substr($phone, 1);
        }

        // If starts with '+62', remove the '+'
        if (substr($phone, 0, 3) === '+62') {
            $phone = '62' . substr($phone, 3);
        }

        // If doesn't start with country code, add '62'
        if (substr($phone, 0, 2) !== '62') {
            $phone = '62' . $phone;
        }

        return $phone;
    }

    /**
     * Reject the booking payment (but keep status as pending)
     */
    public function reject(Booking $booking, Request $request)
    {
        $request->validate([
            'reason' => 'required|string'
        ]);

        $booking->update(['status_pembayaran' => 'rejected']);

        // Get customer phone number
        $customerPhone = $booking->user->phone;
        $customerEmail = $booking->user->email;

        // Format phone number (remove leading 0 if exists and add 62)
        $formattedPhone = preg_replace('/^0/', '62', $customerPhone);

        // Get admin phone from config
        $adminPhone = env('ADMIN_PHONE', '6281234567890');

        // Create WhatsApp message
        $message = "Maaf, pembayaran Anda untuk booking #{$booking->id} tidak valid dengan alasan: " . $request->reason;
        $message .= "\n\nSilakan upload ulang bukti pembayaran yang valid.";
        $message .= "\n\nHubungi admin di: " . $adminPhone . " jika ada pertanyaan.";

        // URL encode the message
        $encodedMessage = urlencode($message);

        // Create WhatsApp deep link
        $whatsappUrl = "https://wa.me/{$formattedPhone}?text={$encodedMessage}";

        // Send email notification
        try {
            Mail::to($customerEmail)
                ->send(new \App\Mail\PaymentRejectedMail($booking, $request->reason));
        } catch (\Exception $e) {
            Log::error('Failed to send rejection email: ' . $e->getMessage());
        }

        return response()->json([
            'message' => 'Pemberitahuan penolakan berhasil dikirim',
            'whatsapp_url' => $whatsappUrl
        ]);
    }

    /**
     * Proses refund untuk booking
     */
    /**
     * Process refund for booking
     */
    public function processRefund(Booking $booking, Request $request)
    {
        $request->validate([
            'refund_proof' => 'required|file|mimes:jpg,png,pdf|max:2048',
            'refund_note' => 'nullable|string|max:500'
        ]);

        if ($request->hasFile('refund_proof')) {
            $file = $request->file('refund_proof');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $destinationPath = public_path('storage/refund_proofs');

            // Buat folder jika belum ada
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);

            // Simpan path relatif
            $refundProofPath = 'refund_proofs/' . $filename;
        } else {
            return back()->with('error', 'File refund tidak ditemukan.');
        }

        // Update booking status
        $booking->update([
            'status_pembayaran' => 'refunded',
            'total_harga' => null,
            'refund_proof' => $refundProofPath,
            'refund_processed_at' => now()
        ]);

        // Format nomor telepon
        $customerPhone = $booking->user->phone;
        $formattedPhone = preg_replace('/^0/', '62', $customerPhone);
        $adminPhone = env('ADMIN_PHONE', '6285763189029');

        // Buat pesan WhatsApp
        $message = "Refund untuk booking #{$booking->id} telah diproses.\n\n";
        $message .= "Dana telah dikembalikan ke rekening Anda.\n\n";

        if ($request->refund_note) {
            $message .= "Catatan: {$request->refund_note}\n\n";
        }

        $message .= "Bukti refund dapat dilihat di: " . asset('storage/' . $refundProofPath) . "\n\n";
        $message .= "Hubungi admin di: {$adminPhone} jika ada pertanyaan.";

        $encodedMessage = urlencode($message);
        $whatsappUrl = "https://wa.me/{$formattedPhone}?text={$encodedMessage}";

        return response()->json([
            'message' => 'Refund berhasil diproses',
            'whatsapp_url' => $whatsappUrl
        ]);
    }
}
