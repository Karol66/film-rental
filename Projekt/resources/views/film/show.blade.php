@extends('film.layout')
@section('content')
<div class="card">
  <div class="card-header">Show Film</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">Name : {{ $film->name }}</h5>
        <p class="card-text">Type : {{ $film->type }}</p>
        <p class="card-text">Time : {{ $film->time }}</p>
        <p class="card-text">Relese Date : {{ $film->relese_date }}</p>
        <p class="card-text">Country : {{ $film->country }}</p>
        <p class="card-text">Price : {{ $film->price }}</p>
        <p class="card-text">Number : {{ $film->number }}</p>
        <p class="card-text">Image : {{ $film->image }}</p>
  </div>

    </hr>

  </div>
</div>
