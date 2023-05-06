@extends('film.layout')
@section('content')
    <div class="card">
        <div class="card-header">Edit Film</div>
        <div class="card-body">

            <form action="{{ url('film/' . $film->id) }}" method="post">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" id="id" value="{{ $film->id }}" id="id" />
                <label>Name</label></br>
                <input type="text" name="name" id="name" value="{{ $film->name }}" class="form-control"></br>
                <label>Type</label></br>
                <input type="text" name="type" id="type" value="{{ $film->type }}" class="form-control"></br>
                <label>Time</label></br>
                <input type="text" name="time" id="time" value="{{ $film->time }}" class="form-control"></br>
                <label>Relese Date</label></br>
                <input type="text" name="relese_date" id="relese_date" value="{{ $film->relese_date }}"
                    class="form-control"></br>
                <label>Country</label></br>
                <input type="text" name="country" id="country" value="{{ $film->country }}" class="form-control"></br>
                <label>Price</label></br>
                <input type="text" name="price" id="price" value="{{ $film->price }}" class="form-control"></br>
                <label>Number</label></br>
                <input type="text" name="number" id="number" value="{{ $film->number }}" class="form-control"></br>
                <label>Image</label></br>
                <input type="text" name="image" id="image" value="{{ $film->image }}" class="form-control"></br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
