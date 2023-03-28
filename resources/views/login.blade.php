<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>LogIn</title>
</head>
<body style="background:blueviolet">
    
    <form action="/login" method="POST">
        @csrf
        <div class="form-group">
          @if (Session::has('reg_success'))
          <div class="alert alert-success">{{Session::get('reg_success')}}</div>
        @endif

        @if (Session::has('logout_success'))
        <div class="alert alert-success">{{Session::get('logout_success')}}</div>
      @endif

          <label for="email">Email</label>
          <input type="email" value="{{old('email')}}" class="form-control" id="" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          @error('email')
             <div class="alert alert-danger"> {{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="" name="password" placeholder="Password">
          @error('password')
              {{$message}}
          @enderror
          @if (Session::has('no_match'))
          <div class="alert alert-danger">{{Session::get('no_match')}}</div>
        @endif
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
      </form>

      <a style="color:cyan" href="/register">New user ? Register Here</a>
      


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>