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
  <form action="/teacher/studentattendance" method="post" required>
    @csrf
    @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
    @endif

    <div class="form-group">
      <label for="filiere">Choose the Section:</label>
      <select name="filiere" id="filiere" required>
        @forelse ($filiere as $fil)
          <option value="{{ $fil }}">{{ $fil }}</option>
        @empty
          <?php echo '<span style="color:red">No Sections in DB !</span>';  ?> 
        @endforelse
      </select>
      @error('filiere') <span style="color: red"> {{ $message }} </span> @enderror
    </div>

    <div class="form-group">
      <label for="niveau">Choose the Level:</label>
      <select name="niveau" id="niveau" required>
        @forelse ($niveau as $niv)
          <option value="{{ $niv }}">{{ $niv }}</option>
        @empty
          <?php echo '<span style="color:red">No Sections in DB !</span>';  ?> 
        @endforelse
      </select>
      @error('niveau') <span style="color: red"> {{ $message }} </span> @enderror
    </div>

    <div class="form-group">
      <label for="classe">Choose the Class:</label>
      <select name="classe" id="classe" required>
        @forelse ($classes as $class)
          <option value="{{ $class }}">{{ $class }}</option>
        @empty
          <?php echo '<span style="color:red">No classes in DB !</span>';  ?> 
        @endforelse
      </select>
      @error('classe') <span style="color: red"> {{ $message }} </span> @enderror
    </div>

    <div class="form-group">
      <label for="datesem">Choose the Week Date:</label>
      <input type="date" name="datesem" id="datesem" required>
      @error('datesem') <span style="color: red"> {{ $message }} </span> @enderror
    </div>

    <div class="form-group">
      <label for="days">Choose the Day:</label>
      <select name="days" id="days" required>
          <option value="0">Monday</option>
          <option value="1">Tuesday</option>
          <option value="2">Wednesday</option>
          <option value="3">Thursday</option>
          <option value="4">Friday</option>
          <option value="5">Saturday</option>
      </select>
      @error('days') <span style="color: red"> {{ $message }} </span> @enderror
    </div>

    <div class="form-group">
      <label for="beg_h">Choose the Beginning hour:</label>
      <select name="beg_h" id="beg_h" required>
          <option value="08:00:00">08:00</option>
          <option value="09:00:00">09:00</option>
          <option value="10:00:00">10:00</option>
          <option value="11:00:00">11:00</option>
          <option value="12:00:00">12:00</option>
          <option value="13:00:00">13:00</option>
          <option value="14:00:00">14:00</option>
          <option value="15:00:00">15:00</option>
          <option value="16:00:00">16:00</option>
          <option value="17:00:00">17:00</option>
          <option value="18:00:00">18:00</option>
      </select>
      @error('beg_h') <span style="color: red"> {{ $message }} </span> @enderror
    </div>

    <button type="submit" class="btn btn-primary" style="background-color: #6f6894;">Begin the Attendance</button>
  </form>
</div>

@endsection()

@section('nav_dashboard')
<li><a href="/teacher/index"><i class="fas fa-home"></i>Dashboard</a></li>
@endsection

@section('nav_profile')
<li><a href="/teacher/profile"><i class="fas fa-user"></i>Profile</a></li>
@endsection

@section('nav_news')
<li><a href="/teacher/news"><i class="fas fa-newspaper"></i>News</a></li>  
@endsection

@section('nav_attendance')
<li><a href="/teacher/chooseclass"><i class="fas fa-address-book"></i>Attendance</a></li>
@endsection
 