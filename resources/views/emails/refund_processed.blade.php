<!DOCTYPE html>
<html>
<head>
    <title>Refund Telah Diproses</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #4CAF50; color: white; padding: 10px; text-align: center; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .footer { margin-top: 20px; text-align: center; font-size: 0.8em; color: #666; }
        .booking-details { margin-top: 20px; }
        .detail-row { display: flex; margin-bottom: 10px; }
        .detail-label { font-weight: bold; width: 150px; }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .proof-box {
            background-color: #fff;
            border: 1px solid #ddd;
            padding: 15px;
            margin: 15px 0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Refund Telah Diproses</h1>
        </div>

        <div class="content">
            <p>Halo {{ $booking->user->name }},</p>
            <p>Kami ingin memberitahukan bahwa permintaan refund Anda untuk booking berikut telah diproses:</p>

            <div class="booking-details">
                <div class="detail-row">
                    <div class="detail-label">ID Booking:</div>
                    <div>{{ $booking->id }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Paket:</div>
                    <div>{{ $booking->detail_paket->pilihpaket->nama_paket }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Tanggal Booking:</div>
                    <div>{{ \Carbon\Carbon::parse($booking->waktu_mulai)->translatedFormat('d F Y') }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Waktu Booking:</div>
                    <div>{{ \Carbon\Carbon::parse($booking->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->waktu_selesai)->format('H:i') }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Tanggal Diproses:</div>
                    <div>{{ \Carbon\Carbon::parse($booking->refund_processed_at)->translatedFormat('d F Y H:i') }}</div>
                </div>
            </div>

            @if($refundNote)
            <div class="proof-box">
                <h3>Catatan Admin:</h3>
                <p>{{ $refundNote }}</p>
            </div>
            @endif

            <div class="proof-box">
                <h3>Bukti Refund:</h3>
                <p>Anda dapat melihat bukti refund <a href="{{ asset('storage/' . $booking->refund_proof) }}" target="_blank">di sini</a>.</p>
            </div>

            <p>Dana telah dikembalikan ke rekening Anda sesuai dengan metode pembayaran yang digunakan sebelumnya.</p>

            <p>Jika Anda memiliki pertanyaan lebih lanjut, jangan ragu untuk menghubungi kami melalui WhatsApp:</p>

            <a href="https://wa.me/{{ env('ADMIN_PHONE', '6285763189029') }}" class="button">Hubungi Admin</a>

            <p>Terima kasih,</p>
            <p>Tim Jetski Seado Safari Samosir</p>
        </div>

        <div class="footer">
            <p>Email ini dikirim secara otomatis. Mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html>
