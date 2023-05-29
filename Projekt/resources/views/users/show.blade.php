@extends('film.layout')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">View User</h1>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <h5 class="card-title">Name : {{ $users->name }}</h5>
                    <p class="card-text">Last Name : {{ $users->last_name }}</p>
                    <p class="card-text">Email : {{ $users->email }}</p>
                    <p class="card-text">User Name : {{ $users->user_name }}</p>
                    <p class="card-text">Is Admin : {{ $users->is_admin }}</p>
                </div>
            </div>
        </div>
    </main>
@endsection
