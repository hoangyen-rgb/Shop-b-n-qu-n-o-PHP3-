<?php

namespace App\Http\Controllers\adminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;

class AdminController extends Controller
{

    public function index(){
        return view('admin.page.statistical');
    }
    public function login(){
        return view('admin.page.login');
    }


    public function categoriesmanage(){
        $categories = categories::getAll();
        $products = Products::NewProducts();
        // foreach($categories as $item){
        //     $item->product_count = $item->products->count();
        // }
        return view('admin.page.categoriesmanage',compact('categories','products'));
    }
    public function editcategories(){
        return view('admin.page.editcategories');
    }
    public function addcategories(){
        return view('admin.page.addcategories',);
    }
    public function evaluatemanage(){
        return view('admin.page.evaluatemanage');
    }
    public function usermanage(){
        return view('admin.page.usermanage');
    }
}
