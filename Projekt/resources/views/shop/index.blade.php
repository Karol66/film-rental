<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożyczalnia Filmów</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="\img\Movie_Cave.png" height="80px" class="m-0"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('shop.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shop.films') }}">Films</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('shop.account') }}">Personal data</a>
                </li>
                <li>
                    <div class="dropdown">
                        <a class="nav-link" href="{{ route('shop.basket') }}" onmouseenter="toggleDropdown()"
                            onmouseleave="hideDropdown()">
                            My basket
                        </a>

                        <div class="dropdown-menu" id="cartDropdown">
                            <div class="row total-header-section">
                                @php $total = 0; @endphp
                                @foreach ((array) session('basket') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity']; @endphp
                                @endforeach
                                <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                    <p>Total: <span class="text-info">$ {{ $total }}</span></p>
                                </div>
                            </div>
                            @if (session('basket'))
                                @foreach (session('basket') as $id => $details)
                                    @php $product = \app\Models\Film::find($id); @endphp
                                    <div class="row cart-detail">
                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
                                            <img class="imidz"
                                                src="data:image/jpeg;base64,{{ base64_encode($product->image) }}">
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-6 cart-detail-product">
                                            <p class="product-name">{{ $product->name }}</p>
                                            <div class="price-quantity">
                                                <span class="price text-info">${{ $details['price'] }}</span>
                                                <span class="count"> Quantity: {{ $details['quantity'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Log out</a>
                </li>
            </ul>
        </div>
    </nav>

    <header class="jumbotron text-center pt-4"
        style="background-image: url(/img/tlo2.jpg); height: 450px; background-size: cover;">
        <h1>Wypożyczalnia Filmów Online</h1>
        <p>Znajdź i wypożycz swoje ulubione filmy.</p>
        <a href="{{ route('shop.films') }}" class="btn btn-primary border-white">Przejdź do kolekcji
            filmów</a>
    </header>

    <br>
    <br>

    <section class="popular container">
        <div class="heading">
            <h2 class="heading-title">Filmy</h2>
        </div>
        <div class="carousel-container">
            <div id="movieCarousel" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    @php
                        $chunkedFilms = $films->chunk(4);
                    @endphp
                    @foreach ($chunkedFilms as $key => $filmGroup)
                        <li data-bs-target="#movieCarousel" data-bs-slide-to="{{ $key }}"
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
                                                <div class="film-title">
                                                    <h4>{{ $film->name }}</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#movieCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Poprzedni</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#movieCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Następny</span>
                </button>
            </div>
        </div>
    </section>

    <br>
    <br>

    <section class="promotions container" id="promotions">
        <div class="heading">
            <h2 class="heading-title">Oferty</h2>
        </div>
        <div class="row">
            <div class="button-container">
                <button class="promo-button">
                    <div class="promo-content">
                        <p class="promo-text text-center">Załóż konto teraz i otrzymaj 20% zniżki na pierwsze
                            zamówienie!</p>
                    </div>
                </button>
            </div>
            <div class="button-container">
                <button class="promo-button" style="background-color: #711212; color:beige">
                    <div class="promo-content">
                        <p class="promo-text text-center">Zdobądź 5% zniżki dla zamówień powyżej 100 zł!</p>
                    </div>
                </button>
            </div>
            <div class="button-container">
                <button class="promo-button">
                    <div class="promo-content">
                        <p class="promo-text text-center">Oferta dla stałych klientów po zakupie 200 filmów stałe 3%
                            zniżki!</p>
                    </div>
                </button>
            </div>
        </div>
    </section>

    <br>
    <br>

    <section class="films-section container">
        <div class="heading">
            <h2 class="heading-title">Nowa sekcja</h2>
        </div>
        <div class="row">
            @foreach ($films as $film)
                <div class="col-md-3">
                    <a href="{{ route('film.show', $film->id) }}">
                        <div class="card">
                            <div class="image-container">
                                <img src="data:image/jpeg;base64,{{ base64_encode($film->image) }}">
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="white"
                                class="bi bi-eye" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z">
                                </path>
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z">
                                </path>
                            </svg>
                            <div class="film-title">
                                {{ $film->name }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>

    <br>

    <section class="popular container">
        <div class="heading">
            <h2 class="heading-title">Filmy Polecane Przez Urzytkowników</h2>
        </div>
        <div class="carousel-container">
            <div id="movieCarousel2" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    @php
                        $chunkedFilms = $films->chunk(4);
                    @endphp
                    @foreach ($chunkedFilms as $key => $filmGroup)
                        <li data-bs-target="#movieCarousel2" data-bs-slide-to="{{ $key }}"
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
                                                <div class="film-title">
                                                    <h4>{{ $film->name }}</h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#movieCarousel2"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Poprzedni</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#movieCarousel2"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Następny</span>
                </button>
            </div>
        </div>
    </section>





    <footer class="bg-dark text-white text-center p-3 mt-5">
        <p>Wypożyczalnia Filmów &copy; 2023. Wszelkie prawa zastrzeżone.</p>
    </footer>

</body>

</html>
