<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function registration(){
        return view('registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'userName' => 'required',
            'password' => 'required'
        ]);

        $credencials = $request->only('userName', 'password');
        if(Auth::attempt($credencials)){
            return redirect()->intended(route('home'))->with("succes", "Login details are correct");
        }
        return redirect(route('login'))->with("error", "Login details are incorrect");
    }
}
