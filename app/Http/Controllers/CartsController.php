<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Order;
use App\User;
use DB;
use Auth;

class CartsController extends Controller
{
    public function show($id) {

        $products = Cart::find($id)->products;
        // dd($cart->products);
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $showcart = "show";
        foreach ($orders as $order) {
            if($order->status == null) {
                $showcart = "hide";
                break; 
            }
        }
        // dd($showcart);
        return view('carts.show')->with('products', $products)->with('showcart', $showcart);
    }


    public function addProduct(Request $requset ) {

        
        $product = Product::find($requset->input('id'));

        $old_one = DB::table('cart_product')
            ->where('cart_product.product_id','=',$requset->input('id'))
            ->where('cart_product.cart_id','=',Auth::user()->cart_id)
            ->first();
        

        if($old_one == null) {
            $product->carts()->attach(Auth::user()->cart_id);
            
        } else {
            $num = $old_one->count + 1;
            
            $old_one = DB::table('cart_product')
            ->where('cart_product.product_id','=',$requset->input('id')) 
            ->where('cart_product.cart_id','=',Auth::user()->cart_id)
            ->update(['count' => $num]);
            
        }

        

        // $res = DB::table('cart_product')->insert(
        //     ['cart_id' => Auth::user()->cart_id,
        //      'product_id' => $requset->input('id')
        //     ]
        // );

        // dd($product);

        return back();
        

    }

    public function removeProduct(Request $requset ) {

        

        $product=DB::table('cart_product')
            ->where('cart_product.product_id','=',$requset->input('id'))
            ->where('cart_product.cart_id', '=', Auth::user()->cart_id)
            ->first();
        
        if($product->count > 1) {
            $num = $product->count - 1;
            
            $product = DB::table('cart_product')
            ->where('cart_product.product_id','=',$requset->input('id')) 
            ->where('cart_product.cart_id','=',Auth::user()->cart_id)
            ->update(['count' => $num]);

        } else {
            $product=DB::table('cart_product')
            ->where('cart_product.product_id','=',$requset->input('id'))
            ->where('cart_product.cart_id', '=', Auth::user()->cart_id)
            ->delete();
        }

        // dd($product);
        return back();
        

    }


    public function checkout(Request $requset) {
        
        $products = Cart::find($requset->input('id'))->products;
        $total = 0;
        foreach($products as $product) {
            for ($i = 0; $i < $product->pivot->count; $i++){
                $total = $total + $product->price;
            }
        }
        
        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->total = $total;
        $order->save();
        foreach($products as $product) {

            $order_product = DB::table('order_product')->insert(
                ['order_id' => $order->id,
                 'product_id' => $product->id,
                 'count' => $product->pivot->count]
            );
        }
        $products = null;

        $products = Order::find($order->id)->products;
        // dd($products);
        foreach($products as $product) {
            foreach($product->orders as $order) {
                $user = User::find($order->user_id);
                break;
            }
        break;
        }


        // dd($products);
        return redirect('/orders/show')->with('products', $products)->with('user',$user)->with('order', $order);
    }



    public function deleteProduct(Request $requset ) {

        

        // $product = Product::find($requset->input('product-id'));
        $product=DB::table('cart_product')
        ->where('cart_product.product_id','=',$requset->input('product-id'))
        ->where('cart_product.cart_id', '=', Auth::user()->cart_id)
        ->delete();

        return back();
        

    }
}
