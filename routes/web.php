<?php
use App\Http\Controllers\adminController\AdminController;
use App\Http\Controllers\adminController\CategoryController;
use App\Http\Controllers\adminController\ProductController;
use App\Http\Controllers\adminController\BillController;
use App\Http\Controllers\adminController\PostController;

use App\Http\Controllers\userController\UserController;
use App\Http\Controllers\userController\HomeController;
use App\Http\Controllers\userController\FunctionController;
use App\Http\Controllers\userController\CartController;


use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->name('user.home');
Route::get('/home/category={category_id}',[HomeController::class,'getproductByCategoryatHome'])->name('user.home');
Route::get('/home',[HomeController::class,'index'])->name('user.home');
Route::get('/about',[HomeController::class,'about'])->name('user.about');
Route::get('/shop',[HomeController::class,'shop'])->name('user.shop');
Route::get('/shop/category={category_id}',[HomeController::class,'getproductByCategory'])->name('shop.category');
Route::get('/detail/{products_id}',[HomeController::class,'detail'])->name('detail');

Route::get('/shop/search', [FunctionController::class, 'getproductBySearch'])->name('shop.search');
Route::get('/shop/sort', [FunctionController::class, 'sort'])->name('shop.sort');
Route::get('/shop/filter', [FunctionController::class, 'filter'])->name('shop.filter');

Route::group(['prefix'=>'cart'],function(){
    Route::get('/',[CartController::class, 'view'])->name('cart.view');
    Route::post('/add/{product}',[CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/delete/{id}',[CartController::class, 'deleteCart'])->name('cart.delete');
    Route::get('/clear',[CartController::class, 'clearCart'])->name('cart.clear');
    Route::get('/update',[CartController::class, 'updateQuantity'])->name('cart.update');
    Route::get('/checkout',[CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/bill',[CartController::class, 'bill'])->name('cart.bill');
});

Route::group(['prefix'=>'account'],function(){
    Route::get('/contact',[HomeController::class,'contact'])->name('user.contact');
    Route::get('/register',[UserController::class,'register'])->name('user.register');
    Route::post('/register',[UserController::class,'postRegister']);
    Route::get('/myaccount',[UserController::class,'myaccount'])->name('user.myaccount');
    Route::get('/myaccount/bills',[UserController::class,'bills'])->name('user.bill');
    Route::get('/myaccount/bills/{id}',[UserController::class,'showbills'])->name('user.show');
    Route::get('/myaccount/bills/{id}/cancel',[UserController::class,'billcancel'])->name('user.billcancel');
    Route::post('/myaccount/update',[UserController::class,'updateAccount'])->name('user.update');
    Route::get('/login',[UserController::class,'login'])->name('user.login');
    Route::post('/login',[UserController::class,'postlogin']);
    Route::get('/logout',[UserController::class,'logout'])->name('user.logout');
    Route::get('/favorite/{product}',[UserController::class,'addfavorite'])->name('user.addfavorite');
    Route::get('/favorite',[UserController::class,'favorite'])->name('user.favorite');
});



Route::get('/forgotpassword',[UserController::class,'forgotpassword'])->name('user.forgotpassword');


Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    Route::get('/category', [CategoryController::class,'index'])->name('admin.category');
    Route::get('/category/category_add',[CategoryController::class,'add'])->name('admin.category.add');
    Route::post('/category/category_store',[CategoryController::class,'store'])->name('admin.category.store');
    Route::get('/category/{category_id}/edit',[CategoryController::class,'edit'])->name('admin.category.edit');
    Route::post('/category/{category_id}/update',[CategoryController::class,'update'])->name('admin.category.update');
    Route::get('/category/{category_id}/delete',[CategoryController::class,'delete'])->name('admin.category.delete');

    Route::get('/product',[ProductController::class,'index'])->name('admin.product');
    Route::get('/product/product_add',[ProductController::class,'add'])->name('admin.product.add');
    Route::get('/product/{products_id}/edit',[ProductController::class,'edit'])->name('admin.product.edit');
    Route::post('/product/{products_id}/update',[ProductController::class,'update'])->name('admin.product.update');

    Route::post('/product/product_store',[ProductController::class,'store'])->name('admin.product.store');
    Route::get('/product/{products_id}/delete',[ProductController::class,'delete'])->name('admin.product.delete');

    Route::get('/bill',[BillController::class,'view'])->name('admin.bill');
    Route::get('/bill/{bill_id}/cancel',[BillController::class, 'cancel'])->name('admin.bill.cancel');
    Route::get('/bill/{bill_id}/accept',[BillController::class, 'accept'])->name('admin.bill.accept');
    Route::get('/bill/{bill_id}/deliver',[BillController::class, 'deliver'])->name('admin.bill.deliver');
    Route::get('/bill/{bill_id}/complete',[BillController::class, 'complete'])->name('admin.bill.complete');

    Route::get('/postsAll', [PostController::class,'index'])->name('admin.postAll');
    Route::get('/post', [PostController::class,'hien'])->name('admin.posttt');
    Route::post('/posts/find',[PostController::class,'show'])->name('posts.show');
    Route::post('/posts/update',[PostController::class,'update'])->name('posts.update');
    Route::post('/posts/strore',[PostController::class,'store'])->name('posts.store');
    Route::post('/posts/destroy',[PostController::class,'destroy'])->name('posts.destroy');
});
Route::get('/admin/editcategories',[AdminController::class,'editcategories'])->name('admin.editcategories');
Route::get('/admin/evaluatemanage',[AdminController::class,'evaluatemanage'])->name('admin.evaluatemanage');
Route::get('/admin/usermanage',[AdminController::class,'usermanage'])->name('admin.usermanage');