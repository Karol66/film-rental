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
        $addresses = Adresses::all();

        return view('shop.adresses', compact('addresses'));
    }

    /**
     * Show the form for creating a new address.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addresses.create');
    }

    /**
     * Store a newly created address in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'street' => 'required',
            'home_number' => 'required',
            'apartment_number' => 'nullable',
            'city' => 'required',
        ]);

        $addressData = $request->all();
        $addressData['id_user'] = Auth::id(); // Przypisanie ID aktualnie zalogowanego użytkownika

        Adresses::create($addressData);

        return redirect()->route('addresses.index')->with('success', 'Address created successfully.');
    }
    /**
     * Show the form for editing the specified address.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Adresses $address)
    {
        return view('addresses.edit', compact('address'));
    }

    /**
     * Update the specified address in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Adresses $address)
    {
        $request->validate([
            'street' => 'required',
            'home_number' => 'required',
            'apartment_number' => 'nullable',
            'city' => 'required',
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
    public function destroy(Adresses $address)
    {
        $address->delete();

        return redirect()->route('addresses.index')->with('success', 'Address deleted successfully.');
    }
}
