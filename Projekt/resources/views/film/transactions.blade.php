@extends('film.layout')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Transactions</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>User</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($transactions)
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->id }}</td>
                                <td>${{ $transaction->price }}</td>
                                <td>{{ $transaction->quantity }}</td>
                                <td>{{ $transaction->user->name }}</td>
                                <td>
                                    <ul class="list-unstyled">
                                        @if ($transaction->addresses)
                                            <li>{{ $transaction->addresses->street }}, {{ $transaction->addresses->home_number }},
                                                {{ $transaction->addresses->apartment_number }}, {{ $transaction->addresses->city }}
                                            </li>
                                        @endif
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
            <div class="pagination-container d-flex justify-content-center mt-5">
                {{ $transactions->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </main>
@endsection
