<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Gallery extends Model
{
    protected $table = 'gallery'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable=['image','products_id'];

}