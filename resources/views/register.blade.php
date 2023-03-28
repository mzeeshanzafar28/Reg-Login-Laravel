<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Register</title>
</head>
<body style="background:blueviolet">
    @if(Session::has('message'))
    <p class="text-danger">{{ Session::get('message') }}</p>
    @endif
    <form action="/register" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="" name="name" placeholder="Enter name">
            @error('name')
            <div class="alert alert-danger"> {{$message}}</div>
          @enderror
          </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="" name="email" aria-describedby="emailHelp" placeholder="Enter email">
          @error('email')
          <div class="alert alert-danger"> {{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="" name="password" placeholder="Password">
          @error('password')
          <div class="alert alert-danger"> {{$message}}</div>
          @enderror
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" class="form-control" id="" name="password_confirmation" placeholder="Re-Enter Password">
            @if (Session::has('mismatch'))
            <div class="alert alert-danger">{{Session::get('mismatch')}}</div>
          @endif
            @error('confirm_password')
            <div class="alert alert-danger">{{$message}}</div>
          @enderror
          </div>
        <button type="submit" class="btn btn-primary">Register</button>
      </form>
      <a style="color:cyan" href="/login">Already Registered ? Login Here</a>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</html>