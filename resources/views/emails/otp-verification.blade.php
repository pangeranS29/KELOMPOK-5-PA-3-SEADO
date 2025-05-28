<!DOCTYPE html>
<html>
<head>
    <title>Verifikasi OTP</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 0 auto; padding: 20px; }
        .header { background-color: #3085d6; color: white; padding: 10px; text-align: center; }
        .content { padding: 20px; background-color: #f9f9f9; }
        .otp-code {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            padding: 10px;
            background-color: #e9f7fe;
            border-radius: 5px;
        }
        .footer { margin-top: 20px; text-align: center; font-size: 0.8em; color: #666; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Verifikasi Email Anda</h1>
        </div>

        <div class="content">
            <p>Halo,</p>
            <p>Berikut adalah kode OTP untuk verifikasi email Anda:</p>

            <div class="otp-code">{{ $otp }}</div>

            <p>Kode ini akan kadaluarsa dalam 15 menit. Jangan berikan kode ini kepada siapapun.</p>

            <p>Jika Anda tidak meminta kode ini, Anda bisa mengabaikan email ini.</p>
        </div>

        <div class="footer">
            <p>Email ini dikirim secara otomatis. Mohon tidak membalas email ini.</p>
        </div>
    </div>
</body>
</html>
