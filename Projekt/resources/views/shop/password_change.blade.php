@extends('shop.layout')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="col-lg-8">
            <div class="card-header">
                <h3>Update Account</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('account.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}"
                        style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="user_name" class="form-control" value="{{ auth()->user()->user_name }}"
                        style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                        @error('user_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}"
                        style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ auth()->user()->last_name }}"
                        style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                        @error('last_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Current Password</label>
                        <input type="password" name="current_password" class="form-control"
                        style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                        @error('current_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="new_password" class="form-control"
                        style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                        @error('new_password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control"
                        style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary buy">Update Account</button>
                </form>
            </div>
        </div>
    </main>
@endsection
