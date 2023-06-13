@extends('film.layout')

@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Film</h1>
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

        <div class="row">
            <div class="card-body">
                <form action="{{ route('film.update', $film->id) }}" method="post" enctype="multipart/form-data">
                    <div class="film-image" onclick="document.getElementById('image').click()">
                        <input type="file" name="image" id="image">
                        <div class="image-wrapper">
                            <img src="data:image/jpeg;base64,{{ base64_encode($film->image) }}" alt="Film Image"
                                class="film-img">
                        </div>
                    </div>

                    <div class="form-fields">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" id="id" value="{{ $film->id }}" />
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" value="{{ $film->name }}"
                                class="form-control"
                                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;" required>
                        </div>
                        <div class="form-group">
                            <label for="id_film_type">Type</label><br>
                            <select name="id_film_type" id="id_film_type" class="form-select form-control">
                                @foreach($filmTypes as $filmType)
                                    <option value="{{ $filmType->id }}">{{ $filmType->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="film_length">Film Length</label>
                            <input type="text" name="film_length" id="film_length" value="{{ $film->film_length }}"
                                class="form-control"
                                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;" required>
                        </div>
                        <div class="form-group">
                            <label for="release_date">Release Date</label>
                            <input type="date" name="release_date" id="release_date"
                                value="{{ old('release_date', $film->release_date ? date('Y-m-d', strtotime($film->release_date)) : '') }}"
                                class="form-control"
                                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;" required>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" id="country" value="{{ $film->country }}"
                                class="form-control"
                                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;" required>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" name="price" id="price" value="{{ $film->price }}"
                                class="form-control"
                                style="background-color: rgba(255, 255, 255, 0.1); border: transparent; color: white;" required>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>


    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            var fileInput = e.target;
            var file = fileInput.files[0];

            var reader = new FileReader();
            reader.onload = function(e) {
                var imagePreview = document.querySelector('.film-img');
                imagePreview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        });
    </script>
@endsection
