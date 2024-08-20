<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_clothing_sizes extends Model
{
    protected $table="product_clothing_sizes";
    protected $fillable=['product_id','clothing_size_id'];
    use HasFactory;

    public function clothingsizes(){
        return $this->belongsTo(Colors::class,'clothing_size_id');
    }
}