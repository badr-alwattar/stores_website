<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Neighborhood;
class UsersController extends Controller
{
    

    public function edit($id) {
        $user = Auth::user();
        $neighborhoods = Neighborhood::all();
        return view('users.edit')->with('user', $user)->with('neighborhoods', $neighborhoods);
    }


    public function update(Request $request) {
        

    }




}
