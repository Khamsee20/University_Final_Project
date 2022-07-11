<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uploadpic extends Model
{
    use HasFactory;
    protected $table = 'uploadpic';
    protected $fillable = ['pic'];
}
