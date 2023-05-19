@extends('users.layout')
@section('content')
    <div>
        <div class="card-header">
            <h3>Edit Film </h3>
        </div>
        <div class="card-body">

            <form action="{{ route('users.update', $users->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" id="id" value="{{ $users->id }}" id="id" />
                <label>Name</label></br>
                <input type="text" name="name" id="name" value="{{ $users->name }}" class="form-control gray-background"></br>
                <label>Last Name</label></br>
                <input type="text" name="last_name" id="last_name" value="{{ $users->last_name }}"
                class="form-control gray-background"></br>
                <label>Email</label></br>
                <input type="text" name="email" id="email" value="{{ $users->email }}" class="form-control gray-background"></br>
                <label>User Name</label></br>
                <input type="text" name="user_name" id="user_name" value="{{ $users->user_name }}"
                class="form-control gray-background"></br>
                <label>Password</label></br>
                <input type="text" name="password" id="password" value="{{ $users->password }}"
                class="form-control gray-background"></br>
                <label>Is Admin</label></br>
                <input type="text" name="is_admin" id="is_admin" value="{{ $users->is_admin }}"
                class="form-control gray-background"></br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
