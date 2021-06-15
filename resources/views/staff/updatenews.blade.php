@extends('../navigation')
@section('bootstrap')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>
@endsection
@section('title','Update News')
@section('header')
<?php 
  echo 'Update News !';
?>
@endsection

@section('main_content')
<div style="width: 500px;">
  <form action="/staff/news/saveupdatednews" method="post">
    @csrf 
    @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
    @endif

    <div class="form-group">
      <label for="categorie">Enter the Categorie of the news that you want to update :</label>
      <input type="text" class="form-control" id="categorie" name="categorie" value="{{ old('categorie') }}">
      @error('categorie') <span style="color: red"> {{ $message }} </span> @enderror
    </div>

    <div class="form-group">
      <label for="body">Enter the new Body</label>
      <textarea  class="form-control" id="body" name="body" value="{{ old('body') }}"></textarea>
      @error('body') <span style="color: red"> {{ $message }} </span> @enderror
    </div>

    <button type="submit" class="btn btn-primary" style="background-color: #6f6894;">Update</button>
  </form>
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

@section('scriptsJS')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection