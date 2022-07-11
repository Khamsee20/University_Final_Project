<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'Lname',
        'gender',
        'email',
        'password',
        'position_id',
        'roles',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class,'position_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function member()
    {
        return $this->hasMany(Member::class);
    }

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }

    public function room()
    {
        return $this->hasMany(Room::class);
    }
    public function employee()
    {
        return $this->hasMany(Employee::class,'user_id');
    }

    // public function hasAnyPosition($position)
    // {
    //     if($this->position()->whereIn('name',$position)->first())
    //     {
    //         return true;
    //     }
    //     return false;
    // }
    // public function hasPosition($post)
    // {
    //     if($this->position()->where('name',$post)->first())
    //     {
    //         return true;
    //     }
    //     return false;
    // }
}
