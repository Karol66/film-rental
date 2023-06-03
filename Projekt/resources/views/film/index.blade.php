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
                        <th scope="col">Quantity</th>
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
                            <td>{{ $transaction->id_user }}</td>
                            <td>{{ $transaction->id_adresses }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </main>


    <script>
        (function() {
            'use strict'

            feather.replace({
                'aria-hidden': 'true'
            })

            var ctx = document.getElementById('myChart')

            var transactionData = @json($transactions->groupBy(function ($transaction) {
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
                                beginAtZero: false
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
