<?php

namespace App\Http\Controllers\userController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Banners;
use App\Models\Product_clothing_sizes;
use App\Models\Product_pant_sizes;
use App\Models\Product_colors;
class HomeController extends Controller
{

    public function index(){
        $products=Products::Products(12)->get();
        $productNew=Products::New(4)->get();
        $list_brands= Brands::getAll();
        $banners= Banners::getAll()->get();
        $list_categories= Categories::getAll();
        return view('user.page.home', compact('productNew','products','list_brands','banners','list_categories'));
    }
    public function about(){
        return view('user.page.about');
    }
    public function shop(Request $request)
    {
        $category_id=$request->category_id;
        if ($category_id) {
            $products = Products::ShowForCategory($category_id)->paginate(9);
            $category = Categories::find($category_id);
            $categoryName = $category->name;
        } else {
            $products = Products::getAll()->paginate(9);
            $categoryName = 'Tất cả sản phẩm';
        }

        $list_categories  = Categories::getAll();
        $product_counts = Categories::CountCategory();

        return view('user.page.shop_category', compact('products', 'list_categories', 'product_counts', 'categoryName'), [
            'view' => 'user.page.custom-pagination',
        ]);
    }

    public function getProductByCategory(Request $request)
    {
        return $this->shop($request);
    }

    public function getproductByCategoryAtHome(request $request)
    {
        // $NewProducts=Products::NewProducts()->get();
        $products = products::ShowForCategory($request->category_id)->paginate(9);
        $list_categories = Categories::getAll();
        $product_counts = Categories::CountCategory();
        return view('user.page.shop_category', compact('products', 'list_categories','product_counts'),[
            'view'=>'user.page.custom-pagination',
        ]);
    }

    public function detail($id){
        // dd($id);
        $product = Products::with('clothingSizes','pantSizes')->find($id);
        // dd($product->type);
        $colors = Product_colors::where('product_id',$product->id)->get();
        // $pantSizes = Product_pant_sizes::where('product_id', $product->id)->pluck('name')->toArray();
        $clothingSizes = $product->clothingSizes;
        $pantSizes = $product->pantSizes;
        // dd($clothingSizes);
        // foreach($clothingSizes as $item){
        //         dd($item);

        // }

        $related = Products:: related($product->category_id,$product->id);
        return view('user.page.product-details', compact('product','colors','related','clothingSizes','pantSizes'));
    }
    public function cart(){
        return view('user.page.cart');
    }
}
