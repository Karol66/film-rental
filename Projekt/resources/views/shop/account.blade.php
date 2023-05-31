@extends('shop.layout')

@section('content')
    <div class="card-header">
        <h3>Transactions</h3>
    </div>
    <div class="card-body">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>User</th>
                    <th>Street</th>
                    <th>Home Number</th>
                    <th>Apartment Number</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>${{ $transaction->price }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>{{ $transaction->user->name }}</td>
                        <td>{{ $transaction->addresses->street }}</td>
                        <td>{{ $transaction->addresses->home_number }}</td>
                        <td>{{ $transaction->addresses->apartment_number }}</td>
                        <td>{{ $transaction->addresses->city }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
