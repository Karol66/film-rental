<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Adresses;
use App\Models\Transactions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::withTrashed()->paginate(10);
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

        $request->validate([
            'name' => 'alpha',
            'last_name' => 'alpha',
            'is_admin' => Rule::in([0, 1]),
        ], [
            'name.alpha' => 'The first name may only contain letters.',
            'last_name.alpha' => 'The last name may only contain letters.',
            'is_admin.in' => 'The is admin field must be either 0 or 1.',
        ]);

        $input = $request->except('password');
        $users->update($input);
        return redirect('users')->with('flash_message', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->adresses()->delete();

        Adresses::where('id_user', $id)->update(['id_user' => null]);

        $user->transactions()->delete();

        Transactions::where('id_user', $id)->update(['id_user' => null]);

        User::destroy($id);
        return redirect('users')->with('flash_message', 'User deleted!');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);

        if (!$user) {
            return redirect('film')->with('error', 'Film not found');
        }

        $user->restore();

        return redirect('film')->with('success', 'Film restored successfully');
    }
}
