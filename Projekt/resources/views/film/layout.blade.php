<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="/css/style.css"> --}}
</head>

<body>

    <Style>
        body {
            background-color: #1c1f23;
            color: white;
            padding: 0;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto;
            background-color: #1c1f23;
            padding: 10px;
        }

        .grid-item {
            background-color: transparent;
            padding: 20px;
            font-size: 30px;
            text-align: center;
        }

        a:link {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
            color: black;
        }

        #margin {
            margin-top: 70px;
        }


        .imidz {
            width: 110px;
            height: 150px;
        }

        .film-details {
            display: flex;
            align-items: center;
        }

        .film-image {
            width: 250px;
            height: 375px;
            margin-right: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(255, 255, 255, 0.5);
        }

        .image-wrapper {
            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 10px;
        }

        .film-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .gray-background {
            background-color: #1c1f23;
            color: white;
            border-color: rgba(255, 255, 255, 0.445);
        }


        .pagination {
            background-color: transparent;
            color: white;
            padding: 5px;
            border-radius: 5px;
        }

        .pagination a {
            background-color: transparent;
            border-color: transparent;
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 3px;
        }

        .pagination a:hover {
            background-color: #b02323;
            border-color: transparent;
            color: white;
        }

        .pagination .disabled .page-link {
            background-color: transparent;
            border-color: transparent;
            color: white;
        }

        .pagination .page-item.active .page-link {
            background-color: #b02323;
            border-color: transparent;
            color: white;
            padding: 8px 12px;
            border-radius: 3px;
        }

        .table button {
            height: 35px;
            width: 35px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            margin-right: 5px;
        }

        table thead th {
            text-align: center;
        }

        table tbody td {
            font-size: 20px;
            text-align: center;
            vertical-align: middle;
        }

        .admin-bar {
            position: sticky;
            top: 0;
            background-color: transparent;
            padding: 10px;
            height: 100%;
            width: 103%;
        }

        .admin-bar ul {
            padding: 0;
            margin: 0;
            list-style-type: none;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .admin-bar ul li {
            margin-bottom: 10px;
        }

        .admin-bar a {
            text-decoration: none;
            color: white;
        }

        #scrollable-wrapper {
            overflow-y: auto;
            height: 94vh;
            margin-left: auto;
            padding: 20px;
        }

    </Style>


    <div class="container">
        @yield('content')
    </div>

</body>

</html>
