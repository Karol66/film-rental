<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <div class="login-box">
    <h2>Login</h2>
    <form action="{{route('login.post')}}" method="POST">

        @csrf

      <div class="user-box">
        <input type="text" name="userName" required="">
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Password</label>
      </div>
      <a href="registration">
        Sign in
      </a>
      <a href="index.html">
        Log in
      </a>
    </form>
  </div>
</body>
</html>
