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
    function login()
    {
        return view('login');
    }

    function registration()
    {
        return view('registration');
    }

    function loginPost(Request $request)
    {

        // $user = Auth::user();
        // dd($user);

        $request->validate([
            'user_name' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('user_name', 'password');

        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->is_admin == 1) {
                return redirect()->route('film.index');
            } else {
                return redirect()->route('shop.index');
            }
        } else {
            return redirect()->route('login')->with('error', 'Invalid credentials');
        }
    }

    function registrationPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'last_name' => 'required',
            'user_name' => 'required',
            'password' => 'required',
        ]);

        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['last_name'] = $request->last_name;
        $data['user_name'] = $request->use_name;
        $data['password'] = Hash::make($request->password);

        $users = User::create($data);

        if (!$users) {
            return redirect(route('registration'))->with("error", "registration fail, try again");
        }
        return redirect(route('login'))->with("succes", "Registraion succes, Login to acces the app");
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
