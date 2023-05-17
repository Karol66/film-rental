@extends('film.layout')
@section('content')
    <div>
        <div class="card-header">
            <h3>Create Film</h3>
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
                    <input type="text" name="time" id="time" class="form-control gray-background"></br>
                </div>
                <div class="form-group">
                    <label>Release Date</label></br>
                    <input type="text" name="release_date" id="release_date" class="form-control gray-background"></br>
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
    </div>
@stop
