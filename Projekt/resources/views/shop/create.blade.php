@extends('shop.layout')

@section('content')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Add Address</h1>
        </div>

        <form action="{{ route('addresses.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="street">Street:</label>
                <input type="text" name="street" class="form-control" required
                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
            </div>
            <div class="form-group">
                <label for="home_number">Home Number:</label>
                <input type="text" name="home_number" class="form-control" required
                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
            </div>
            <div class="form-group">
                <label for="apartment_number">Apartment Number:</label>
                <input type="text" name="apartment_number" class="form-control"
                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" name="city" class="form-control" required
                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
            </div>
            <br>
            <button type="submit" class="btn btn-success">Save</button>
        </form>


    <script>
       addEventListener('change', function(e) {
            var fileInput = e.target;
            var file = fileInput.files[0];

            var reader = new FileReader();
            reader.onload = function(e) {
                var imagePreview = document.getElementById('preview');
                imagePreview.src = e.target.result;
                imagePreview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        });
    </script>
@endsection
