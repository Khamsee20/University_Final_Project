<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $fillable = [
        'user_id','phone','village','district','province',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function room()
    {
        return $this->hasMany(Room::class);
    }
}
