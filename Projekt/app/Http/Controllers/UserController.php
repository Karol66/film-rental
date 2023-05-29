<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index')->with('users', $users);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::findOrFail($id);
        return view('users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('users.edit')->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);
        $input = $request->except('password'); // Wyklucz pole 'password' z żądania
        $users->update($input);
        return redirect('users')->with('flash_message', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('users')->with('flash_message', 'User deleted!');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $users = User::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $users = User::paginate(10);
        }

        return view('users.index')->with('users', $users)->with('search', $search);
    }
}
