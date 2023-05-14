<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;


class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('shop.index');
    }

    public function films()
    {
        $film = Film::all();
        return view('shop.films')->with('film', $film);
    }

    public function account()
    {
        return view('shop.account');
    }

    public function basket()
    {
        return view('basket');
    }

    public function addToBasket($id)
    {
        $film = Film::findOrFail($id);

        $basket = session()->get('basket', []);

        if (isset($basket[$id])) {
            $basket[$id]['quantity']++;
        } else {
            $basket[$id] = [
                "name" => $film->name,
                "image" => $film->image,
                "price" => $film->price,
                "quantity" => 1
            ];
        }

        session()->put('basket', $basket);
        return redirect()->back()->with('success', 'Product add to basket successfully!');
    }

    public function baskett()
    {
        return view('shop.basket');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
