@extends('../navigation')
@section('title','Profile')
@section('profilecss_link')
<link rel="stylesheet" href="{{ url('./css/profileCSS.css') }}">
@endsection

@section('header')
<?php 
  echo $LoggedUserInfo['NOM'].'  Profile';
?>
@endsection

@section('main_content')
<div class="wrapper">
  <div class="left">
      <img src="https://www.computerhope.com/jargon/g/guest-user.jpg" 
      alt="user" width="100">
      <h2><?php echo $LoggedUserInfo['NOM'].' '.$LoggedUserInfo['PRENOM']; ?></h2>
      
      <h5><?php 
            switch ($LoggedUserInfo['TYPE_COMPTE']) {
              case "enseignant":
                echo "TEACHER";
                break;
              case "personnel":
                echo "STAFF";
                break;
              case "eleve":
                echo "STUDENT";
                break;
              case "parent":
                echo "PARENT";
                break;
            }
          ?>
      </h5>

  </div>
  <div class="right">
      <div class="info">
          <h3>Information</h3>
          <div class="info_data">
               <div class="data">
                  <h4>Email</h4>
                  <p><?php echo $LoggedUserInfo['EMAIL']; ?></p>
               </div>
               <div class="data">
                 <h4>Birthday</h4>
                  <p><?php echo $LoggedUserInfo['DATENAIS']; ?></p>
            </div>
          </div>
      </div>
    <div class="projects">
          <h3>Other</h3>
          <div class="projects_data">
                <div class="data">
                  <h4>Phone Number</h4>
                  <p><?php echo $LoggedUserInfo['NUMTEL']; ?></p>
                </div>
                <div class="data">
                 <h4>Post</h4>
                  <p><?php echo $LoggedUserInfo['POSTE']; ?></p>
                </div>   
          </div>
      </div> 
      <div class="social_media">
        <ul>
          <li><a href="/staff/profileupdate">Update Info!</a></li>
        </ul>
      </div>
    </div>
  </div>
@endsection()

@section('nav_dashboard')
<li><a href="/staff/index" style="text-decoration: none"><i class="fas fa-home"></i>Dashboard</a></li>
@endsection

@section('nav_profile')
<li><a href="/staff/profile" style="text-decoration: none"><i class="fas fa-user"></i>Profile</a></li>
@endsection

@section('nav_news')
<li><a href="/staff/news" style="text-decoration: none"><i class="fas fa-newspaper"></i>News</a></li>  
@endsection

@section('nav_msg')
<li><a href="/staff/msg" style="text-decoration: none"><i class="fas fa-comments"></i>Messaging</a></li>
@endsection