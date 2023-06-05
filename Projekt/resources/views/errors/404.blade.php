<!DOCTYPE html>
<html>
<head>
    <title>404 - Not Found</title>
    <style>
        body {
            background-color: #1c1f23;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            height: 100vh;
            margin: 0;
        }

        h1, p {
            text-align: center;
            font-size: 32px;
        }

        .image-container {
            margin-top: 20vh;
            margin-bottom: 20px;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            object-fit: contain;
        }

        /* Responsywność */
        @media (max-width: 600px) {
            h1, p {
                font-size: 24px;
            }

            .image-container img {
                height: 200px;
            }
        }
    </style>
</head>
<body>
    <h1>404 - Not Found</h1>
    <p>The requested page could not be found.</p>
    <div class="image-container">
        <img src="\img\cave_error.png" class="m-0">
    </div>
</body>
</html>
