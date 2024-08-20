<?php

namespace App\Http\Controllers\userController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Colors;
use App\Models\Sizes;
use App\Models\Bills;
use App\Models\Products;
use App\Models\User;
// use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function addToCart(Request $request, Cart $cart){
        $products = Products::find($request->id);
        $cart->add($products,$request);
        return redirect()->route('cart.view');
    }
    public function view(Request $request){
        $user = Auth::user();
        $Itemcart = $user->carts;
        return view('user.page.cart',compact('Itemcart'));

    }
    public function deleteCart($id,Cart $cart){
        $cart->deleteItem($id);

        return redirect()->route('cart.view');

    }
    public function clearCart(Cart $cart){
        $cart->clearCart();
        return redirect()->route('cart.view');
    }
    // public function updateQuantity(Request $request, $id){
    //     dd($id);
    // }
    public function checkout(){
        $user = auth()->user();
        $Itemcart = $user->carts;
        return view('user.page.checkout',compact('user','Itemcart'));
    }
    public function bill(Request $request){
        // dd($request->all());
        $user = User::where('id',auth()->user()->id)->first();
        // dd($user->phone_number);
        if (empty($user->phone_number) && empty($user->address) ){
            $user->phone_number = $request->phone;
            $user->address = $request->address;
            $user->save();
            // dd('xin chào áđasad');
        }
        $bill = Bills::create([
            'user_id'=> $user->id,
            'total'=> $request->totalPrice,
            'note'=> $request->note,
            'status'=>1,
        ]);
        $cartItems = Cart::where('user_id',$user->id)->get();
        foreach($cartItems as $item){
            $bill->items()->create([
                'product_id'=>$item->product_id,
                'quantity'=>$item->quantity,
                'price'=>$item->price,
                'color'=>$item->color,
                'size'=>$item->size,
            ]);
            $item->delete();
        }
        return redirect()->route('cart.view')->with('success', 'Bạn đã đặt hàng thành công');


    }

}