@extends('users.layout')
@section('content')
    <div class="card">
        <div class="card-header">Edit Film</div>
        <div class="card-body">

            <form action="{{ url('users/' . $users->id) }}" method="post">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" id="id" value="{{ $users->id }}" id="id" />
                <label>Name</label></br>
                <input type="text" name="name" id="name" value="{{ $users->name }}" class="form-control"></br>
                <label>Last Name</label></br>
                <input type="text" name="last_name" id="last_name" value="{{ $users->last_name }}" class="form-control"></br>
                <label>Email</label></br>
                <input type="text" name="email" id="email" value="{{ $users->email }}" class="form-control"></br>
                <label>User Name</label></br>
                <input type="text" name="user_name" id="user_name" value="{{ $users->user_name }}"
                    class="form-control"></br>
                <label>Password</label></br>
                <input type="text" name="password" id="password" value="{{ $users->password }}" class="form-control"></br>
                <label>Is Admin</label></br>
                <input type="text" name="is_admin" id="is_admin" value="{{ $users->is_admin }}" class="form-control"></br>
                <input type="submit" value="Update" class="btn btn-success"></br>
            </form>

        </div>
    </div>
@stop
