<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';
    protected $fillable = [
        'name','roomtype_id','member_id','village','district','province','horm','far_from','qty','status','location','price','details','image',
    ];


    public function roomtype()
    {
        return $this->belongsTo(Roomtype::class,'roomtype_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
    public function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }
}
