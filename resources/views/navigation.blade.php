<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<link rel="stylesheet" href="{{ url('./css/navigationCSS.css') }}">
    @yield('profilecss_link')
    @yield('bootstrap')
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>

<div class="wrappernav">
    <div class="sidebar">
        <h2>School Network</h2>
        <ul>
            @yield('nav_dashboard')
            @yield('nav_profile')
            @yield('nav_news')  
            @yield('nav_attendance')     
            <li><a href="#"><i class="fas fa-project-diagram"></i>#</a></li>
            <li><a href="#"><i class="fas fa-blog"></i>#</a></li>
            
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

@yield('scriptsJS')

</body>
</html>