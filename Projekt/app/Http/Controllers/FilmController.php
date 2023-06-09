<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\FilmType;
use App\Models\Item;
use App\Models\Transactions;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $startDate = Carbon::now()->subWeek();
        $endDate = Carbon::now();

        $transactions = Transactions::whereBetween('created_at', [$startDate, $endDate])->paginate(10);

        $allTransactions = Transactions::whereBetween('created_at', [$startDate, $endDate])->get();

        return view('film.index')->with([
            'transactions' => $transactions,
            'allTransactions' => $allTransactions,
        ]);
    }

    public function film()
    {
        $film = Film::with(['filmType'])
            ->paginate(10);

        return view('film.films')->with('film', $film);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $filmTypes = FilmType::all();
        return view('film.create', compact('filmTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'id_film_type' => 'required',
        'film_length' => 'required|numeric',
        'release_date' => 'required',
        'country' => 'required',
        'price' => 'required|numeric',
        'image' => 'required|image',
    ], [
        'film_length.numeric' => 'The Film Length field must be a number!',
        'price.numeric' => 'The Price field must be a number!',
    ]);

    $input = $request->all();

    $input['release_date'] = Carbon::parse($input['release_date']);

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $image = $request->file('image');
        $imageData = file_get_contents($image->getRealPath());
        $input['image'] = $imageData;
    }

    Film::create($input);
    return redirect('film')->with('flash_message', 'Film Added!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::findOrFail($id);
        return view('film.show')->with('film', $film);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $filmTypes = FilmType::all();
        $film = Film::findOrFail($id);
        return view('film.edit', compact('film','filmTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $film = Film::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'id_film_type' => 'required',
            'film_length' => 'required|numeric',
            'release_date' => 'required',
            'country' => 'required',
            'price' => 'required|numeric',
            'image' => 'image',
        ], [
            'film_length.numeric' => 'The Film Length field must be a number!',
            'price.numeric' => 'The Price field must be a number!',
        ]);

        $input = $request->all();

        $input['release_date'] = Carbon::parse($input['release_date']);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageData = file_get_contents($image->getRealPath());
            $input['image'] = $imageData;
        }

        $film->update($input);

        return redirect('film')->with('flash_message', 'Film Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::findOrFail($id);

        $film->delete();

        return redirect('film')->with('flash_message', 'Film deleted!');
    }

    public function restore($id)
    {
        $film = Film::withTrashed()->find($id);

        if (!$film) {
            return redirect('shop.')->with('error', 'Film not found');
        }

        $film->restore();

        return redirect('film')->with('success', 'Film restored successfully');
    }

    /**
     * Search for film.
     */
    public function search(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $film = Film::where('name', 'like', '%' . $search . '%')->paginate(10);
        } else {
            $film = Film::paginate(10);
        }

        return view('film.films')->with('film', $film)->with('search', $search);
    }

    public function storeFilmType(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        FilmType::create([
            'name' => $request->input('name'),
        ]);

        return redirect('film')->with('flash_message', 'Film type added successfully');
    }
}
