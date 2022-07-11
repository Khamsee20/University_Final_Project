<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comment';
    protected $fillable = [
        'room_id','user_id','comments',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }
}


