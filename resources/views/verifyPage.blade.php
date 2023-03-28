<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verify Email</title>
</head>
<body style="background: brown">
    <h1>Verify Your Email</h1>
    
    @if (Session::has('verify_now'))
          <div class="alert alert-success">{{Session::get('verify_now')}}</div>
        @endif

        @if (Session::has('invalid_code'))
        <div class="alert alert-danger">{{Session::get('invalid_code')}}</div>
      @endif

    <form action="/var">
        @csrf
    <label for="verify">Enter Code</label>
    <input type="text" class="form-control" id="" name="verify">
    @error('verify')
        {{$message}}
    @enderror
        <br>
        <button type="submit" class="btn btn-primary">submit</button>

</form>

    

</body>
</html>