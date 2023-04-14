@extends('film.layout')
@section('content')
<div class="card">
  <div class="card-header">Create Film</div>
  <div class="card-body">

      <form action="{{ url('film') }}" method="post">
        {!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Type</label></br>
        <input type="text" name="type" id="type" class="form-control"></br>
        <label>Time</label></br>
        <input type="text" name="time" id="time" class="form-control"></br>
        <label>Relese Date</label></br>
        <input type="text" name="releseDate" id="releseDate" class="form-control"></br>
        <label>Country</label></br>
        <input type="text" name="country" id="country" class="form-control"></br>
        <label>Price</label></br>
        <input type="text" name="price" id="price" class="form-control"></br>
        <label>Number</label></br>
        <input type="text" name="number" id="number" class="form-control"></br>
        <label>Image</label></br>
        <input type="text" name="image" id="image" class="form-control"></br>
        <input type="submit" value="Upload" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop
