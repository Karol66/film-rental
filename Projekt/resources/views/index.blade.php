<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożyczalnia Filmów</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .film-card {
            position: relative;
        }

        .image-container {
            position: relative;
        }

        .card-img {
            transition: filter 0.8s;
        }

        .play-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.5);
            opacity: 0;
            transition: opacity 0.8s, transform 0.8s;
            transition-delay: 0.2s;
        }

        .film-card:hover .card-img {
            filter: blur(5px);
        }

        .film-card:hover .play-icon {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }
    </style>


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Wypożyczalnia Filmów</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Strona główna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Filmy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontakt</a>
                </li>
            </ul>
        </div>
    </nav>

    <header class="jumbotron text-center">
        <h1>Wypożyczalnia Filmów Online</h1>
        <p>Znajdź i wypożycz swoje ulubione filmy.</p>
        <a href="#" class="btn btn-primary">Przejdź do kolekcji filmów</a>
    </header>

    <section class="popular container" id="popular">
        <div class="heading">
            <h2 class="heading-title">Movies</h2>
        </div>
        <div class="carousel-container">
            <div id="movieCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @php
                        $chunkedFilms = $films->chunk(4);
                    @endphp
                    @foreach ($chunkedFilms as $key => $filmGroup)
                        <li data-target="#movieCarousel" data-slide-to="{{ $key }}"
                            @if ($key == 0) class="active" @endif></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach ($chunkedFilms as $key => $filmGroup)
                        <div class="carousel-item @if ($key == 0) active @endif">
                            <div class="row">
                                @foreach ($filmGroup as $film)
                                    <div class="col-md-3">
                                        <a href="{{ route('film.show', $film->id) }}">
                                            <div class="film-card">
                                                <div class="image-container">
                                                    <img src="data:image/jpeg;base64,{{ base64_encode($film->image) }}"
                                                        class="card-img" alt="...">
                                                    <div class="play-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="100"
                                                            height="100" fill="white" class="bi bi-play"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M10.804 8 5 4.633v6.734L10.804 8zm.792-.696a.802.802 0 0 1 0 1.392l-6.363 3.692C4.713 12.69 4 12.345 4 11.692V4.308c0-.653.713-.998 1.233-.696l6.363 3.692z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#movieCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Poprzedni</span>
                </a>
                <a class="carousel-control-next" href="#movieCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Następny</span>
                </a>
            </div>
        </div>
    </section>








    {{-- <section class="popular container" id="popular">
        <div class="heading">
            <h2 class="heading-title">Shows</h2>
        </div>
    </section> --}}

    <footer class="bg-dark text-white text-center p-3 mt-5">
        <p>Wypożyczalnia Filmów &copy; 2023. Wszelkie prawa zastrzeżone.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
