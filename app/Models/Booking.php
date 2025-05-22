<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    
    protected $table = 'bookings'; // Pastikan nama tabel benar
    
    protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'check_in',
        'check_out',
    ];
    
    // Perhatikan format date casting
    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];
    
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}