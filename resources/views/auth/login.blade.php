<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-color: #d3d3d3 ;">

<div class="container" >
   <div class="row centered-form center-block" style="margin-top:45px">
      <div class="container col-md-5 col-md-offset-1">
           <h4>Login</h4><hr>

           <form action="/auth/check" method="post">

            @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
            @endif

           @csrf
              <div class="form-group">
                 <label>Login</label>
                 <input type="text" class="form-control" name="login" placeholder="Enter your Login" value="{{ old('login') }}" >
                 <span class="text-danger">@error('login'){{ $message }} @enderror</span>
              </div>

              <div class="form-group">
                 <label>Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Enter password">
                 <span class="text-danger">@error('password'){{ $message }} @enderror</span>
              </div>

              <button type="submit" class="btn btn-block btn-primary">Sign In</button>
              <br>
              
              <!-- <a href="#">I don't have an account, create new</a> -->
           </form>
      </div>
   </div>
</div>

</body>
</html>