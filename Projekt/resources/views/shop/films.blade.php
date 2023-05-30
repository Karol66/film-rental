@extends('shop.layout')

@section('content')
    <div id="margin">
        <div class="table-responsive">
            <table class="table table-dark table-striped" id="margin">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Film Length</th>
                        <th>Release Date</th>
                        <th>Country</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($films as $film)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img class="imidz" src="data:image/jpeg;base64,{{ base64_encode($film->image) }}">
                            </td>
                            <td>{{ $film->name }}</td>
                            <td>{{ $film->type }}</td>
                            <td>{{ $film->film_length }}</td>
                            <td>{{ $film->release_date }}</td>
                            <td>{{ $film->country }}</td>
                            <td>{{ $film->price }}</td>
                            <td>
                                <form action="{{ route('add_to_basket', ['id' => $film->id]) }}" method="POST">
                                    @csrf
                                    <input type="number" name="quantity" value="1" min="1" readonly
                                        style="display: none;">
                                    <button type="submit" class="btn btn-primary buy">Add to Basket</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="pagination-container d-flex justify-content-center mt-5">
        {{ $films->links('pagination::bootstrap-4') }}
    </div>

@endsection
