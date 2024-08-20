<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Brands extends Model
{
    protected $table = 'brands'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable=[
        'id',
        'name',
        'logo',
    ];
    public function scopeGetAll($query)
    {
        return $query->orderBy('logo','desc')->get();
    }
    public function product($query){
        return $query->hasMany(Products::class);
    }
}