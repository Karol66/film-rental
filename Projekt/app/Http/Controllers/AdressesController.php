<?php

namespace App\Http\Controllers;

use App\Models\Adresses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdressesController extends Controller
{
    /**
     * Display a listing of the addresses.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $userId = Auth::id();

        // Fetch the addresses for the user
        $addresses = Adresses::withTrashed()->where('id_user', $userId)->get();

        return view('shop.adresses', compact('addresses'));
    }


    /**
     * Show the form for creating a new address.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shop.create');
    }

    /**
     * Store a newly created address in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'street' => 'required|string',
            'home_number' => 'required|numeric',
            'apartment_number' => 'nullable|string',
            'city' => 'required|string',
        ], [
            'home_number.numeric' => 'The home number must be a number.',
        ]);

        $addressData = $request->all();
        $addressData['id_user'] = Auth::id();

        try {
            Adresses::create($addressData);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['general' => 'An error occurred while creating the address. Please try again.']);
        }

        return redirect()->route('addresses.index')->with('success', 'Address created successfully.');
    }
    /**
     * Show the form for editing the specified address.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        $address = Adresses::findOrFail($id);
        return view('shop.edit', compact('address'));
    }

    /**
     * Update the specified address in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $address = Adresses::findOrFail($id);

        $validator = $request->validate([
            'street' => 'required|string',
            'home_number' => 'required|numeric',
            'apartment_number' => 'nullable|string',
            'city' => 'required|string',
        ], [
            'home_number.numeric' => 'The home number must be a number.',
        ]);

        $address->update($request->all());

        return redirect()->route('addresses.index')->with('success', 'Address updated successfully.');
    }
    /**
     * Remove the specified address from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $address = Adresses::findOrFail($id);

        $address->delete();

        return redirect()->route('addresses.index')->with('flash_message', 'Address deleted successfully.');
    }

    public function restore($id)
    {
        $address = Adresses::withTrashed()->find($id);

        if (!$address) {
            return redirect('/shop/account/addresses')->with('error', 'Address not found');
        }

        $address->restore();

        return redirect('/shop/account/addresses')->with('success', 'Address restored successfully');
    }
}
