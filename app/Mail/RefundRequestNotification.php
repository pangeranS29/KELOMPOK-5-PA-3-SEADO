<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;

class RefundRequestNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $refundReason;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Booking $booking, $refundReason)
    {
        $this->booking = $booking;
        $this->refundReason = $refundReason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Permintaan Refund Baru - ID Booking: ' . $this->booking->id)
                    ->view('emails.refund_request');
    }
}
