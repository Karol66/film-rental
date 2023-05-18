<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    /**
     * Display the index page.
     */
    public function index()
    {
        return view('shop.index');
    }

    /**
     * Display the films page.
     */
    public function films()
    {
        $films = Film::paginate(10);
        return view('shop.films', compact('films'));
    }

    /**
     * Display the account page.
     */
    public function account()
    {
        return view('shop.account');
    }

    /**
     * Display the basket page.
     */
    public function basket()
    {
        return view('shop.basket');
    }

    /**
     * Add a film to the basket.
     */

     public function addToBasket(Request $request, $id)
     {
         $film = Film::findOrFail($id);

         $quantity = $request->input('quantity');

         $basket = session()->get('basket', []);

         if (isset($basket[$id])) {
             $basket[$id]['quantity'] += $quantity;
         } else {
             $basket[$id] = [
                 "name" => $film->name,
                 "price" => $film->price,
                 "quantity" => $quantity
             ];
         }

         session()->put('basket', $basket);
         return redirect()->back()->with('success', 'Film added to basket successfully!');
     }

     public function update(Request $request, $id)
     {
         $film = Film::findOrFail($id);

         $quantity = $request->input('quantity'); // Pobierz wartość wpisaną w polu tekstowym

         $basket = session()->get('basket', []);

         $basket[$id] = [
             "name" => $film->name,
             "price" => $film->price,
             "quantity" => $quantity
         ];

         session()->put('basket', $basket);
         return redirect()->back()->with('success', 'Film added to basket successfully!');
     }
    /**
     * Remove a film from the basket.
     */
    public function remove(Request $request)
    {
        $filmId = $request->input('id');
        $basket = session()->get('basket');

        if (isset($basket[$filmId])) {
            unset($basket[$filmId]);
            session()->put('basket', $basket);
        }

        return redirect()->route('shop.basket');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $film = Film::where('name', 'like', '%' . $search . '%')->get();
        } else {
            $film = Film::all();
        }

        return view('shop.films')->with('films', $film)->with('search', $search);
    }
}
