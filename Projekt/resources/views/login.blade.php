<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <div class="login-box">
    <h2>Login</h2>
    <div class="mt-5">
        @if ($errors->any())
            <div class="col-12">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            </div>
        @endif

        @if (session()->has('error'))
            <div class="alert alert-danger">{{session('error')}}</div>
        @endif

        @if (session()->has('success'))
            <div class="alert alert-success">{{session('success')}}</div>
        @endif
    </div>
    <form action="{{route('login.post')}}" method="POST">

        @csrf

      <div class="user-box">
        <input type="text" name="user_name" required="">
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Password</label>
      </div>
      <a href="{{ route('registration') }}" class="btn btn-primary">
        Sign in
      </a>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
  </div>
</body>
</html>
