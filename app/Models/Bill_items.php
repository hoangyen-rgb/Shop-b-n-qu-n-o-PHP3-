<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill_items extends Model
{
    protected $table='bill_items';
    protected $fillable=['bills_id','product_id','quantity','size','color'];
    use HasFactory;

    public function bills(){
        return $this->hasMany(Bills::class);
    }

    public function user()
        {
            return $this->belongsTo(User::class);
        }

        // Belongs to Product
        public function product()
        {
            return $this->belongsTo(Products::class,'product_id');
        }
        public function bill()
        {
            return $this->belongsTo(Bills::class,'bills_id');
        }
}
