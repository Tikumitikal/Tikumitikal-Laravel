<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use Auth;
class UserController extends Controller
{
    //
    function register(Request $req)
    {
        $user = new users;
        $user->name=$req->name;
        $user->email=$req->email;
        $user->phone=$req->phone;
        $user->password=$req->password;
        $user->save();
        return redirect('/login');
    }

    function login(Request $req){
        if(Auth::attempt($req->only('email','password'))){
            return redirect('/');
        }
        return redirect('/');
    }
}
