@extends('film.layout')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create Film</h1>
        </div>

        <style>
            input[type="file"] {
                display: none;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .film-image {
                width: 350px;
                height: 500px;
                margin-top: 40px;
                margin-bottom: 20px;
                border-radius: 10px;
                border: 1px solid #ccc;
                display: inline-block;
                overflow: hidden;
            }

            .film-img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                margin: 0;
            }

            .form-fields {
                padding-top: 20px;
            }

            .form-fields .form-group {
                width: 100%;
            }

            .form-control {
                width: 60%;
                background-color: rgba(255, 255, 255, 0.1);
                border: transparent;
                color: white;
            }


            @media (min-width: 768px) {
                .film-image {
                    float: left;
                    margin-right: 20px;
                }

                .form-fields {
                    float: left;
                    width: calc(100% - 380px);
                }
            }

            @media (max-width: 767px) {
                .form-check {
                    flex-basis: 100%;
                }
            }

            .form-check-group {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .form-check-group .form-check {
                flex-basis: calc(50% - 5px);
                max-width: calc(50% - 5px);
                margin-bottom: 10px;
            }

            @media (max-width: 575px) {
                .form-check-group .form-check {
                    flex-basis: 100%;
                    max-width: 100%;
                }
            }
        </style>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <form method="POST" action="{{ route('film.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="film-image" onclick="document.getElementById('image').click()">
                    <input type="file" name="image" id="image">
                    <div class="image-wrapper">
                        <img id="preview" src="#" alt="Preview" class="film-img" style="display: none;">
                    </div>
                </div>

                <div class="form-fields">
                    <div class="form-group">
                        <label for="name">Name</label><br>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="id_film_type">Type</label><br>
                        <select name="id_film_type" id="id_film_type" class="form-select form-control">
                            @foreach ($filmTypes as $filmType)
                                <option value="{{ $filmType->id }}">{{ $filmType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="film_length">Film Length</label><br>
                        <input type="text" name="film_length" id="film_length" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="release_date">Release Date</label><br>
                        <input type="date" name="release_date" id="release_date" class="form-control"
                            value="{{ old('release_date') }}">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label><br>
                        <input type="text" name="country" id="country" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label><br>
                        <input type="text" name="price" id="price" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">Upload</button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addFilmTypeModal">Add New Film Type</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal fade" id="addFilmTypeModal" tabindex="-1" role="dialog" aria-labelledby="addFilmTypeModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="background-color: #343a40;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addFilmTypeModalLabel">Add New Film Type</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('filmType.storeFilmType') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="filmType" class="form-label">Film Type</label>
                                <input type="text" class="form-control" id="filmType" name="name"
                                    placeholder="Enter film type">
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('change', function(e) {
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


    {{-- <script>
        var addFilmTypeModal = new bootstrap.Modal(document.getElementById('addFilmTypeModal'));
    </script> --}}


@endsection
