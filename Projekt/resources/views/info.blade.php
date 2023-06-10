@extends('shop.layout')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/info.css">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>

    <main>

        <br>

        <div class="container marketing">

            <div class="row">
                <div class="col-lg-4">
                    <img class="rounded-circle" width="140" height="140" src="\img\3.png">
                    <h2>Blu-ray Promotion</h2>
                    <p>Discover the world of Blu-ray with our extensive collection of high-definition movies. Immerse
                        yourself in stunning visuals and superior audio quality.</p>
                </div>
                <div class="col-lg-4">
                    <img class="rounded-circle" width="140" height="140" src="\img\4.png">

                    <h2>Blu-ray Collection</h2>
                    <p>Explore our vast collection of Blu-ray movies. From action-packed blockbusters to captivating dramas,
                        we have something for everyone.</p>
                </div>
                <div class="col-lg-4">
                    <img class="rounded-circle" width="140" height="140" src="\img\3.png">

                    <h2>Upgrade to Blu-ray</h2>
                    <p>Experience your favorite movies like never before. Upgrade to Blu-ray and enjoy crystal-clear picture
                        quality and immersive surround sound.</p>
                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Experience Blu-ray. <span class="text-muted">It’ll blow your mind.</span>
                    </h2>
                    <p class="lead">Indulge in the breathtaking visuals and incredible detail of Blu-ray. Immerse yourself
                        in the world of high-definition entertainment.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" width="500" height="500" src="\img\1.png">

                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Discover Blu-ray Excellence. <span class="text-muted">See for
                            yourself.</span></h2>
                    <p class="lead">Unleash the full potential of your home theater setup with Blu-ray. Enjoy unparalleled
                        audiovisual quality and a truly immersive cinematic experience.</p>
                </div>
                <div class="col-md-5 order-md-1">
                    <img class="featurette-image img-fluid mx-auto" width="500" height="500" src="\img\4.png">

                </div>
            </div>

            <hr class="featurette-divider">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Unleash the Power of Blu-ray. <span class="text-muted">Checkmate.</span>
                    </h2>
                    <p class="lead">Embrace the ultimate home entertainment experience with Blu-ray. Elevate your movie
                        nights and enjoy a theater-like atmosphere in the comfort of your own home.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" width="500" height="500" src="\img\3.png">

                </div>
            </div>

            <hr class="featurette-divider">

        </div>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
