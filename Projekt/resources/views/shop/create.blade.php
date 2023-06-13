@extends('shop.layout')

@section('content')
    <style>
        .form-control {
            width: 100%;
            background-color: rgba(255, 255, 255, 0.1);
            border: transparent;
            color: white;
        }

        @media (min-width: 576px) {

            /* Small devices (576px and up) */
            .form-control {
                width: 400px;
            }
        }

        @media (min-width: 768px) {

            /* Medium devices (768px and up) */
            .form-control {
                width: 500px;
            }
        }

        @media (min-width: 992px) {

            /* Large devices (992px and up) */
            .form-control {
                width: 600px;
            }
        }
    </style>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Address</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
            <input type="text" name="city" class="form-control" required pattern="[a-zA-Z\s]+" title="City name must contain only letters">
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
