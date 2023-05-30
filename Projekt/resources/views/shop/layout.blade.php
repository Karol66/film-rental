<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="/css/user_panel.css">

    <style>
        .product-name {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .price-quantity {
            display: flex;
            align-items: center;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .price-quantity .price {
            flex: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .price-quantity .count {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .dropdown-menu {
            min-width: 300px;
            max-width: 500px;
            background-color: #343a40;
            padding: 10px;
        }


        .dropdown-menu .total-section p,
        .dropdown-menu .product-name,
        .dropdown-menu .price-quantity .price,
        .dropdown-menu .count,
        .dropdown-menu .checkout a {
            color: #fff;
        }

        .cart-detail-img img {
            width: 100%;
            height: auto;
        }
    </style>

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

    <div class="container pt-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

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
    </script>
</body>

</html>
