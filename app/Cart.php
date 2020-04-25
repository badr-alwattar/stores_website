<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'cart_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')
        ->withPivot(
         'cart_id',
         'product_id',
         'count'   
        );
    }



}
