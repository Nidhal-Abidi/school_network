@extends('../navigation')
@section('title','Dashboard')
@section('header')
<?php 
  echo 'Welcome '.$LoggedUserInfo['NOM'].'  !';
?>
@endsection

@section('main_content')
@include('../timetable')
@endsection()

@section('nav_dashboard')
<li><a href="/parent/index" style="text-decoration: none"><i class="fas fa-home"></i>Dashboard</a></li>
@endsection

@section('nav_profile')
<li><a href="/parent/profile" style="text-decoration: none"><i class="fas fa-user"></i>Profile</a></li>
@endsection

@section('nav_news')
<li><a href="/parent/news" style="text-decoration: none"><i class="fas fa-newspaper"></i>News</a></li>  
@endsection

@section('nav_msg')
<li><a href="/parent/msg" style="text-decoration: none"><i class="fas fa-comments"></i>Messaging</a></li>
@endsection
