<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Categories extends Model
{
    protected $table = 'categories'; // Tên bảng trong cơ sở dữ liệu
    protected $fillable=['id','name','parent_id','status'];
    public function scopegetAll($query)
    {
        return $query->orderBy('id','asc');
    }
    public function scopeCountCategory($query)
    {
        $product_counts = [];
        $categories = $query->get();

        foreach ($categories as $category) {
            $product_counts[$category->id] = Products::where('category_id', $category->id)->count();
        }
        return $product_counts;
    }

    public function scopePriceFilter($query, $minPrice = null, $maxPrice = null)
    {
        if ($minPrice !== null) {
            $query->where('price', '>=', $minPrice);
        }

        if ($maxPrice !== null) {
            $query->where('price', '<=', $maxPrice);
        }

        return $query;
    }

    public function scopeSortByName($query, $direction = 'asc')
    {
        return $query->orderBy('name', $direction);
    }

    public function scopeSortByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }
    public function products()
    {
        // "một-nhiều"
        return $this->hasMany(Products::class);
    }
    function categoryParent($categories, $currentCategoryId = 0, $parentId = 0, $depth = 0)
    {
        $options = '';
        foreach ($categories as $category) {
            if ($category->parent_id == $parentId) {
                $selected = ($category->id == $currentCategoryId) ? 'selected' : '';
                $options .= '<option value="' . $category->id . '" ' . $selected . '>' . str_repeat('&nbsp;&nbsp;', $depth) . $category->name . '</option>';
                $options .= static::categoryParent($categories, $currentCategoryId, $category->id, $depth + 1);
            }
        }
        return $options;
    }

    public function parent(){
        // một-nhiều
        return $this->belongsTo(Categories::class,'parent_id','id');
    }
}