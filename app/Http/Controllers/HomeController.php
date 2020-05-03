<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Order;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $auth = Auth::user();
        if($auth->role_id == 1) { // buyer
            $stores = Store::where('store_hood_id', $auth->hood_id)->get();
            return view('dashboard.home')->with('stores', $stores);
            // dd($stores);

        } else if($auth->role_id == 2) {

        } else if($auth->role_id == 3) {

        } else if($auth->role_id == 4) {
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

        return view('dashboard.home');
    }
}
