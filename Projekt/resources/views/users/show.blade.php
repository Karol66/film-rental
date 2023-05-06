@extends('users.layout')
@section('content')
<div class="card">
  <div class="card-header">Show Film</div>
  <div class="card-body">

        <div class="card-body">
        <h5 class="card-title">Name : {{ $users->name }}</h5>
        <p class="card-text">Last Name : {{ $users->last_name }}</p>
        <p class="card-text">Email : {{ $users->email }}</p>
        <p class="card-text">User Name : {{ $users->user_name }}</p>
        <p class="card-text">Password : {{ $users->password }}</p>
        <p class="card-text">Is Admin : {{ $users->is_admin }}</p>
  </div>

    </hr>

  </div>
</div>
