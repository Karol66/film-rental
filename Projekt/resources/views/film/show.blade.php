@extends('film.layout')
@section('content')
<div class="card">
  <div class="card-header">Show Film</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">Name : {{ $film->name }}</h5>
        <p class="card-text">Address : {{ $film->address }}</p>
        <p class="card-text">Mobile : {{ $film->mobile }}</p>
  </div>

    </hr>

  </div>
</div>
