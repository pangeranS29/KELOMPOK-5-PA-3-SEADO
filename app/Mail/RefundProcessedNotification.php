<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;

class RefundProcessedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $refundNote;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Booking $booking, $refundNote = null)
    {
        $this->booking = $booking;
        $this->refundNote = $refundNote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Refund Telah Diproses - ID Booking: ' . $this->booking->id)
                    ->view('emails.refund_processed');
    }
}
