@extends('../navigation')
@section('title','Dashboard')
@section('header')
@section('messagingCSS')
<link rel="stylesheet" href="{{ url('./css/messagingCSS.css') }}">
@endsection

@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@endsection
<?php 
  echo 'Messaging';
?>
@endsection

@section('main_content')

@include('../msg')

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
