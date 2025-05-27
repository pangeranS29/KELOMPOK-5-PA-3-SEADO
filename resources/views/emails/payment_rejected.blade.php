<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Ditolak</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #F44336; color: white; padding: 10px; text-align: center; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .footer { margin-top: 20px; text-align: center; font-size: 0.8em; color: #666; }
        .booking-details { margin-top: 20px; }
        .detail-row { display: flex; margin-bottom: 10px; }
        .detail-label { font-weight: bold; width: 150px; }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #F44336;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .reason-box {
            background-color: #FFEBEE;
            border-left: 4px solid #F44336;
            padding: 10px;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pembayaran Anda Ditolak</h1>
        </div>

        <div class="content">
            <p>Halo {{ $booking->user->name }},</p>
            <p>Maaf, pembayaran Anda untuk booking berikut tidak dapat kami terima:</p>

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
                    <div class="detail-label">Tanggal:</div>
                    <div>{{ \Carbon\Carbon::parse($booking->waktu_mulai)->translatedFormat('d F Y') }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Total Harga:</div>
                    <div>Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</div>
                </div>
            </div>

            <div class="reason-box">
                <strong>Alasan Penolakan:</strong>
                <p>{{ $reason }}</p>
            </div>

            <p>Silakan upload ulang bukti pembayaran yang valid melalui akun Anda:</p>

            <a href="{{ url('/account?tab=transaction') }}" class="button">Upload Ulang Bukti Pembayaran</a>

            <p>Jika Anda memiliki pertanyaan, silakan hubungi kami di {{ env('ADMIN_PHONE', '085763189029') }}.</p>

            <p>Terima kasih,</p>
            <p>Tim Jetski Seado Safari Samosir</p>
        </div>

        <div class="footer">
            <p>Email ini dikirim secara otomatis. Mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html>
