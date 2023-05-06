@extends('shop.layout')
@section('content')
<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand">Admin Panel</a>
        <ul class="navbar-nav d-flex flex-row me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link mx-2" href="{{ route('film.index') }}">Movies administration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-2" href="{{ route('users.index') }}">Users Administration</a>
            </li>
            <li class="nav-item">
                <a class="nav-link mx-2" href="{{ route('logout') }}">Log out</a>
            </li>
        </ul>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
    </div>
</nav>

    <br />

    <div id="margin">

        <div class="table-responsive">
            <table class="table table-dark table-striped" id="margin">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Time</th>
                        <th>Relese Date</th>
                        <th>Country</th>
                        <th>Price</th>
                        <th>Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($film as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img class="imidz" src="data:image/jpeg;base64,{{ base64_encode($item->image) }}">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->time }}</td>
                            <td>{{ $item->relese_date }}</td>
                            <td>{{ $item->country }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->number }}</td>
                            <td>
                                <form wire:submit.prevent="addToCart({{ $item->id }})" action="{{ route('basket.store')}}" method="POST">
                                    @csrf
                                    <input wire:model="quantity.{{ $item->id }}" type="number"
                                           class="text-sm sm:text-base px-2 pr-2 rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400"
                                           style="width: 50px"/>
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Add to Cart
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
