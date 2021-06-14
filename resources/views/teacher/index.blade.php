@extends('../navigation')
@section('title','Dashboard')
@section('header')
<?php 
  echo 'Welcome '.$LoggedUserInfo['NOM'].'  !';
?>
@endsection

@section('main_content')

@include('teacher_timetable')
@endsection()

@section('nav_dashboard')
<li><a href="/teacher/index"><i class="fas fa-home"></i>Dashboard</a></li>
@endsection

@section('nav_profile')
<li><a href="/teacher/profile"><i class="fas fa-user"></i>Profile</a></li>
@endsection

@section('nav_news')
<li><a href="/teacher/news"><i class="fas fa-newspaper"></i>News</a></li>  
@endsection

@section('nav_attendance')
<li><a href="/teacher/chooseclass"><i class="fas fa-address-book"></i>Attendance</a></li>
@endsection
 