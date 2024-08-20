<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['quantity','size','color','user_id','product_id'];
    // public $items=[];
    // public $total_quantity=0;
    // public $total_price =0;

    public function __construct()
    {
        // $this->items=session('cart') ? session('cart'):[];
        // $this->totalQuantity = $this->getTotalQuantity();
        // $this->totalPrice = $this->getTotalPrice($cartItem);
    }

    // thểm mới sản phẩm vào giỏ
    public function add($products, $request)
    {
        $cartItem = Cart::where('user_id', auth()->user()->id)
                ->where('product_id', $products->id)
                ->where('color', $request->color)
                ->where('size', $request->size)
                ->first();

        if ($cartItem) {
            // Sản phẩm đã tồn tại, tăng số lượng
            $cartItem->increment('quantity', $request->quantity);
        } else {
            // Sản phẩm chưa tồn tại, tạo mới
            Cart::create([
                'product_id' => $products->id,
                'color' => $request->color,
                'size' => $request->size,
                'quantity' => $request->quantity,
                'user_id' => auth()->user()->id,
            ]);
        }

        return redirect()->route('cart.view')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }
    protected function getCartItemKey($product, $request)
    {
        return $product->id . '_' . $request->color . '_' . $request->size;
    }

    protected function storeCart()
    {
        session(['cart' => $this->items]);
    }
    public function deleteItem($id){

        $cartItem = Cart::find($id);
        $cartItem->delete();
    }
    public function clearCart(){
        Cart::where('user_id', auth()->id())->delete();
    }
    public function getTotalPrice($cartItem)
    {
        $total = 0;

        foreach ($cartItem as $item) {
            $price = $item->product->price_sale > 0 ? $item->product->price_sale : $item->product->price;
            $total += $item->quantity * $price;
        }
        return $total;
    }

    public function getTotalQuantity($cartItem)
    {
        $total = 0;
        foreach ($cartItem as $item) {
            $total += $item->quantity;
        }
        return $total;
    }
        // Belongs to User
        public function user()
        {
            return $this->belongsTo(User::class);
        }

        // Belongs to Product
        public function product()
        {
            return $this->belongsTo(Products::class,'product_id');
        }
    }