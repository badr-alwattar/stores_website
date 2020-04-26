<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use App\Product;
use App\User;
use App\Category;
use Auth;
class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('stores.create')->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'about_store' => 'required',
            // 'phone' => 'required',
            'category' => 'required'
            
        ]);
        $user = User::find(Auth::user()->id);
        $store = new Store();
        $store->name = $request->input('name');
        $store->phone = Auth::user()->phone;
        $store->store_user_id = $user->id;
        $store->store_hood_id = $user->hood_id;
        $store->about_store = $request->input('about_store');

        // $imagelink = "https://image.flaticon.com/icons/svg/2829/2829788.svg";
        $category = Category::find($request->input('category'));
            
        $store->store_image = $category->img;
        $store->save();
        

        $user->store_id = $store->id;
        $user->save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $store = Store::with(['product'])->get();
        
        $products = Product::where('store_id', $id)->get();
        // dd($products);
        return view('stores.show')->with('products', $products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::find($id);
        $categories = Category::all();
        return view('stores.edit')->with('store', $store)->with('categories', $categories);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'about_store' => 'required',
            // 'phone' => 'required',
            'category' => 'required'
            // 'img' => 'required',
        ]);
        $user = User::find(Auth::user()->id);
        $store = Store::find($id);
        $store->name = $request->input('name');
        $store->phone = Auth::user()->phone;
        $store->store_user_id = $user->id;
        $store->store_hood_id = $user->hood_id;
        $store->about_store = $request->input('about_store');
        
        $category = Category::find($request->input('category'));
        $store->store_image = $category->img;
        $store->save();
        
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find(Auth::user()->id);
        $user->store_id = null;
        $user->save();

        $store = Store::find($id);
        $store->delete();
        return redirect('/');
    }
}
