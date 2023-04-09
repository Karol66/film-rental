<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error", "Login details are incorrect");
    }

    function registrationPost(Request $request){
        $request->validate([
            'email' => 'required|email|unique:user',
            'name' => 'required',
            'lastName' => 'required',
            'userName' => 'required',
            'password' => 'required'
        ]);

        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['lastName'] = $request->lastName;
        $data['userName'] = $request->userName;
        $data['password'] = $request->password;
        // $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return redirect(route('registration'))->with("error", "registration fail, try again");
        }
        return redirect(route('login'))->with("succes", "Registraion succes, Login to acces the app");
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
