@extends('../navigation')
@section('title','Dashboard')
@section('header')
<?php 
  echo 'Welcome '.$LoggedUserInfo['NOM'].'  !';
?>
@endsection

@section('main_content')

<p>Here we'll have a Timetable + other infos maybe !</p>

@endsection()

@section('nav_dashboard')
<li><a href="/student/index"><i class="fas fa-home"></i>Dashboard</a></li>
@endsection

@section('nav_profile')
<li><a href="/student/profile"><i class="fas fa-user"></i>Profile</a></li>
@endsection
