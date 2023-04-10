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

        // $user = Auth::user();
        // dd($user);

        $request->validate([
            'userName' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('userName', 'password');

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            return redirect()->route('index');
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }

    }

    function registrationPost(Request $request){
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'lastName' => 'required',
            'userName' => 'required',
            'password' => 'required',
        ]);

        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['lastName'] = $request->lastName;
        $data['userName'] = $request->userName;
        // $data['password'] = $request->password;
        $data['password'] = Hash::make($request->password);

        // $password = $request->input('password');
        // $hashedPassword = Hash::make($password);
        // $passwordLength = strlen($password);
        // $hashedPasswordLength = strlen($hashedPassword);
        // dd($passwordLength, $hashedPasswordLength);

        $users = User::create($data);

        if(!$users){
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
