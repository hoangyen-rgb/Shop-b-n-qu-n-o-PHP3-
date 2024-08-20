<?php

namespace App\Http\Controllers\userController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use App\Models\Categories;
use App\Models\Products;
class FunctionController extends Controller
{
    public function getproductBySearch(request $request)
    {
        if(isset($_GET['search'])){
            $search=$_GET['search'];

        $products = Products::Search($search)
                           ->paginate(9);
        $list_categories = Categories::getAll();
        $product_counts = Categories::CountCategory();
        if($search){
            $categoryName  = 'Sản phẩm tìm kiếm theo: '.$search;
        }else{
            $categoryName  ='';
        }

        return view('user.page.shop_category', compact('products', 'list_categories','product_counts','categoryName'),[
            'view'=>'user.page.custom-pagination',
        ]);
        }
    }
    public function sort(Request $request)
{
    $sortBy = $request->input('sort');
    $sortDirection = explode('-', $sortBy)[1] ?? 'asc';
    $sortBy = explode('-', $sortBy)[0];

    // Perform the data sorting
    $products = Products::query();
    switch ($sortBy) {
        case 'name':
            $products->orderBy('name', $sortDirection);
            break;
        case 'price':
            $products->orderBy('price', $sortDirection);
            break;
    }

    $products = $products->paginate(9);

    $list_categories = Categories::getAll();
    $product_counts = Categories::CountCategory();

    return view('user.page.shop_category', [
        'products' => $products,
        'list_categories' => $list_categories,
        'product_counts' => $product_counts,
        'categoryName' => '',
        'view' => 'user.page.custom-pagination',
    ]);
}

    public function filter(Request $request)
    {
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        // // Kiểm tra giá trị $minPrice và $maxPrice
        // dd($minPrice, $maxPrice);

        if($minPrice && $maxPrice != null){
        $products = Products::whereBetween('price', [$minPrice, $maxPrice])->paginate(9);
        $list_categories = Categories::getAll();
        $product_counts = Categories::CountCategory();
        $categoryName  = 'Sản phẩm lọc theo giá từ'.$minPrice.'tới'.$maxPrice;
        }else{
            return redirect()->route('user.shop');
        }

        // // Kiểm tra truy vấn SQL
        // dd($products->toSql());
        return view('user.page.shop_category', compact('products', 'list_categories','product_counts'),[
            'view'=>'user.page.custom-pagination',
        ]);
    }
}