<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    protected $table = 'colors'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable=['id','name'];
    use HasFactory;
    public function product_colors()
    {
        // "một-nhiều"
        return $this->hasMany(Product_colors::class);
    }

}
