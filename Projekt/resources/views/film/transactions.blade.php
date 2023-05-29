@extends('film.layout')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>User</th>
                        <th colspan="4">Address</th>
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
                                <td>{{ $transaction->addresses->street }}</td>
                                <td>{{ $transaction->addresses->home_number }}</td>
                                <td>{{ $transaction->addresses->apartment_number }}</td>
                                <td>{{ $transaction->addresses->city }}</td>
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
