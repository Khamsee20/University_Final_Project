<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = [
        'room_id','user_id','booking_date','into_date',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }
    public function booking_cancel()
    {
        return $this->belongsTo(Booking_cancel::class);
    }
    
}
