<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blu-Ray movie rental mail order platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

  </head>
  <body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <div>
      <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Blu-Ray movie rental mail order platform</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Blu-Ray movie rental mail order platform</h5>
              <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="busket.html">More films</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    My account
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="personalData.html">Personal data</a></li>
                    <li><a class="dropdown-item" href="yourBusket.html">My busket</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="login.html">Log out</a></li>
                  </ul>
                </li>
              </ul>
              <form class="d-flex mt-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </div>
      </nav>
    </div>

      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/carousel1.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/carousel2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/carousel3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    </br>

   <section class="popular container" id="popular">
        <div class="heading">
            <h2 class="heading-title">Movies</h2>
        </div>

        <div class="grid-container">
          <div class="grid-item">

            <div class="card text-bg-dark">
              <img src="img/alps.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Card title</h5>
                <a href="#" class="buy">
                  <i class='bx bx-basket'></i>
                </a>
                <h5 class="buy2">Add to basket</h5>
              </div>
            </div>

          </div>
          <div class="grid-item">

            <div class="card text-bg-dark">
              <img src="img/alps.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Card title</h5>
                <a href="#" class="buy">
                  <i class='bx bx-basket'></i>
                </a>
                <h5 class="buy2">Add to basket</h5>
              </div>
            </div>

          </div>
          <div class="grid-item">

            <div class="card text-bg-dark">
              <img src="img/alps.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Card title</h5>
                <a href="#" class="buy">
                  <i class='bx bx-basket'></i>
                </a>
                <h5 class="buy2">Add to basket</h5>
              </div>
            </div>

          </div>
          <div class="grid-item">

            <div class="card text-bg-dark">
              <img src="img/alps.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Card title</h5>
                <a href="#" class="buy">
                  <i class='bx bx-basket'></i>
                </a>
                <h5 class="buy2">Add to basket</h5>
              </div>
            </div>

          </div>
          <div class="grid-item">

            <div class="card text-bg-dark">
              <img src="img/alps.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Card title</h5>
                <a href="#" class="buy">
                  <i class='bx bx-basket'></i>
                </a>
                <h5 class="buy2">Add to basket</h5>
              </div>
            </div>

          </div>
          <div class="grid-item">

            <div class="card text-bg-dark">
              <img src="img/alps.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Card title</h5>
                <a href="#" class="buy">
                  <i class='bx bx-basket'></i>
                </a>
                <h5 class="buy2">Add to basket</h5>
              </div>
            </div>

          </div>
          <div class="grid-item">

            <div class="card text-bg-dark">
              <img src="img/alps.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Card title</h5>
                <a href="#" class="buy">
                  <i class='bx bx-basket'></i>
                </a>
                <h5 class="buy2">Add to basket</h5>
              </div>
            </div>

          </div>
          <div class="grid-item">

            <div class="card text-bg-dark">
              <img src="img/alps.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Card title</h5>
                <a href="#" class="buy">
                  <i class='bx bx-basket'></i>
                </a>
                <h5 class="buy2">Add to basket</h5>
              </div>
            </div>

          </div>
          <div class="grid-item">

            <div class="card text-bg-dark">
              <img src="img/alps.jpg" class="card-img" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title">Card title</h5>
                <a href="#" class="buy" >
                  <i class='bx bx-basket'></i>
                </a>
                <h5 class="buy2">Add to basket</h5>
              </div>
            </div>

          </div>
        </div>

   </section>

   <section>
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">© 2023 Blu-Ray movie rental mail order platform</p>



        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
          <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
      </footer>
    </div>
   </section>

  </body>
</html>
