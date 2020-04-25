<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function store()
    {
        return $this->belongsTo('App\Store', 'store_hood_id', 'id');
    }

    public function carts()
    {
        return $this->belongsToMany('App\Cart')
        ->withPivot(
            'cart_id',
            'product_id',
            'count'   
           );
    }


    


    public function orders()
    {
        return $this->belongsToMany('App\Order')
        ->withPivot(
            'order_id',
            'product_id',
            'count'   
           );
        
    }
}
