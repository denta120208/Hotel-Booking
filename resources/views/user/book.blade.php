<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Kamar</title>
    <style>
        /* Styling Umum */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .booking-container {
            background-color: white;
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        label {
            font-size: 1rem;
            font-weight: bold;
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
            margin-bottom: 15px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="date"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Animasi Form */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <div class="booking-container">
        <h1>Booking {{ $room->name }}</h1>

        <form method="POST" action="/book/{{ $room->id }}">
            @csrf
            <label for="guest_name">Nama:</label>
            <input type="text" id="guest_name" name="guest_name" required>

            <label for="guest_email">Email:</label>
            <input type="email" id="guest_email" name="guest_email" required>

            <label for="check_in">Check-in:</label>
            <input type="date" id="check_in" name="check_in" required>

            <label for="check_out">Check-out:</label>
            <input type="date" id="check_out" name="check_out" required>

            <button type="submit">Submit Booking</button>
        </form>
    </div>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            let submitButton = document.querySelector('button');
            submitButton.innerHTML = 'Processing...';
            submitButton.disabled = true;

            setTimeout(function() {
                submitButton.innerHTML = 'Submit Booking';
                submitButton.disabled = false;
            }, 2000);
        });
    </script>

</body>
</html>
