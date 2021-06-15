@extends('../navigation')
@section('title','Attendance')
@section('profilecss_link')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ url('./css/profileCSS.css') }}">
@endsection

@section('header')
<?php 
  echo 'Attendance';
?>
@endsection

@section('main_content')
<div style="width: 500px;">
  <form action="/teacher/saveabsentstudents" method="post" required>
    @csrf
    @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
    </div>
    @endif

<?php echo '<div class="form-group">';?>
  
  @forelse ($arrStudents as $key=>$value)
  <div class="form-check">
    <input class="form-check-input" type="checkbox" value="{{$key}}" id="{{$key}}" name="absentStudents[]">
    <label class="form-check-label" for="{{$key}}">{{$value}}</label>
  </div>
  @empty
    <?php echo 'No students are registered to the chosen class !';?>
  @endforelse
  <?php  echo '</div>'; ?>    


    <button type="submit" class="btn btn-primary" style="background-color: #6f6894;">Save Absent Students</button>
  </form>
</div>

@endsection()

@section('nav_dashboard')
<li><a href="/teacher/index" style="text-decoration: none"><i class="fas fa-home"></i>Dashboard</a></li>
@endsection

@section('nav_profile')
<li><a href="/teacher/profile" style="text-decoration: none"><i class="fas fa-user"></i>Profile</a></li>
@endsection

@section('nav_news')
<li><a href="/teacher/news" style="text-decoration: none"><i class="fas fa-newspaper"></i>News</a></li>  
@endsection

@section('nav_attendance')
<li><a href="/teacher/chooseclass" style="text-decoration: none"><i class="fas fa-address-book"></i>Attendance</a></li>
@endsection

@section('nav_msg')
<li><a href="/teacher/msg" style="text-decoration: none"><i class="fas fa-comments"></i>Messaging</a></li>
@endsection