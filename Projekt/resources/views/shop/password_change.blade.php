@extends('shop.account')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="col-lg-8">
            <div class="card-header">
                <h3>Change Password</h3>
            </div>
            <div class="card-body">
                {{-- <form action="{{ route('shop.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" name="current_password" class="form-control">
                    @error('current_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control">
                    @error('new_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form> --}}
            </div>
        </div>
    </main>
@endsection
