<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transactions::with('addresses')->paginate(10);
        return view('film.transactions')->with('transactions', $transactions);
    }

}
