<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/user_panel.css">
    <style>
        .sidebar {
            background-color: rgb(22, 24, 28) !important;
            flex: 0 0 auto;
            transition: margin 0.3s;
        }



        @media (max-width: 992px) {
            .sidebar {
                margin-left: -100%;
                position: fixed;
                width: 100%;
                height: 100%;
                z-index: 999;
                overflow-y: auto;
                background-color: #fff;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .sidebar.active {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="\img\Movie_Cave.png" height="80px" class="m-0"> </a>
            @if (Route::is('shop.account') ||
                    Route::is('shop.password_change') ||
                    Route::is('addresses.index') ||
                    Route::is('shop.create') ||
                    Route::is('shop.edit'))
            <button class="navbar-toggler" type="button" onclick="toggleSidebar()">
                <span class="navbar-toggler-icon"></span>
            </button>
            @endif

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('shop.index') }}">Home</a>
                    </li>
                    @if (Auth::check())
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
                                        @php $product = App\Models\Film::find($id); @endphp
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
                    @endif
                    @if (Auth::check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Sign out</a>
                    </li>
                    @endif
                    <li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endguest
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="container-fluid  main-wrapper">
        <div class="row">
            @if (Route::is('shop.account') ||
                    Route::is('shop.password_change') ||
                    Route::is('addresses.index') ||
                    Route::is('shop.create') ||
                    Route::is('shop.edit'))
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                    <div class="position-sticky pt-3 sidebar-wrapper">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="{{ route('shop.account') }}">
                                    <span data-feather="home"></span>
                                    Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('shop.password_change') }}">
                                    <span data-feather="users"></span>
                                    Change Password
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('addresses.index') }}">
                                    <span data-feather="users"></span>
                                    My Address
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('shop.create') }}">
                                    <span data-feather="users"></span>
                                    Add Address
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            @endif
        </div>
    </div>



    @if (Route::is('shop.account') ||
            Route::is('shop.password_change') ||
            Route::is('addresses.index') ||
            Route::is('shop.create') ||
            Route::is('shop.edit'))
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container pt-4">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    @else
        <div class="container pt-4">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')
        </div>
    @endif


    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById("cartDropdown");
            dropdown.style.display = "block";
            dropdown.classList.toggle("show");
        }

        function hideDropdown() {
            var dropdown = document.getElementById("cartDropdown");
            dropdown.style.display = "none";
        }

        function toggleSidebar() {
            var sidebar = document.getElementById("sidebarMenu");
            sidebar.classList.toggle("active");
        }
    </script>


</body>

</html>
