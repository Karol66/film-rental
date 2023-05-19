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
    public function login()
    {
        return view('login');
    }

    public function registration()
    {
        return view('registration');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('user_name', 'password');

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

    public function registrationPost(Request $request)
    {
        $request->validate([
            'email' => 'email|unique:users',
            'password' => 'required|confirmed',
        ]);

        $data = $request->only('email', 'name', 'last_name', 'user_name', 'password');
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        if (!$user) {
            return redirect(route('registration'))->with("error", "Registration failed, please try again.");
        }

        return redirect(route('login'))->with("success", "Registration successful! Please login to access the app.");
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    public function update(Request $request, int $id)
    {
        $user = User::find($id);
        $validatedData = $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'user_name' => 'required',
            'password' => 'required|confirmed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $user->update($validatedData);

        return redirect('/shop/account')->with('flash_message', 'User Updated!');
    }
}
