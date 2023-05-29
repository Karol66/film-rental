@extends('film.layout')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Film</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('film.update', $film->id) }}" method="post" enctype="multipart/form-data">
                <div class="d-flex">
                    <div class="film-image">
                        <div class="image-wrapper">
                            <img src="data:image/jpeg;base64,{{ base64_encode($film->image) }}" alt="Film Image"
                                class="film-img">
                        </div>
                    </div>
                    <div class="ml-auto">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" id="id" value="{{ $film->id }}" />
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ $film->name }}"
                                class="form-control"
                                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input type="text" name="type" id="type" value="{{ $film->type }}"
                                class="form-control"
                                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                        </div>
                        <div class="form-group">
                            <label for="time">Film Length</label>
                            <input type="text" name="film_length" id="film_length" value="{{ $film->film_length }}"
                                class="form-control"
                                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                        </div>
                        <div class="form-group">
                            <label for="relese_date">Release Date</label>
                            <input type="date" name="release_date" id="release_date"
                                value="{{ old('release_date', $film->release_date ? date('Y-m-d', strtotime($film->release_date)) : '') }}"
                                class="form-control"
                                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" id="country" value="{{ $film->country }}"
                                class="form-control"
                                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" value="{{ $film->price }}"
                                class="form-control"
                                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" name="image" id="image" class="form-control-file" title="Browse">
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
@endsection
