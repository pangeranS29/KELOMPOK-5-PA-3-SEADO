<!DOCTYPE html>
<html>
<head>
    <title>Pembayaran Diterima</title>
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Pembayaran Anda Diterima</h1>
        </div>

        <div class="content">
            <p>Halo {{ $booking->user->name }},</p>
            <p>Pembayaran Anda untuk booking berikut telah berhasil diverifikasi:</p>

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
                    <div class="detail-label">Waktu:</div>
                    <div>{{ \Carbon\Carbon::parse($booking->waktu_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($booking->waktu_selesai)->format('H:i') }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Total Harga:</div>
                    <div>Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</div>
                </div>
            </div>

            <p>Anda sekarang dapat mencetak resi booking melalui akun Anda:</p>

            <a href="{{ url('/account?tab=transaction') }}" class="button">Lihat Booking Saya</a>

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
