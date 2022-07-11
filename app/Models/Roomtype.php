<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    use HasFactory;
    protected $table = 'roomtype';
    protected $fillable = [
        'name',
    ];
    

    public function room()
    {
        return $this->hasMany(Room::class);
    }
}
