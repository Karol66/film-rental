@extends('shop.layout2')

@section('content')
    <div class="card-header">
        <h3>Addresses</h3>
    </div>
    <div class="card-body">
        <a href="{{ route('addresses.create') }}" class="btn btn-primary">Add Address</a>
        <br><br>
        <table class="table">
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

        <!-- Form for creating a new address -->
        <form action="{{ route('addresses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" name="street" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="home_number">Home Number:</label>
                <input type="text" name="home_number" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apartment_number">Apartment Number:</label>
                <input type="text" name="apartment_number" class="form-control">
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
@endsection
