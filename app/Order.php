<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function payment()
    {
        return $this->belongsTo('App\Payment', 'order_payment_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')
        ->withPivot(
            'order_id',
            'product_id',
            'count'   
        );
        
    }


    public function users()
    {
        return $this->hasMany('App\User', 'user_id');
    }
}
