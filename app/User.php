<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password', 'hood_id', 'role_id', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];



    public function role()
    {
        return $this->belongsTo('App\Role', 'role_user_id', 'id');
    }

    public function hood()
    {
        return $this->belongsTo('App\Neighborhood', 'hood_user_id', 'id');
    }

    public function cart()
    {
        return $this->belongsTo('App\Cart', 'cart_user_id', 'id');
    }

    public function store()
    {
        return $this->belongsTo('App\Store', 'store_user_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo('App\Product', 'user_id');
    }

    public function orders()
    {
        return $this->belongsTo('App\Order');
    }

}
