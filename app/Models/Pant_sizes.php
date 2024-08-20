<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pant_sizes extends Model
{
    protected $table = 'pant_sizes';
    protected $fillable = ['name'];
    use HasFactory;

    public function scopegetAll($query)
    {
        return $query->orderBy('id', 'asc');
    }

    public function product_pant_sizes()
    {
        // "nhiều-nhiều"
        return $this->belongsToMany(Product_pant_sizes::class,'product_pant_sizes', 'product_id', 'pant_size_id');
    }

}
