<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_inventory extends Model
{
    protected $table ='productsize';
    protected $fillable = ['price','quantity','products_id','size_id'];

    public function products(){
        return $this->belongsTo(Products::class);
    }
}