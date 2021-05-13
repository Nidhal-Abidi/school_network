<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ url('./css/navigationCSS.css') }}">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2>School Network</h2>
        <ul>
            @yield('nav')
            <li><a href="#"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="#"><i class="fas fa-address-card"></i>#</a></li>
            <li><a href="#"><i class="fas fa-project-diagram"></i>#</a></li>
            <li><a href="#"><i class="fas fa-blog"></i>#</a></li>
            <li><a href="#"><i class="fas fa-address-book"></i>#</a></li>
            <li><a href="#"><i class="fas fa-map-pin"></i>#</a></li>
            <li><a href="/auth/logout"><i class="fas fa-sign-out-alt"></i>Log Out</a></li>
        </ul> 
        
    </div>
    <div class="main_content">
        <div class="header">@yield('header')</div>  
        <div class="info">
          @yield('main_content')
    </div>
</div>

</body>
</html>