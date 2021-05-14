@extends('../navigation')
@section('title','Edit Profile')
@section('profilecss_link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ url('./css/profileCSS.css') }}">
@endsection

@section('header')
<?php 
  echo $LoggedUserInfo['NOM'].'  Profile';
?>
@endsection

@section('main_content')
<div style="width: 500px;">
  <form action="/student/update" method="post">
    @csrf 
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" id="email" name="email" value="<?php echo $LoggedUserInfo['EMAIL'] ?>">
      @error('email') <span style="color: red"> {{ $message }} </span> @enderror
    </div>

    <div class="form-group">
      <label for="pwd">Password</label>
      <input type="password" class="form-control" id="pwd" name="pwd" value="<?php echo $LoggedUserInfo['PWD'] ?>">
      @error('pwd') <span style="color: red"> {{ $message }} </span> @enderror
    </div>
    
    <div class="form-group">
      <label for="numtel">Phone Number</label>
      <input type="Number" class="form-control" id="numtel" name="numtel" value="<?php echo $LoggedUserInfo['NUMTEL'] ?>" >
      @error('numtel') <span style="color: red"> {{ $message }} </span> @enderror
    </div>

    <button type="submit" class="btn btn-primary" style="background-color: #6f6894;">Update</button>
  </form>
</div>
@endsection()

@section('nav_dashboard')
<li><a href="/student/index"><i class="fas fa-home"></i>Dashboard</a></li>
@endsection

@section('nav_profile')
<li><a href="/student/profile"><i class="fas fa-user"></i>Profile</a></li>
@endsection



 