<?php

namespace App\Providers;
use App\Models\Cart;
use App\Models\Colors;
use App\Models\Bills;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*',function($view){
            $user = Auth::user();
            // $bills = Bills::with('user','items.product')->get();
            if($user){
                // dd($user->carts);
                $cart = $user->carts;
                $view->with('cart',$cart);
            }
            // $bill= '';
            // $view->with('bills',$bills,$bill);


        });
        Paginator::useBootstrap();
    }
}
