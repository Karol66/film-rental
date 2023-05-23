@extends('film.layout')
@section('content')
    <div >
        <div class="card-header">
            <h3>Show Film</h3>
        </div>
        <div class="card-body">
            <div class="film-details">
                <div class="film-image">
                    <div class="image-wrapper">
                        <img src="data:image/jpeg;base64,{{ base64_encode($film->image) }}" alt="Film Image" class="film-img">
                    </div>
                </div>
                <div class="film-info">
                    <p class="card-text">Name: {{ $film->name }}</p>
                    <p class="card-text">Type: {{ $film->type }}</p>
                    <p class="card-text">Film Length: {{ $film->film_length }}</p>
                    <p class="card-text">Release Date: {{ $film->release_date }}</p>
                    <p class="card-text">Country: {{ $film->country }}</p>
                    <p class="card-text">Price: ${{ $film->price }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
