@extends('film.layout')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create Film</h1>
        </div>
        <div>

            <form method="POST" action="{{ route('film.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label></br>
                    <input type="text" name="name" id="name" class="form-control gray-background"></br>
                </div>
                <div class="form-group">
                    <label>Type</label></br>
                    <input type="text" name="type" id="type" class="form-control gray-background"></br>
                </div>
                <div class="form-group">
                    <label>Time</label></br>
                    <input type="text" name="film_length" id="film_length" class="form-control gray-background"></br>
                </div>
                <div class="form-group">
                    <label>Release Date</label></br>
                    <input type="date" name="release_date" id="release_date" class="form-control gray-background"
                        value="{{ old('release_date') }}"></br>
                </div>
                <div class="form-group">
                    <label>Country</label></br>
                    <input type="text" name="country" id="country" class="form-control gray-background"></br>
                </div>
                <div class="form-group">
                    <label>Price</label></br>
                    <input type="text" name="price" id="price" class="form-control gray-background"></br>
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="image"></br></br>
                </div>
                <div class="form-group">
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
