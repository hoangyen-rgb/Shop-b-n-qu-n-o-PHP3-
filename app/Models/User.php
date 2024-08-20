<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'address',
        'status',
        'role',
    ];

    protected $attributes = [
        'status' => 'active',
        'role' =>'user',
        'address' => '',
        'phone_number' => null, // Set the default value for phone_number
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
        'password' => 'hashed',
    ];

    /**
     * The attributes that are nullable.
     *
     * @var array<int, string>
     */
    protected $nullable = [
        'phone_number',
    ];

    public function favorites(){
        return $this->hasMany(Favorites::class,'user_id','id');
    }
    public function carts(){
        return $this->hasMany(Cart::class,'user_id','id');
    }

}