<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    protected $table='bills';
    protected $fillable =['user_id','status','total','note'];
    use HasFactory;

    public function get_bill_by_status($status){

        return $this->with('user','items.product')->where('status', $status);
    }

    public function items(){
        return $this->hasMany(Bill_items::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function product(){
        return $this->belongsTo(Products::class);
    }
}