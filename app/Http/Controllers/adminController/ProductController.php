<?php

namespace App\Http\Controllers\adminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateProductRequest;
use Illuminate\Support\Facades\File;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Gallery;
use App\Models\Colors;
use App\Models\Pant_sizes;
use App\Models\Clothing_sizes;
use App\Models\Product_colors;
use App\Models\Product_pant_sizes;
use App\Models\Product_clothing_sizes;
use App\Models\Inventories;


class ProductController extends Controller
{
    public function index(){
        $products=Products::with('categories')->paginate(10);
        return view('admin.page.products',compact('products'), [
            'view' => 'admin.page.custom-pagination',
        ]);
    }
    public function add(){
        $categories=Categories::all();
        $brands=Brands::all();
        $colors=Colors::all();
        $pant_sizes=Pant_sizes::all();
        $clothing_sizes=Clothing_sizes::all();
        return view('admin.page.add_product',compact('categories','brands','colors','pant_sizes','clothing_sizes'));
    }
    public function store(Request $request){
         // Validate dữ liệu
    // $validatedData = $request->validate([
    //     'brand_id' => 'required|integer',
    //     'category_id' => 'required|integer',
    //     'name' => 'required|string',
    //     'price' => 'required|numeric',
    //     'price_sale' => 'nullable|numeric',
    //     'description' => 'nullable|string',
    //     'colors' => 'required|array',
    //     'clothing_sizes' => 'required|array',
    //     'pant_sizes' => 'required|array',
    //     'inventory' => 'required|array'
    // ]);
        // Tạo sản phẩm mới
        // dd($request->all());
            $product = Products::create([
                'name' => $request->name,
                'description' => $request->description,
                'price_sale' => $request->price_sale,
                'price' => $request->price,
                'brand_id' => $request->brand,
                'category_id' => $request->parent_id,
                'slug' => $request->slug,
                'type' => $request->type,
            ]);

            foreach ($request->colors as $color_id) {
                $existingColorLink = Product_colors::where('product_id', $product->id)
                                                  ->where('color_id', $color_id)
                                                  ->first();
                if (!$existingColorLink) {
                    Product_colors::create([
                        'product_id' => $product->id,
                        'color_id' => $color_id,
                    ]);
                }
            }

                if ($request->has('clothing_sizes')) {
                    foreach ($request->clothing_sizes as $item) {
                        $existingClothingSizelink = Product_clothing_sizes::where('product_id', $product->id)
                        ->where('clothing_size_id', $item)
                        ->first();
                        if(!$existingClothingSizelink){
                            $product_clothing_size = Product_clothing_sizes::create([
                                'product_id' => $product->id,
                                'clothing_size_id' => $item,
                            ]);
                            foreach ($request->colors as $colorId) {
                                Inventories::create([
                                    'product_clothing_size_id' => $product_clothing_size->id,
                                    'product_pant_size_id' => null,
                                    'product_color_id' => Product_colors::where('product_id', $product->id)
                                        ->where('color_id', $colorId)
                                        ->first()->id,
                                    'quantity' => 0,
                                ]);
                            }
                        }


                    }
                }

                if ($request->has('pant_sizes')) {

                    foreach ($request->pant_sizes as $item) {
                        $extistingPantSizelink = Product_pant_sizes::where('product_id', $product->id)
                    ->where('pant_size_id', $item)
                    ->first();
                    if(!$extistingPantSizelink){
                        $product_pant_size = Product_pant_sizes::create([
                            'product_id' => $product->id,
                            'pant_size_id' => $item,
                        ]);

                        foreach ($request->colors as $colorId) {
                            Inventories::create([
                                'product_clothing_size_id' => null,
                                'product_pant_size_id' => $product_pant_size->id,
                                'product_color_id' => Product_colors::where('product_id', $product->id)
                                    ->where('color_id', $colorId)
                                    ->first()->id,
                                'quantity' => 0,
                            ]);
                        }
                    }

                    }
                }

            // // Lưu hình ảnh chính
            if ($request->hasFile('images')) {
                $i = 1;

                foreach ($request->file('images') as $image) {
                    // dd($product->id);
                    Gallery::create([
                        'products_id' => $product->id,
                        'image' => $primaryImage= $request->slug . '-' . $i++ . '.' . $image->getClientOriginalExtension(),
                    ]);
                    $image->move(public_path('site/img/gallery'), $primaryImage);
                }
            }
        return redirect()->route('admin.product');

    }
    public function edit($id){
        $product = Products::find($id);
        $colors = Colors::all();
        $categories=Categories::all();
        $brands=Brands::all();
        $pant_sizes=Pant_sizes::all();
        $clothing_sizes=Clothing_sizes::all();


        $category = Categories::where('id', $product->category_id);
        $productColors = Product_colors::where('product_id', $id)->get();

        $productPantSizes = Product_pant_sizes::where('product_id', $id)->get();
        $productClothingSizes = Product_clothing_sizes::where('product_id', $id)->get();
// dd($productClothingSizes);
        return view('admin.page.edit_product', compact('product', 'colors', 'categories', 'brands','pant_sizes', 'clothing_sizes',
         'category', 'productColors','productPantSizes','productClothingSizes'));

    }
    public function update(UpdateProductRequest $request, $id)
    {
        // dd($request->all());
    // Lấy thông tin sản phẩm cần cập nhật
    $product = Products::find($id);
        // dd($request->brand);
    // Xử lý cập nhật ảnh mô tả nếu có
    if ($product) {
        $product->name = $request->name;
        $product->category_id = $request->parent_id;
        $product->description = $request->description;
        $product->brand_id = $request->brand;
        $product->price_sale = $request->price_sale;
        $product->price = $request->price;
        $product->slug = $request->slug;
    }
    // dd($product);
    $product->save();

    foreach ($request->colors as $item) {
        $colorModel = Product_colors::firstOrNew([
            'product_id' => $product->id,
            'color_id' => $item
        ]);
        $colorModel->save();
    }

    if($request->has('clothing_sizes')){
        foreach ($request->clothing_sizes as $item) {
            $sizeModel = Product_clothing_sizes::firstOrNew([
                'product_id' => $product->id,
                'clothing_size_id' => $item
            ]);
            $sizeModel->save();
        }
    }
    if($request->has('pant_sizes')){
        foreach ($request->pant_sizes as $item) {
            $sizeModel = Product_pant_sizes::firstOrNew([
                'product_id' => $product->id,
                'pant_size_id' => $item
            ]);
            $sizeModel->save();
        }
    }

    // Nếu có images thì xoá ảnh củ trong gallery và file
    if ($request->hasFile('images')) {
        // Xoá ảnh củ
        foreach($product->images as $item) {
            if (File::exists(public_path('site/img/gallery/' . $item->image))) {
                $gallery = Gallery::where('image', $item->image)->first();
                if ($gallery) {
                    $gallery->delete();
                    File::delete(public_path('site/img/gallery/' . $item->image));
                }
            }
        }
        // Upload ảnh mới
        $i = 1;
        foreach ($request->file('images') as $image) {
            $image->move(public_path('site/img/gallery'), $img_gallery = $request->slug . '-'.$i++.'.' . $image->getClientOriginalExtension());
            Gallery::create([
                'products_id'=>$product->id,
                'image' => $img_gallery
            ]);
        }

    return redirect()->route('admin.product')->with('success', 'Product updated successfully.');

    }
    return redirect()->route('admin.product');
    }


    public function delete($id){
        // dd($id);
        $product = Products::findOrFail($id);
        try {
            $product->delete();
            return redirect()->route('admin.product')->with('success', 'Xóa sản phẩm thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Xóa sản phẩm thất bại');
        }
    }


}
