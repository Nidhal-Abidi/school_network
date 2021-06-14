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
<li><a href="/parent/index"><i class="fas fa-home"></i>Dashboard</a></li>
@endsection

@section('nav_profile')
<li><a href="/parent/profile"><i class="fas fa-user"></i>Profile</a></li>
@endsection

@section('nav_news')
<li><a href="/parent/news"><i class="fas fa-newspaper"></i>News</a></li>  
@endsection

@section('nav_msg')
<li><a href="/parent/msg" style="text-decoration: none"><i class="fas fa-comments"></i>Messaging</a></li>
@endsection

@section('scriptsJS')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection