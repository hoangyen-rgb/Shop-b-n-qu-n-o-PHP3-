<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apiCategoriesModel extends Model
{
    use HasFactory;
    protected $table = 'categories'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable=['id','name','parent_id','status'];

    public function apiProductsModel(){
        return $this->hasMany(apiProductsModel::class);
    }

}