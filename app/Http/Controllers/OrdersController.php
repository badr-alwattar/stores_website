<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\User;
use App\Product;
use DB;
class OrdersController extends Controller
{
    



    public function show() {
        
        $products = Order::where('user_id', Auth::user()->id)->latest()->first()->products;
        $user = User::find(Auth::user()->id);
        $order = Order::find($products[0]->pivot->order_id);

        return view('orders.show')->with('products', $products)->with('user',$user)->with('order', $order);
    }

    public function all($id) {  
        $orders = Order::with('users')->where('user_id', $id)->get();
        // dd($orders[0]->users[0]->name);
        return view('orders.all')->with('orders', $orders);
    }



    public function addProduct(Request $requset ) {

        
        $product = Product::find($requset->input('product-id'));

        $old_one = DB::table('order_product')
            ->where('order_product.product_id','=',$requset->input('product-id'))
            ->where('order_product.order_id','=',$requset->input('order-id'))
            ->first();
        

        if($old_one == null) {
            $product->orders()->attach($requset->input('order-id'));
            
        } else {
            $num = $old_one->count + 1;
            
            $old_one = DB::table('order_product')
            ->where('order_product.product_id','=',$requset->input('product-id'))
            ->where('order_product.order_id','=',$requset->input('order-id'))
            ->update(['count' => $num]);
            
            $order = Order::find($requset->input('order-id'));
            // dd($order);
            $order->total = $order->total + $product->price;
            $order->save();
        }

        

        
        return back();
        

    }


    public function removeProduct(Request $requset ) {

        

        $product = Product::find($requset->input('product-id'));
        // dd($product);
        $old_one = DB::table('order_product')
            ->where('order_product.product_id','=',$requset->input('product-id'))
            ->where('order_product.order_id','=',$requset->input('order-id'))
            ->first();

            

        if($old_one == null) {
            $product->orders()->attach($requset->input('order-id'));
            
        } else {
            $num = $old_one->count - 1;
            
            $old_one = DB::table('order_product')
            ->where('order_product.product_id','=',$requset->input('product-id'))
            ->where('order_product.order_id','=',$requset->input('order-id'))
            ->update(['count' => $num]);

            $order = Order::find($requset->input('order-id'));
            $order->total = $order->total - $product->price;
            $order->save();
            
            
        }
        
        return back();
        

    }


    public function deleteProduct(Request $requset ) {

        

        // $product = Product::find($requset->input('product-id'));

        $old_one = DB::table('order_product')
            ->where('order_product.product_id','=',$requset->input('product-id'))
            ->where('order_product.order_id','=',$requset->input('order-id'))
            ->delete();
        
        
        return back();
        

    }


    public function confirm(Request $request) {

        $this->validate($request, [
            'address' => 'required'
        ]);

        $order = Order::find($request->input('order-id'));
        $order->status = "pending";
        $order->save();

        $old_one = DB::table('cart_product')
            // ->where('cart_product.product_id','=',$request->input('product-id'))
            ->where('cart_product.cart_id','=',Auth::user()->cart_id)
            ->delete();
        
        // dd($old_one);
        return redirect('/');

    }


    public function cancel(Request $request) {

        $order = Order::destroy($request->input('order-id'));
        return redirect('/');

    }



    public function delivery() {
        $all = Order::with('users')->get();
        $orders = [];
        foreach ($all as $order) {
            foreach($order->users as $index) {
                if($index->hood_id == Auth::user()->hood_id) {
                    array_push($orders, $order);
                }
            }
        }

        return view('dashboard.delivery')->with('orders', $orders);
    }
}
