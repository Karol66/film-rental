@extends('film.layout')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div>
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit User</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('users.update', $users->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input class="form-control" type="hidden" name="id" id="id" value="{{ $users->id }}"
                        id="id" />
                    <label>Name</label><br>
                    <input class="form-control" type="text" name="name" id="name" value="{{ $users->name }}"
                        class="form-control"><br>
                    <label>Last Name</label><br>
                    <input class="form-control" type="text" name="last_name" id="last_name"
                        value="{{ $users->last_name }}" class="form-control"><br>
                    <label>Email</label><br>
                    <input class="form-control" type="text" name="email" id="email" value="{{ $users->email }}"
                        class="form-control"><br>
                    <label>User Name</label><br>
                    <input class="form-control" type="text" name="user_name" id="user_name"
                        value="{{ $users->user_name }}" class="form-control"><br>
                    <label>Is Admin</label><br>
                    <select class="form-control" name="is_admin" id="is_admin">
                        <option value="1" @if($users->is_admin == 1) selected @endif>Yes</option>
                        <option value="0" @if($users->is_admin == 0) selected @endif>No</option>
                    </select><br>
                    <input type="submit" value="Update" class="btn btn-success"><br>
                </form>
            </div>
        </div>
    </main>
@endsection
