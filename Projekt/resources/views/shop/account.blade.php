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
                    <th>Addresses</th>
                    <th>Rented Films</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->id }}</td>
                        <td>${{ $transaction->price }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>
                            @php
                                $address = $transaction->addresses
                                    ->selectRaw("CONCAT(street, ', ', home_number, ', ', apartment_number, ', ', city) AS full_address")
                                    ->pluck('full_address')
                                    ->first();

                                echo $address;
                            @endphp

                        </td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($transaction->item as $item)
                                    @if ($item->films)
                                        <li>{{ $item->films->name }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="pagination-container d-flex justify-content-center mt-5">
        {{ $transactions->links('pagination::bootstrap-4') }}
    </div>
@endsection
