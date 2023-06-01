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
        </style>

        <div class="row">
            <form method="POST" action="{{ route('film.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="film-image" onclick="document.getElementById('image').click()">
                    <input type="file" name="image" id="image"><br><br>
                    <div class="image-wrapper">
                        <img id="preview" src="#" alt="Preview" class="film-img" style="display: none;">
                    </div>
                </div>

                <div class="form-fields">
                    <div class="form-group">
                        <label for="name">Name</label><br>
                        <input type="text" name="name" id="name" class="form-control"
                        style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                    </div>
                    <div class="form-group">
                        <label>Type</label><br>
                         <div class="d-flex flex-wrap ">   {{-- pokminić coś z d-flex do responsyywnośći --}}
                            <div class="form-check flex-fill">
                                <input type="radio" name="type" id="type_comedy" class="form-check-input" value="comedy" checked>
                                <label for="type_comedy" class="form-check-label">Comedy</label>
                            </div>
                            <div class="form-check flex-fill">
                                <input type="radio" name="type" id="type_adventure" class="form-check-input" value="adventure">
                                <label for="type_adventure" class="form-check-label">Adventure</label>
                            </div>
                            <div class="form-check flex-fill">
                                <input type="radio" name="type" id="type_drama" class="form-check-input" value="drama">
                                <label for="type_drama" class="form-check-label">Drama</label>
                            </div>
                            <div class="form-check flex-fill">
                                <input type="radio" name="type" id="type_action" class="form-check-input" value="action">
                                <label for="type_action" class="form-check-label">Action</label>
                            </div>
                            <div class="form-check flex-fill">
                                <input type="radio" name="type" id="type_horror" class="form-check-input" value="horror">
                                <label for="type_horror" class="form-check-label">Horror</label>
                            </div>
                            <div class="form-check flex-fill">
                                <input type="radio" name="type" id="type_thriller" class="form-check-input" value="thriller">
                                <label for="type_thriller" class="form-check-label">Thriller</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="film_length">Time</label><br>
                        <input type="text" name="film_length" id="film_length" class="form-control"
                        style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                    </div>
                    <div class="form-group">
                        <label for="release_date">Release Date</label><br>
                        <input type="date" name="release_date" id="release_date" class="form-control" value="{{ old('release_date') }}"
                        style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label><br>
                        <input type="text" name="country" id="country" class="form-control"
                        style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label><br>
                        <input type="text" name="price" id="price" class="form-control"
                        style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;">
                    </div>
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </div>
            </form>
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
@endsection
