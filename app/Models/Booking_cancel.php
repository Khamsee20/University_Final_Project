<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking_cancel extends Model
{
    use HasFactory;
    protected $table = 'booking_cancel';
    protected $fillable = [
        'cancel_date','booking_id'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class,'booking_id');
    }
}
