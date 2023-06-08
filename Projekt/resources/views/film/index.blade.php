@extends('film.layout')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
        </div>

        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Last week's transactions</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Date</th>
                        <th scope="col">Price</th>
                        <th scope="col">Number Of Days</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Address ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->created_at->format('Y-m-d') }}</td>
                            <td>{{ $transaction->price }}</td>
                            <td>{{ $transaction->quantity }}</td>
                            <td>
                                <a href="{{ route('users.show', $transaction->id_user) }}">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                            </path>
                                            <path
                                                d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                            </path>
                                        </svg>
                                    </button>
                                </a>
                            </td>
                            <td>{{ $transaction->id_adresses }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Paginacja -->
            <div class="pagination-container d-flex justify-content-center mt-5">
                {{ $transactions->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </main>


    <script>
        (function() {
            'use strict'

            feather.replace({
                'aria-hidden': 'true'
            })

            var ctx = document.getElementById('myChart')

            var transactionData = @json(
                $allTransactions->groupBy(function ($transaction) {
                        return $transaction->created_at->format('Y-m-d');
                    })->map(function ($transactionsByDate) {
                        return $transactionsByDate->sum('price');
                    }))

            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: Object.keys(transactionData),
                    datasets: [{
                        data: Object.values(transactionData),
                        lineTension: 0,
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        borderWidth: 4,
                        pointBackgroundColor: '#007bff'
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: false,
                                fontColor: 'white',
                                fontFamily: 'Roboto Slab, serif'
                            },
                            gridLines: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontColor: 'white',
                                fontFamily: 'Roboto Slab, serif'
                            },
                            gridLines: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        }]
                    },
                    legend: {
                        display: false
                    }
                }
            })
        })()
    </script>
@endsection
