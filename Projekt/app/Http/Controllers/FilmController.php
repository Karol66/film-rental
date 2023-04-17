<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film = Film::all();
        return view('film.index')->with('film', $film);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('film.create');
    }

    /**
     * Store a newly created resource in storage.
     */

//    public function store(Request $request)
// {
//     $input = $request->all();


//     $image = $request->file('image');
//     $imageData = file_get_contents("C:\Users\Admin\Desktop\Internet_Application_App\Projekt\public\img\alaska.jpg");
//         $base64Image = base64_encode($imageData);
//         $input["image"] = $imageData;


//     //  dd($input);

//     Film::create($input);
//     return redirect('film')->with('flash_message', 'Film Addedd!');
// }

//    public function store(Request $request)
// {
//     $input = $request->all();


//     $image = $request->file('image');
//     $imageData = file_get_contents($image->getRealPath());
//     $input['image'] = $imageData;


//     //  dd($input);

//     Film::create($input);
//     return redirect('film')->with('flash_message', 'Film Addedd!');
// }

public function store(Request $request)
{
    $input = $request->all();

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $image = $request->file('image');
        $imageData = file_get_contents($image->getRealPath());
        $input['image'] = $imageData;
    }

    // dd($input);

    Film::create($input);
    return redirect('film')->with('flash_message', 'Film Added!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::find($id);
        return view('film.show')->with('film', $film);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film = Film::find($id);
        return view('film.edit')->with('film', $film);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $film = Film::find($id);
        $input = $request->all();
        $film->update($input);
        return redirect('film')->with('flash_message', 'film Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Film::destroy($id);
        return redirect('film')->with('flash_message', 'Film deleted!');
    }

}
