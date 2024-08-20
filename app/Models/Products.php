<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Support\Facades\Auth;


class Products extends Model
{
    protected $table = 'products'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable=['name','description','price_sale','price','brand_id','category_id','slug','type'];
    protected $appends = ['favorited'];

    public function scopegetAll($query){
        $query->orderBy('id', 'asc')->with(['categories', 'brands']);
    }
    public function scopeProducts($query,$limit)
    {
        $query->orderBy('id', 'asc')->limit($limit)->with(['categories', 'brands']);
    }
    public function scopeNew($query,$limit)
    {
        $query->orderBy('id', 'desc')->limit($limit)->with(['categories', 'brands']);
    }

    public function scoperelated($query,$category_id,$product_id){
        return $query->where('category_id',$category_id)->where('id','!=',$product_id);
    }
    public function scopeShowForCategory($query, $category_id)
    {
        return $query->where('category_id', $category_id)
                    ->orderBy('id', 'desc');
    }
    function percent($price_sale,$price){
        return round(($price-$price_sale)*100/$price);
    }
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', '%' . $search . '%');
    }


    /**
     * Get the categories  that owns the Products
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // Mối quan hệ belongsTo:
    // Mỗi bài viết (posts) thuộc về một người dùng (users).
    // Mỗi bài viết (posts) thuộc về một danh mục (categories).
    // Mối quan hệ hasMany:
    // Mỗi người dùng (users) có thể có nhiều bài viết (posts).
    // Mỗi danh mục (categories) có thể có nhiều bài viết (posts).
    // Mối quan hệ belongsToMany:
    // Mỗi người dùng (users) có thể thuộc nhiều vai trò (roles).
    // Mỗi vai trò (roles) có thể được gán cho nhiều người dùng (users).
    public function categories(){

        return $this->belongsTo(Categories::class,'category_id');
    }
    public function brands(){
        return $this->belongsTo(Brands::class,'brand_id','id');
    }

    public function images(){
        return $this->hasMany(Gallery::class);
    }

    public function getFavoritedAttribute(){
        $favorited = Favorites::where(['product_id'=>$this->id,'user_id'=>Auth::user()->id])->first();
        return $favorited ? true: false;
    }
    public function colors()
    {
        return $this->belongsToMany(Colors::class, 'product_colors', 'product_id', 'color_id');
    }

    public function clothingSizes()
    {
        return $this->belongsToMany(Clothing_sizes::class,'product_clothing_sizes','product_id','clothing_size_id');
    }

    public function pantSizes()
    {
        return $this->belongsToMany(Pant_sizes::class, 'product_pant_sizes', 'product_id', 'pant_size_id');
    }

    public function carts(){
        return $this->hasMany(Cart::class,'product_id');
    }

    // public function inventory()
    // {
    //     return $this->hasMany(Inventories::class);
    // }
}