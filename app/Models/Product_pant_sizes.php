<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_pant_sizes extends Model
{
    protected $table="product_pant_sizes";
    protected $fillable=['product_id','pant_size_id'];
    use HasFactory;


    public function pantsizes(){
        return $this->belongsTo(Colors::class,'pant_size_id');
    }
}