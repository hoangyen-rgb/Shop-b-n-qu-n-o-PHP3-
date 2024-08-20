<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banners extends Model
{
    protected $table='banners';
    protected $fillable=['image','content','text'];
    public function scopegetAll($query){
        return $query->orderBy('id','asc');
    }
    use HasFactory;
}