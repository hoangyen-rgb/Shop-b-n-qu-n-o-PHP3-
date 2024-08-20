<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothing_sizes extends Model
{
    protected $table='clothing_sizes';
    protected $fillable = ['name'];
    use HasFactory;

    public function products(){
        return $this->belongsToMany(products::class,'product_clothing_sizes','product_id','clothing_size_id');
    }
    public function product_clothing_sizes()
    {
        // "một-nhiều"
        return $this->hasMany(Product_clothing_sizes::class);
    }
    // public fu

}
