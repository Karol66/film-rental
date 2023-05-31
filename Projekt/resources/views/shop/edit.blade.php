@extends('shop.layout')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Address</h1>
    </div>

    <form action="{{ route('shop.update', $address->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="street">Street:</label>
            <input type="text" name="street" class="form-control" value="{{ $address->street }}" required
                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
        </div>
        <div class="form-group">
            <label for="home_number">Home Number:</label>
            <input type="text" name="home_number" class="form-control" value="{{ $address->home_number }}" required
                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
        </div>
        <div class="form-group">
            <label for="apartment_number">Apartment Number:</label>
            <input type="text" name="apartment_number" class="form-control" value="{{ $address->apartment_number }}"
                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
        </div>
        <div class="form-group">
            <label for="city">City:</label>
            <input type="text" name="city" class="form-control" value="{{ $address->city }}" required
                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
