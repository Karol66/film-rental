<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;
use App\Models\Adresses;
use App\Models\Transactions;


class ShopController extends Controller
{
    /**
     * Display the index page.
     */
    public function index()
    {
        $films = Film::orderBy('id', 'desc')->take(20)->get();
        return view('shop.index')->with('films', $films);
    }

    public function index_home()
    {
        $films = Film::orderBy('id', 'desc')->get();
        return view('index')->with('films', $films);
    }
    // ->take(6)

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
        $userId = Auth::id();

        // Fetch the transactions for the user
        $transactions = Transactions::where('id_user', $userId)->get();

        return view('shop.account', compact('transactions'));
        // return view('shop.account');
    }

    /**
     * Display the basket page.
     */
    public function basket()
    {
        $user = Auth::user();
        $addresses = Adresses::where('id_user', $user->id)->get();
        return view('shop.basket', compact('addresses'));
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

        $quantity = $request->input('quantity');

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
     * Delete a film from the basket.
     */
    public function delete(Request $request)
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
            $film = Film::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $film = Film::paginate(10);
        }

        return view('shop.films')->with('films', $film)->with('search', $search);
    }

    public function pay(Request $request)
    {
        $addressId = $request->input('address_id');
        $user = Auth::user();

        $basket = session()->get('basket');
        $total = 0;
        $filmCount = 0;

        foreach ($basket as $id => $details) {
            $total += $details['price'] * $details['quantity'];
            $filmCount += $details['quantity'];
        }

        if ($total >= 100) {
            $discount = $total * 0.05;
            $total -= $discount;
        }

        $previousTransactions = Transactions::where('id_user', $user->id)->get();

        $previousFilmCount = 0;
        foreach ($previousTransactions as $transaction) {
            $previousFilmCount += $transaction->quantity;
        }

        $totalFilmCount = $filmCount + $previousFilmCount;

        if ($totalFilmCount >= 200) {
            $discount = ($basket[$id]['price'] * 0.03);
            $total -= $discount;
        }

        if ($previousTransactions->isEmpty()) {
            $discount = $total * 0.2;
            $total -= $discount;
        }

        $transaction = new Transactions();
        $transaction->id_user = $user->id;
        $transaction->id_adresses = $addressId;
        $transaction->price = $total;
        $transaction->quantity = $filmCount;
        $transaction->save();

        foreach ($basket as $id => $details) {
            $transaction->item()->create([
                'id_film' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
                'id_transaction' => $transaction->id,
            ]);
        }

        session()->forget('basket');

        return redirect()->route('shop.index')->with('success', 'Payment successful! Transaction added to the database.');
    }
}
