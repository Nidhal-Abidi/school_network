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

@section('nav')
<li><a href="/dashboard/parent"><i class="fas fa-home"></i>Dashboard</a></li>
@endsection