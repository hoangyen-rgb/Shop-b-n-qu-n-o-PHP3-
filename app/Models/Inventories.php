<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventories extends Model
{
    protected $table="inventories";
    protected $fillable=['product_clothing_size_id','product_pant_size_id','product_color_id','quantity'];
    use HasFactory;


    public function ProductClothingSize()
    {
        return $this->belongsTo(Product_clothing_sizes::class, 'product_clothing_size_id');
    }
    public function ProductPantSize()
    {
        return $this->belongsTo(Product_pant_sizes::class, 'product_pant_size_id');
    }
    public function ProductColor()
    {
        return $this->belongsTo(Product_colors::class, 'product_color_id');
    }
}