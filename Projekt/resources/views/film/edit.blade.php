@extends('film.layout')
@section('content')
<div class="card">
  <div class="card-header">Edit Film</div>
  <div class="card-body">

      <form action="{{ url('film/' .$film->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$film->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$film->name}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$film->address}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$film->mobile}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop
