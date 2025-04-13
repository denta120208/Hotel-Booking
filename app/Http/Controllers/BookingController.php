<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function form($room_id)
    {
        $room = Room::with('bookings')->findOrFail($room_id); // Optional
        return view('booking.form', compact('room'));
    }
    

    public function submit(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'room_id'    => 'required|exists:rooms,id',
            'name'       => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'required|string|max:20',
            'check_in'   => 'required|date',
            'check_out'  => 'required|date|after_or_equal:check_in',
        ]);

        // Debug log (opsional)
        Log::info('Booking form submitted:', $validated);

        // Simpan ke database
        $booking = Booking::create($validated);

        // Tambahan debug log (opsional)
        Log::info('Booking created with ID: ' . $booking->id);

        // Redirect kembali ke homepage dengan pesan sukses
        return redirect('/')->with('success', 'Booking berhasil dikirim!');
    }
}
