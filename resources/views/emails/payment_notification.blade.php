<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pembayaran Baru</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #3085d6; color: white; padding: 10px; text-align: center; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .footer { margin-top: 20px; text-align: center; font-size: 0.8em; color: #666; }
        .booking-details { margin-top: 20px; }
        .detail-row { display: flex; margin-bottom: 10px; }
        .detail-label { font-weight: bold; width: 150px; }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3085d6;
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
            <h1>Bukti Pembayaran Baru</h1>
        </div>

        <div class="content">
            <p>Halo Admin,</p>
            <p>Sebuah bukti pembayaran baru telah diupload untuk booking berikut:</p>

            <div class="booking-details">
                <div class="detail-row">
                    <div class="detail-label">ID Booking:</div>
                    <div>{{ $booking->id }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Nama Customer:</div>
                    <div>{{ $booking->nama_customer }}</div>
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
                <div class="detail-row">
                    <div class="detail-label">Metode Pembayaran:</div>
                    <div>{{ $booking->metode_pembayaran }}</div>
                </div>
            </div>

            <p>Bukti pembayaran telah dilampirkan pada email ini. Silakan verifikasi pembayaran melalui admin panel atau dengan mengklik tombol di bawah:</p>

            <a href="{{ url('/admin/bookings') }}" class="button">Verivikasi Pembayaran</a>

            <p>Terima kasih,</p>
            <p>Sistem Jetski Seado Safari Samosir</p>
        </div>

        <div class="footer">
            <p>Email ini dikirim secara otomatis. Mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html>
