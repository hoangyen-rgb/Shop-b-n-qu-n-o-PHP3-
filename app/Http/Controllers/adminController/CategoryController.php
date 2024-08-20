<?php

namespace App\Http\Controllers\adminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Brands;
use App\Models\Gallery;


class CategoryController extends Controller
{

    public function index(){
        $categories = Categories::with('parent:id,name')->paginate(10);
        return view('admin.page.categories',compact('categories'),[
            'view'=>'admin.page.custom-pagination',
        ]);
    }

    public function add(){
        $categories=Categories::all();
        return view('admin.page.add_category',compact('categories'));
    }

    public function store(StoreCategoryRequest $request){
        // dd($request->all());
       try{
        Categories::create($request->all());
        return redirect()->route('admin.category')->with('sucssec','Thêm mới thành công');
       }catch(\Throwable $th){
        return redirect()->back()->with('error','Thêm mới thất bại');
       }
    }
    public function edit($id){
        // dd($category->all());
        $category = Categories::where('id', $id)->first();
        $categories=Categories::all();
        return view('admin.page.edit_category',compact('category','categories'));
    }

    public function update(UpdateCategoryRequest $request,Categories $category)
    {
        // dd($request->all());
        try {
            $category->update($request->all());
            return redirect()->route('admin.category')->with('success', 'Cập nhật danh mục thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Cập nhật danh mục thất bại');
        }
    }

    public function delete($id)
{
    // dd($id);
    $category = Categories::findOrFail($id);
    try {
        $category->delete();
        return redirect()->route('admin.category')->with('success', 'Xóa danh mục thành công');
    } catch (\Throwable $th) {
        return redirect()->back()->with('error', 'Xóa danh mục thất bại');
    }
}


}
