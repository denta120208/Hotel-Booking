<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function form($room_id)
    {
        $room = Room::findOrFail($room_id);
        return view('booking.form', compact('room'));
    }
    
    public function submit(Request $request)
    {
        // 1. Log semua data yang masuk
        Log::channel('daily')->info('Raw booking request received', $request->all());
        
        // 2. Validasi data
        try {
            $validated = $request->validate([
                'room_id'   => 'required|exists:rooms,id',
                'name'      => 'required|string|max:255',
                'email'     => 'required|email',
                'phone'     => 'required|string|max:20',
                'check_in'  => 'required|date',
                'check_out' => 'required|date|after_or_equal:check_in',
            ]);
            
            Log::channel('daily')->info('Validation passed', $validated);
            
            // 3. Simpan data menggunakan database transaction
            DB::beginTransaction();
            try {
                // Coba simpan dengan model
                $booking = new Booking();
                $booking->fill($validated);
                $saved = $booking->save();
                
                if (!$saved) {
                    throw new \Exception("Booking could not be saved using model");
                }
                
                Log::channel('daily')->info('Booking saved successfully', [
                    'id' => $booking->id,
                    'data' => $booking->toArray()
                ]);
                
                // Commit transaksi jika berhasil
                DB::commit();
                
                // 4. Redirect dengan message sukses
                return redirect()->back()->with('success', 'Booking berhasil dikirim! ID: ' . $booking->id);
                
            } catch (\Exception $dbEx) {
                // Rollback jika gagal
                DB::rollBack();
                
                // 5. Coba cara alternatif dengan query builder
                Log::channel('daily')->error('Error saving booking with model: ' . $dbEx->getMessage());
                
                try {
                    $id = DB::table('bookings')->insertGetId([
                        'room_id' => $validated['room_id'],
                        'name' => $validated['name'],
                        'email' => $validated['email'],
                        'phone' => $validated['phone'],
                        'check_in' => $validated['check_in'],
                        'check_out' => $validated['check_out'],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                    
                    Log::channel('daily')->info('Booking inserted with query builder, ID: ' . $id);
                    
                    return redirect()->back()->with('success', 'Booking berhasil dikirim dengan metode alternatif! ID: ' . $id);
                    
                } catch (\Exception $queryEx) {
                    Log::channel('daily')->error('Error with query builder: ' . $queryEx->getMessage());
                    return redirect()->back()->with('error', 'Gagal menyimpan booking! Error: ' . $queryEx->getMessage())->withInput();
                }
            }
            
        } catch (\Exception $validationEx) {
            Log::channel('daily')->error('Validation error: ' . $validationEx->getMessage());
            return redirect()->back()->with('error', 'Data tidak valid: ' . $validationEx->getMessage())->withInput();
        }
    }
}