<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'name',
        'email',
        'phone',
        'check_in',
        'check_out',
    ];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    

}
