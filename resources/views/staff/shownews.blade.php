@extends('../navigation')
@section('bootstrap')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>
@endsection
@section('title','News')
@section('header')
<?php 
  echo 'News !';
?>
@endsection

@section('main_content')

<?php

echo '<a href="/staff/news/create"><button type="button" class="btn btn-primary">Create News</button></a>
      <a href="/staff/news/update"><button type="button" class="btn btn-primary">Update News</button></a>
      <a href="/staff/news/delete"><button type="button" class="btn btn-primary">Delete News</button></a>
      <br><br>';

$numbers=['One','Two','Three','Four','Five','Six','Seven','Eight','Nine','Ten'];
echo '<div class="container"><div id="accordion">';
$i=0;

foreach($actualite as $act){
    echo '<div class="card"><a class="card-link card-header" data-toggle="collapse" href="#collapse'.$numbers[$i].'">';
  
    echo  $act->CATEGORIE.'</a>';
    echo '<div id="collapse'.$numbers[$i].'" class="collapse" data-parent="#accordion"> <div class="card-body" style="color:black">';
    echo  $act->BODY;
    echo '<br><br><p style="font-size: small;">Created At:'.$act->CREATED_AT.'<br>Updated At '.$act->UPDATED_AT.'</p>';
    echo '</div></div></div>';
    $i++;
}
echo '</div></div>';

?>
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

@section('scriptsJS')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection