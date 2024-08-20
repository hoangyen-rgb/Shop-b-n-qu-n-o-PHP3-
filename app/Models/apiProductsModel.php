<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apiProductsModel extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'products'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable=['name','description','price_sale','price','brand_id','category_id','slug','type'];
    // protected $appends = ['favorited'];
    public function apiCategoriesModel(){
        return $this->belongsTo(apiCategoriesModel::class);
    }

}
