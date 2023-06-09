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
            'name' => 'required|alpha',
            'last_name' => 'required|alpha',
        ], [
            'name.alpha' => 'The name field must not contain numbers.',
            'last_name.alpha' => 'The last name field must not contain numbers.',
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

    public function changePasswordForm()
    {
        return view('shop.password_change');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'user_name' => 'required|unique:users,user_name,' . $user->id,
            'name' => 'required|alpha',
            'last_name' => 'required|alpha',
        ], [
            'name.alpha' => 'The name field must not contain numbers.',
            'last_name.alpha' => 'The last name field must not contain numbers.',
        ]);


        if (!Hash::check($validatedData['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Incorrect current password']);
        }

        $user->update([
            'password' => Hash::make($validatedData['new_password']),
            'email' => $validatedData['email'],
            'user_name' => $validatedData['user_name'],
            'name' => $validatedData['name'],
            'last_name' => $validatedData['last_name'],
        ]);

        return redirect('/shop/account')->with('flash_message', 'Account Updated!');
    }
}
