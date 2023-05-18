@extends('film.layout')
@section('content')
    <div>
        <div class="card-header">
            <h3>Personal Account</h3>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('film.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label></br>
                    <input type="text" placeholder="{{ Auth::user()->name }}" class="form-control gray-background"></br>
                </div>
                <div class="form-group">
                    <label>Last Name</label></br>
                    <input type="text" placeholder="{{ Auth::user()->last_name }}" class="form-control gray-background"></br>
                </div>
                <div class="form-group">
                    <label>Email</label></br>
                    <input type="text" placeholder="{{ Auth::user()->email }}" class="form-control gray-background"></br>
                </div>
                <div class="form-group">
                    <label>User Name</label></br>
                    <input type="text" placeholder="{{ Auth::user()->user_name }}" class="form-control gray-background"></br>
                </div>
                <div class="form-group">
                    <label>Password</label></br>
                    <input type="text" class="form-control gray-background"></br>
                </div>

                <div class="form-group">
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </div>

        </div>
    </div>
@stop
