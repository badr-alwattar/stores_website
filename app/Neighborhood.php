<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Neighborhood extends Model
{
    public function user()
    {
        return $this->hasMany('App\User');
    }

    public function store()
    {
        return $this->hasMany('App\Store');
    }
}
