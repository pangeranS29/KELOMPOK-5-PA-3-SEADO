<!DOCTYPE html>
<html>
<head>
    <title>Permintaan Refund Baru</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #d63031; color: white; padding: 10px; text-align: center; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .footer { margin-top: 20px; text-align: center; font-size: 0.8em; color: #666; }
        .booking-details { margin-top: 20px; }
        .detail-row { display: flex; margin-bottom: 10px; }
        .detail-label { font-weight: bold; width: 150px; }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #d63031;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .reason-box {
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
            <h1>Permintaan Refund Baru</h1>
        </div>

        <div class="content">
            <p>Halo Admin,</p>
            <p>Sebuah permintaan refund baru telah diajukan untuk booking berikut:</p>

            <div class="booking-details">
                <div class="detail-row">
                    <div class="detail-label">ID Booking:</div>
                    <div>{{ $booking->id }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Nama Customer:</div>
                    <div>{{ $booking->user->name }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">Email:</div>
                    <div>{{ $booking->user->email }}</div>
                </div>
                <div class="detail-row">
                    <div class="detail-label">No. HP:</div>
                    <div>{{ $booking->user->phone }}</div>
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
                    <div class="detail-label">Total Harga:</div>
                    <div>Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</div>
                </div>
            </div>

            <div class="reason-box">
                <h3>Alasan Refund:</h3>
                <p>{{ $refundReason }}</p>
            </div>

            <p>Silakan verifikasi permintaan refund melalui admin panel atau dengan mengklik tombol di bawah:</p>

            <a href="{{ url('/admin/bookings') }}" class="button">Verifikasi Refund</a>

            <p><strong>Catatan:</strong> Batas waktu proses refund adalah 1x24 jam setelah permintaan diterima.</p>

            <p>Terima kasih,</p>
            <p>Sistem Jetski Seado Safari Samosir</p>
        </div>

        <div class="footer">
            <p>Email ini dikirim secara otomatis. Mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html>
