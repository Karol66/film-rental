@extends('shop.layout2')

@section('content')
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Blu-Ray movie rental mail order platform</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
                aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Blu-Ray movie rental mail order
                        platform</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('shop.index') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('shop.films') }}">More films</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                My account
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="{{ route('shop.account') }}">Personal data</a></li>
                                <li><a class="dropdown-item" href="{{ route('shop.basket') }}">My basket</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}">Log out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <br>

    <div>
        <div class="card-header">
            <h3>Personal Account</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('account.update', ['id' => Auth::user()->id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label><br>
                    <input type="text" name="name" value="{{ Auth::user()->name }}"
                        class="form-control gray-background">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Last Name</label><br>
                    <input type="text" name="last_name" value="{{ Auth::user()->last_name }}"
                        class="form-control gray-background">
                    @error('last_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label><br>
                    <input type="text" name="email" value="{{ Auth::user()->email }}"
                        class="form-control gray-background">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>User Name</label><br>
                    <input type="text" name="user_name" value="{{ Auth::user()->user_name }}"
                        class="form-control gray-background">
                    @error('user_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label><br>
                    <input type="password" name="password" value="{{ Auth::user()->password }}"
                        class="form-control gray-background">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Confirm Password</label><br>
                    <input type="password" name="password_confirmation" class="form-control gray-background">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
                <div class="mt-4">
                    <a href="{{ route('addresses.index') }}" class="btn btn-primary">Manage Addresses</a>
                </div>
            </form>
        </div>
    </div>
@endsection
