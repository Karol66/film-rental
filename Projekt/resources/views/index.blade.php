<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożyczalnia Filmów</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

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
                    @foreach($chunkedFilms as $key => $filmGroup)
                        <li data-target="#movieCarousel" data-slide-to="{{ $key }}" @if($key == 0) class="active" @endif></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($chunkedFilms as $key => $filmGroup)
                        <div class="carousel-item @if($key == 0) active @endif">
                            <div class="row">
                                @foreach($filmGroup as $film)
                                    <div class="col-md-3">
                                        <img src="data:image/jpeg;base64,{{ base64_encode($film->image) }}" class="card-img" alt="...">
                                        <div class="carousel-caption">
                                            <h3>{{ $film->tytuł }}</h3>
                                            <p>{{ $film->opis }}</p>
                                        </div>
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
