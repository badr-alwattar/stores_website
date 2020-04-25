<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    
    public function user()
    {
        return $this->belongsTo('App\User', 'store_id', 'id');
    }

    public function hood()
    {
        return $this->belongsTo('App\Neighborhood', 'store_hood_id', 'id');
    }

    public function product()
    {
        return $this->hasMany('App\Product');
    }
}
