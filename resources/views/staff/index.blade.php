@extends('../navigation')
@section('bootstrap')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
@endsection
@section('title','Dashboard')
@section('header')
<?php 
  echo 'Welcome '.$LoggedUserInfo['NOM'].'  !';
?>
@endsection

@section('main_content')

  <center>
    <table>
      <tr>
        <td><label for="emploi" style="font-size: 24px">Consulting the time table:</label><br></td>
      </tr>
      <tr>
        <td>
          <form action="/staff/viewTimeTable" method="post">
            @csrf
          <select required name="emploi" id="emploi" style="min-width: 170px;min-height:50px;font-size: 25px" >
            <option selected="selected" style="font-size: 25px"></option>
            <option value="#" style="font-size: 25px">1s1</option>
            <option value="#" style="font-size: 25px">1s2</option>
            <option value="#" style="font-size: 25px">1s3</option>
            <option value="#" style="font-size: 25px">2e1</option>
          
            <option value="#" style="font-size: 25px">2e2</option>
            <option value="#" style="font-size: 25px">2inf1</option>
            <option value="#" style="font-size: 25px">2inf2</option>
            <option value="#" style="font-size: 25px">2e1</option>
          
            <option value="#" style="font-size: 25px">2e2</option>
            <option value="#" style="font-size: 25px">2l1</option>
            <option value="#" style="font-size: 25px">2l2</option>
            <option value="#" style="font-size: 25px">3e1</option>
          
            <option value="#" style="font-size: 25px">3e2</option>
            <option value="#" style="font-size: 25px">3inf1</option>
            <option value="#" style="font-size: 25px">3inf2</option>
            <option value="#" style="font-size: 25px">3m1</option>
          
            <option value="#" style="font-size: 25px">3m2</option>
            <option value="#" style="font-size: 25px">4e1</option>
            <option value="#" style="font-size: 25px">4e2</option>
            <option value="#" style="font-size: 25px">4inf1</option>
          
            <option value="#" style="font-size: 25px">4inf2</option>
            <option value="#" style="font-size: 25px">4m1</option>
            <option value="#" style="font-size: 25px">4m2</option>
          </select>
        </td>
        <td>
          <button type="submit" class="btn btn-primary" style="background-color: SlateBlue" href="">Show</button>
        </form>

        </td>
      </tr>
      
        
      
    </table>
  </center>
  
@endsection()

@section('nav_dashboard')
<li><a href="/staff/index"><i class="fas fa-home"></i>Dashboard</a></li>
@endsection

@section('nav_profile')
<li><a href="/staff/profile"><i class="fas fa-user"></i>Profile</a></li>
@endsection

@section('nav_news')
<li><a href="/staff/news"><i class="fas fa-newspaper"></i>News</a></li>  
@endsection