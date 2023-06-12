<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\FilmType;
use App\Models\Item;
use App\Models\Transactions;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

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
        $film = Film::withTrashed(['filmType'])
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
        $filmTypes = FilmType::pluck('id')->toArray();

        $request->validate([
            'name' => 'required',
            'id_film_type' => 'required|in:' . implode(',', $filmTypes),
            'film_length' => 'required|numeric|min:0',
            'release_date' => 'required|date|after_or_equal:' . Carbon::createFromDate(1900, 1, 1)->format('Y-m-d') . '|before_or_equal:' . Carbon::now()->format('Y-m-d'),
            'country' => 'required|alpha',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image',
        ], [
            'id_film_type.required' => 'The Type field is required!',
            'id_film_type.in' => 'The selected Type is invalid!',
            'film_length.required' => 'The Film Length field is required!',
            'film_length.numeric' => 'The Film Length field must be a number!',
            'film_length.min' => 'The Film Length field must be a non-negative number!',
            'release_date.required' => 'The Release Date field is required!',
            'release_date.date' => 'The Release Date field must be a valid date!',
            'release_date.after_or_equal' => 'The Release Date field must be greater than or equal to 1900!',
            'release_date.before_or_equal' => 'The Release Date field cannot be a future date!',
            'country.required' => 'The Country field is required!',
            'country.alpha' => 'The Country field must contain only letters!',
            'price.required' => 'The Price field is required!',
            'price.numeric' => 'The Price field must be a number!',
            'price.min' => 'The Price field must be a non-negative number!',
            'image.required' => 'The Image field is required!',
            'image.image' => 'The Image must be a valid image file!',
        ]);

        $input = $request->all();

        $input['release_date'] = Carbon::parse($input['release_date']);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');

            // Skompresuj rozmiar zdjęcia do 350 KB
            $compressedImage = Image::make($image)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('jpg', 75); // Zmniejsz jakość do 75%

            // Konwertuj skompresowane zdjęcie do formatu Medium Blob
            $blobData = $compressedImage->getEncoded();

            $input['image'] = $blobData;
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
        return view('film.edit', compact('film', 'filmTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $film = Film::findOrFail($id);
        $filmTypes = FilmType::pluck('id')->toArray();

        $request->validate([
            'name' => 'required',
            'id_film_type' => 'required|in:' . implode(',', $filmTypes),
            'film_length' => 'required|numeric|min:0',
            'release_date' => 'required|date|after_or_equal:' . Carbon::createFromDate(1900, 1, 1)->format('Y-m-d') . '|before_or_equal:' . Carbon::now()->format('Y-m-d'),
            'country' => 'required|alpha',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image',
        ], [
            'id_film_type.required' => 'The Type field is required!',
            'id_film_type.in' => 'The selected Type is invalid!',
            'film_length.required' => 'The Film Length field is required!',
            'film_length.numeric' => 'The Film Length field must be a number!',
            'film_length.min' => 'The Film Length field must be a non-negative number!',
            'release_date.required' => 'The Release Date field is required!',
            'release_date.date' => 'The Release Date field must be a valid date!',
            'release_date.after_or_equal' => 'The Release Date field must be greater than or equal to 1900!',
            'release_date.before_or_equal' => 'The Release Date field cannot be a future date!',
            'country.required' => 'The Country field is required!',
            'country.alpha' => 'The Country field must contain only letters!',
            'price.required' => 'The Price field is required!',
            'price.numeric' => 'The Price field must be a number!',
            'price.min' => 'The Price field must be a non-negative number!',
            'image.required' => 'The Image field is required!',
            'image.image' => 'The Image must be a valid image file!',
        ]);

        $input = $request->all();

        $input['release_date'] = Carbon::parse($input['release_date']);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');

            // Skompresuj rozmiar zdjęcia do 350 KB
            $compressedImage = Image::make($image)
                ->resize(800, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('jpg', 75); // Zmniejsz jakość do 75%

            // Konwertuj skompresowane zdjęcie do formatu Medium Blob
            $blobData = $compressedImage->getEncoded();

            $input['image'] = $blobData;
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
            return redirect('film')->with('error', 'Film not found');
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
            'name' => 'required|alpha',
        ], [
            'name.alpha' => 'The Type field must not contain numbers.',
        ]);

        FilmType::create([
            'name' => $request->input('name'),
        ]);

        return redirect('film')->with('flash_message', 'Film type added successfully');
    }

    public function updateFilmType(Request $request)
    {
        $filmTypeId = $request->input('filmType');
        $newFilmType = $request->input('newFilmType');

        $filmType = FilmType::find($filmTypeId);
        if (!$filmType) {
            return redirect()->back()->withErrors(['error' => 'Film type not found.']);
        }

        $filmType->name = $newFilmType;
        $filmType->save();

        return redirect()->back()->with('success', 'Film type updated successfully.');
    }
}
