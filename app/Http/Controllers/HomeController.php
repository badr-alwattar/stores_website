<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
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

        }

        return view('dashboard.home');
    }
}
