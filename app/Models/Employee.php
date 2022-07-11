<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $fillable = [
        'user_id','cardID','phone','b_date','village','district','province',
    ];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    // public function room()
    // {
    //     return $this->hasMany(Room::class);
    // }
}
