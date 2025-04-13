<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Form styling */
        .booking-form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            animation: fadeIn 1s ease-out;
        }

        /* Input Fields */
        .input-field {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Focus animation on input */
        .input-field:focus {
            border-color: #3b7dd8;
            box-shadow: 0 0 5px rgba(59, 125, 216, 0.4);
            outline: none;
        }

        /* Submit button styling */
        .submit-btn {
            background-color: #3b7dd8;
            color: white;
            padding: 10px 20px;
            width: 100%;
            border-radius: 8px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Hover effect on submit button */
        .submit-btn:hover {
            background-color: #2a5ba1;
            transform: scale(1.05);
        }

        /* Form input hover effect */
        .form-group label {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #444;
        }

        /* Animation */
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

    <form action="{{ route('booking.submit') }}" method="POST" class="booking-form">
        @csrf
        <input type="hidden" name="room_id" value="{{ $room->id }}">

        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required class="input-field">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required class="input-field">
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required class="input-field">
        </div>

        <div class="form-group">
            <label for="check_in">Check-in Date:</label>
            <input type="date" id="check_in" name="check_in" required class="input-field">
        </div>

        <div class="form-group">
            <label for="check_out">Check-out Date:</label>
            <input type="date" id="check_out" name="check_out" required class="input-field">
        </div>

        <button type="submit" class="submit-btn">Submit Booking</button>
    </form>

    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            let submitButton = document.querySelector('.submit-btn');
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
