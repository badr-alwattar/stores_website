<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:12', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'hood' => ['required'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data['role']);
        $user = User::create([
            'name' => $data['name'],
            // 'email' => 'example@gmail.com ',
            'password' => Hash::make($data['password']),
            'hood_id' => $data['hood'],
            'phone' => $data['phone']
            
        ]);

        // don't forget the hoods
        if($data['role'] == "buyer") {
        
            $user->role_id = '1';
            $cart = new Cart();
            $cart->cart_user_id = $user->id;
            $cart->save();
            $user->cart_id = $cart->id;
            $user->save();
            return $user;
        } else if($data['role'] == "supplier") {
            
            $user->role_id = '2';
            $user->save();

            
        } else if($data['role'] == "delivery") {
            $user->role_id = '4';
            $user->save();

           
        }

        return $user;
        
    }
}
