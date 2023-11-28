<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Models\Cart;
use App\Models\Cart_detail;
use Session;

class CartSession 
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $count = 0;
        if(session()->get('id')){

            $member_id = session()->get('id');
            $cart = Cart::where('member_id',$member_id)->where('status',1)->first();
            if($cart){
                $count = Cart_detail::where('cart_id',$cart->id)->sum('quantity');
            }
        }else{
            $session_id = Session::getId();
            $cart = Cart::where('session_id',$session_id)->where('status',1)->first();
            if($cart){
                $count = Cart_detail::where('cart_id',$cart->id)->sum('quantity');
            }
        }
        if(session()->has('currency_change')){
            $currency_change = session()->get('currency_change');
            $currency_value = 13681.72;
        }else{
            $currency_change = 'IDR';
            $currency_value = 1;
        }
        view()->share('cart_count', $count);
        view()->share('currency_change', $currency_change);
        view()->share('currency_value', $currency_value);
        return $next($request);
    }
}
