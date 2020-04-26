<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Auth;
class ProductsController extends Controller
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
        return view('products.create');
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
            'price' => 'required',
            'description' => 'required',
            'state' => 'required',
            'img' => 'required | file | image | max:1000',
            'instock' => 'required'
        ]);

        $product = new Product();
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->instock = $request->input('instock');
        $product->store_id = Auth::user()->store_id;

        if ($request->has('img')) {
            
            $product->img = $request->file('img')->store('public/products_images');
            $product->img = substr($product->img, 7, strlen($product->img));
            
            
        } 

        switch ($request->input('state')) {
            case '0':
                $product->state = "Available";
                break;
            case '1':
                $product->state = "Sold out";
                break;
            case '2':
                $product->state = "Coming Soon";
                break;        
        }

        $product->save();

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
        $product = Product::find($id);
        return view('products.show')->with('product', $product);
    }


    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products.edit')->with('product', $product);
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
            'price' => 'required',
            'description' => 'required',
            'state' => 'required',
            'img' => ' file | image | max:1000',
            'instock' => 'required'
        ]);
        
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->instock = $request->input('instock');
        $product->store_id = Auth::user()->store_id;


        if ($request->has('img')) {

            if( $product->img != null) {
                Storage::delete('public/' . $product->img);
            }
            
            $product->img = $request->file('img')->store('public/products_images');
            $product->img = substr($product->img, 7, strlen($product->img));   
        }
        
        

        switch ($request->input('state')) {
            case '0':
                $product->state = "Available";
                break;
            case '1':
                $product->state = "Sold out";
                break;
            case '2':
                $product->state = "Coming Soon";
                break;        
        }

        $product->save();
        
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
        $product = Product::find($id);
        $product->delete();
        return redirect('/');
    }
}
