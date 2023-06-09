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
                        <td>{{ $loop->iteration }}</td>
                        <td>${{ $transaction->price }}</td>
                        <td>{{ $transaction->quantity }}</td>
                        <td>
                            <ul class="list-unstyled">
                                @if ($transaction->addresses)
                                    <li>{{ $transaction->addresses->street }}, {{ $transaction->addresses->home_number }},
                                        {{ $transaction->addresses->apartment_number }}, {{ $transaction->addresses->city }}
                                    </li>
                                @endif
                            </ul>
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

    <div id="hiddenValues" style="display: none;">
        @foreach ($transactions as $transaction)
            <div class="hiddenValue">
                {{ $transaction->id }}
            </div>
        @endforeach
    </div>

    <script>
        const showAddressesButtons = document.querySelectorAll('.show-addresses-btn');

        showAddressesButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const addressesContainer = button.parentNode.querySelector('.list-unstyled');
                addressesContainer.classList.toggle('show');
            });
        });
    </script>
@endsection
