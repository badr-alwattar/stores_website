<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\User;
class OrdersController extends Controller
{
    



    public function show() {
        
        $products = Order::where('user_id', Auth::user()->id)->latest()->first()->products;
        foreach($products as $product) {
            foreach($product->orders as $order) {
                $user = User::find($order->user_id);
                break;
            }
        break;
        }

        return view('orders.show')->with('products', $products)->with('user',$user);
    }
}
