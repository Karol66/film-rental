@extends('film.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div class="card-header">
                    <h3>Edit Film</h3>
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
                                        class="form-control gray-background">
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <input type="text" name="type" id="type" value="{{ $film->type }}"
                                        class="form-control gray-background">
                                </div>
                                <div class="form-group">
                                    <label for="time">Time</label>
                                    <input type="text" name="time" id="time" value="{{ $film->time }}"
                                        class="form-control gray-background">
                                </div>
                                <div class="form-group">
                                    <label for="relese_date">Release Date</label>
                                    <input type="date" name="release_date" id="release_date"
                                        value="{{ old('release_date', $film->release_date ? date('Y-m-d', strtotime($film->release_date)) : '') }}"
                                        class="form-control gray-background">
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" id="country" value="{{ $film->country }}"
                                        class="form-control gray-background">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" name="price" id="price" value="{{ $film->price }}"
                                        class="form-control gray-background">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" id="image" class="form-control-file">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
