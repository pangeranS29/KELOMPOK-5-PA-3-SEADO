<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;

class PaymentRejectedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $reason;

    public function __construct(Booking $booking, $reason)
    {
        $this->booking = $booking;
        $this->reason = $reason;
    }

    public function build()
    {
        return $this->subject('Pembayaran Ditolak - Pesanan #' . $this->booking->id)
                    ->view('emails.payment_rejected');
    }
}
