@extends('shop.layout')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="card-header">
        <h3>Addresses</h3>
    </div>
    <div class="card-body">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Street</th>
                    <th>Home Number</th>
                    <th>Apartment Number</th>
                    <th>City</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($addresses as $address)
                    <tr>
                        <td>{{ $address->id }}</td>
                        <td>{{ $address->street }}</td>
                        <td>{{ $address->home_number }}</td>
                        <td>{{ $address->apartment_number }}</td>
                        <td>{{ $address->city }}</td>
                        <td>
                            <a href="{{ route('addresses.edit', $address->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this address?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
@endsection
