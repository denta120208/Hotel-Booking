<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f4f8;
            margin: 0;
            padding: 0;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-top: 50px;
            color: #333;
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .room-grid {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .room {
            background-color: #ffffff;
            border-radius: 12px;
            border: 1px solid #ddd;
            width: 300px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin: 20px;
            cursor: pointer;
        }

        .room:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
        }

        .room img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }

        .room img:hover {
            transform: scale(1.1);
        }

        .room h2 {
            text-align: center;
            margin: 10px 0;
            font-size: 1.25rem;
            color: #007bff;
            font-weight: 600;
        }

        .room p {
            padding: 0 15px;
            font-size: 1rem;
            color: #555;
            margin-bottom: 15px;
        }

        .room a {
            display: block;
            text-align: center;
            margin: 15px;
            background-color: #28a745;
            color: white;
            padding: 12px 0;
            border-radius: 6px;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .room a:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        /* Success message style */
        .success-message {
            color: #28a745;
            text-align: center;
            font-size: 1.2rem;
            margin: 20px 0;
            font-weight: bold;
        }

        /* Grid Responsiveness */
        @media (max-width: 768px) {
            .room-grid {
                flex-direction: column;
                align-items: center;
            }

            .room {
                width: 80%;
            }
        }
        header {
            background-color: #0d47a1;
            padding: 20px;
            text-align: center;
            color: white;
        }

        h1 {
            color: #ffffff;
        }
    </style>
</head>
<body>

  
<header>
        <h1>Booking Kamar Hotel</h1>
    </header>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <div class="room-grid">
        @foreach ($rooms as $room)
            <div class="room">
                <h2>{{ $room->name }}</h2>
                <img src="{{ asset($room->image) }}" alt="{{ $room->name }}">
                <p>{{ $room->description }}</p>
                <a href="{{ route('booking.form', ['room_id' => $room->id]) }}">Booking Sekarang</a>
            </div>
        @endforeach
    </div>

</body>
</html>
