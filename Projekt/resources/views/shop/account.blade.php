@extends('shop.layout')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="row">

            <div class="col-lg-8">
                <div class="card-header">
                    <h3>Personal Account</h3>
                </div>
                {{-- <div class="card-body">
                    <form action="{{ route('account.update', ['id' => Auth::user()->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ Auth::user()->name }}"
                                class="form-control gray-background">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" value="{{ Auth::user()->last_name }}"
                                class="form-control gray-background">
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="email" value="{{ Auth::user()->email }}"
                                class="form-control gray-background">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="user_name" value="{{ Auth::user()->user_name }}"
                                class="form-control gray-background">
                            @error('user_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" value="{{ Auth::user()->password }}"
                                class="form-control gray-background">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control gray-background">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div> --}}
            </div>
        </div>
    </main>
@endsection
