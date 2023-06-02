@extends('shop.layout')
@section('content')
    <style>
        .film-image {
            width: 400px;
            height: 500px;
            margin-right: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);
        }

        .film-info p {
            margin-bottom: 50px;
        }

        .image-wrapper {
            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 10px;
        }

        .film-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        p {
            font-size: 20px;
        }

        .film-details {
            display: flex;
            align-items: flex-start;
            margin-bottom: 50px;
        }


        .film-info {
            margin-left: 20px;
        }
    </style>
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
@endsection
