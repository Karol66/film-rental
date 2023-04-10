<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <div class="login-box">
    <h2>Registration</h2>
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
    <form action="{{route('registration.post')}}" method="POST">

        @csrf

      <div class="user-box">
            <input type="email" name="email" required="">
            <label>Email</label>
      </div>
      <div class="user-box">
        <input type="text" name="name" required="">
        <label>Name</label>
      </div>
      <div class="user-box">
        <input type="text" name="lastName" required="">
        <label>Last name</label>
      </div>
      <div class="user-box">
        <input type="text" name="userName" required="">
        <label>User name</label>
      </div>
      <div class="user-box">
        <input type="password" name="password" required="">
        <label>Password</label>
      </div>
      <div class="user-box">
        <input type="password" name="" required="">
        <label>Repeat password</label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="login">
        Log in
      </a>
    </form>
  </div>
</body>
</html>
