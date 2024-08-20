<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_colors extends Model
{
    protected $table="product_colors";
    protected $fillable=['product_id','color_id'];
    use HasFactory;

    public function colors(){
        return $this->belongsTo(Colors::class,'color_id');
    }
}