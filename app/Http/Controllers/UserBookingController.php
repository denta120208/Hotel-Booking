<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;

class UserBookingController extends Controller 
{
    public function index()
    {
        // Cek jumlah kamar
        $roomCount = Room::count();
        
        if ($roomCount == 0) {
            $roomData = [
                [
                    'name' => 'Deluxe Room',
                    'image' => 'image/rooms/deluxe.jpeg',
                    'description' => 'Kamar luas dengan tempat tidur king size.'
                ],
                [
                    'name' => 'Superior Twin',
                    'image' => 'image/rooms/superior.jpeg',
                    'description' => 'Kamar nyaman dengan balkon pribadi.'
                ],
                [
                    'name' => 'Family Room',
                    'image' => 'image/rooms/family.jpeg',
                    'description' => 'Kamar sederhana dan bersih cocok untuk sekeluarga.'
                ],
                [
                    'name' => 'Single Room',
                    'image' => 'image/rooms/single.jpeg',
                    'description' => 'Kamar sederhana dan bersih cocok untuk sendiri.'
                ],
                [
                    'name' => 'Connecting Room',
                    'image' => 'image/rooms/konek.jpeg',
                    'description' => 'Kamar sederhana dan bersih cocok untuk ramai-ramai.'
                ],
            ];
    
            foreach ($roomData as $data) {
                Room::create($data);
            }
        }
    
        // Ambil data room dan relasi booking-nya (opsional)
        $rooms = Room::with('bookings')->get(); // <- Eager loading
        
        return view('user.index', compact('rooms'));
    }
    
}