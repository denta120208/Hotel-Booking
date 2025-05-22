```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
        }

        .confirmation-card {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            animation: fadeIn 1s ease-out;
        }

        .confirmation-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .confirmation-header h1 {
            color: #3b7dd8;
            font-size: 24px;
            margin-bottom: 5px;
        }

        .confirmation-header p {
            color: #6b7280;
        }

        .booking-details {
            margin-top: 20px;
        }

        .booking-detail-item {
            display: flex;
            margin-bottom: 15px;
            border-bottom: 1px solid #eaeaea;
            padding-bottom: 10px;
        }

        .detail-label {
            font-weight: bold;
            width: 140px;
            color: #374151;
        }

        .detail-value {
            flex: 1;
            color: #4b5563;
        }

        .success-icon {
            font-size: 60px;
            color: #22c55e;
            text-align: center;
            margin-bottom: 20px;
        }

        .back-btn {
            display: inline-block;
            background-color: #3b7dd8;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            margin-top: 20px;
            transition: background-color 0.3s ease;
            text-align: center;
        }

        .back-btn:hover {
            background-color: #2a5ba1;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>

    <div class="confirmation-card">
        <div class="success-icon">✓</div>
        
        <div class="confirmation-header">
            <h1>Booking Berhasil!</h1>
            <p>Terima kasih telah melakukan pemesanan dengan kami.</p>
        </div>

        @if(session('success'))
            <div style="background-color: #ecfdf5; color: #065f46; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="booking-details">
            <div class="booking-detail-item">
                <div class="detail-label">Booking ID:</div>
                <div class="detail-value">{{ $booking->id }}</div>
            </div>
            
            <div class="booking-detail-item">
                <div class="detail-label">Kamar:</div>
                <div class="detail-value">{{ $booking->room->name }}</div>
            </div>
            
            <div class="booking-detail-item">
                <div class="detail-label">Nama:</div>
                <div class="detail-value">{{ $booking->name }}</div>
            </div>
            
            <div class="booking-detail-item">
                <div class="detail-label">Email:</div>
                <div class="detail-value">{{ $booking->email }}</div>
            </div>
            
            <div class="booking-detail-item">
                <div class="detail-label">Telepon:</div>
                <div class="detail-value">{{ $booking->phone }}</div>
            </div>
            
            <div class="booking-detail-item">
                <div class="detail-label">Check-in:</div>
                <div class="detail-value">{{ date('d M Y', strtotime($booking->check_in)) }}</div>
            </div>
            
            <div class="booking-detail-item">
                <div class="detail-label">Check-out:</div>
                <div class="detail-value">{{ date('d M Y', strtotime($booking->check_out)) }}</div>
            </div>
            
            <div class="booking-detail-item">
                <div class="detail-label">Tanggal Booking:</div>
                <div class="detail-value">{{ date('d M Y H:i', strtotime($booking->created_at)) }}</div>
            </div>
        </div>

        <a href="/" class="back-btn">Kembali ke Beranda</a>
    </div>

</body>
</html>
```