@extends('film.layout')
@section('content')
    <style>
    </style>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">View Film</h1>
        </div>
        <div class="card-body">
            <div class="film-details">
                <div class="film-image">
                    <div class="image-wrapper">
                        <img src="data:image/jpeg;base64,{{ base64_encode($film->image) }}" alt="Film Image" class="film-img">
                    </div>
                </div>
                <div class="film-info">
                    <p class="card-text"><strong>Name:</strong> {{ $film->name }}</p>
                    <p class="card-text"><strong>Type:</strong> {{ $film->type }}</p>
                    <p class="card-text"><strong>Film Length:</strong> {{ $film->film_length }}</p>
                    <p class="card-text"><strong>Release Date:</strong> {{ $film->release_date }}</p>
                    <p class="card-text"><strong>Country:</strong> {{ $film->country }}</p>
                    <p class="card-text"><strong>Price:</strong> ${{ $film->price }}</p>

                </div>
            </div>
        </div>
    </main>
@endsection
