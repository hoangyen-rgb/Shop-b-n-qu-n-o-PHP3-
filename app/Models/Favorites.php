<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Favorites extends Model
{
    protected $table='favorites';
    protected $fillable =['user_id','product_id'];

    // public function scopecheckFavorited($query,$id){
    //     return $query->where(['product_id'=>$id,'user_id'=>Auth::user()->id,'status'=>1])->first();
    // }
    public function prod(){
        return $this->hasOne(Products::class,'id','product_id');
    }
    use HasFactory;
}
