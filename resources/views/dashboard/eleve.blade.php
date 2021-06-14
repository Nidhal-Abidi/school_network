  @extends('../navigation')
  @section('title','Dashboard')
  @section('header')
  <?php 
  echo 'Welcome '.$LoggedUserInfo['NOM'].'  !';
  ?>
  @endsection

  @section('main_content')

  
  
  @endsection()

  @section('nav')
  <li><a href="/dashboard/eleve"><i class="fas fa-home"></i>Dashboard</a></li>
  @endsection