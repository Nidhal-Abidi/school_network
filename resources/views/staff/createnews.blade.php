@extends('../navigation')
@section('bootstrap')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"/>
@endsection
@section('title','Create News')
@section('header')
<?php 
  echo 'Create News !';
?>
@endsection

@section('main_content')
<div style="width: 500px;">
  <form action="/staff/news/save" method="post">
    @csrf 
    @if(Session::get('fail'))
               <div class="alert alert-danger">
                  {{ Session::get('fail') }}
               </div>
    @endif
    <div class="form-group">
      <label for="categorie">Categorie</label>
      <input type="text" class="form-control" id="categorie" name="categorie" value="{{ old('categorie') }}">
      @error('categorie') <span style="color: red"> {{ $message }} </span> @enderror
    </div>

    <div class="form-group">
      <label for="body">Body</label>
      <textarea  class="form-control" id="body" name="body" value="{{ old('body') }}"></textarea>
      @error('body') <span style="color: red"> {{ $message }} </span> @enderror
    </div>
    
    <div class="form-group">
      <label for="filiere">Choose one or multiple fields:</label>
      <br>
      <select name="filiere[]" id="filiere" multiple="multiple" required>
        <option value="general">General</option>
        <option value="eco_gestion">Economy Management</option>
        <option value="info">Computer Science</option>
        <option value="lettres">Letters</option>
        <option value="math">Mathematics</option>
        <option value="science">Science</option>
        <option value="technique">Technology</option>
      </select>
      @error('filiere') <span style="color: red"> {{ $message }} </span> @enderror
    </div>

    <div class="form-group">
      <label for="niveau">Choose one or multiple fields:</label>
      <br>
      <select name="niveau[]" id="niveau" multiple required>
        <option value="1">First Year</option>
        <option value="2">Second Year</option>
        <option value="3">Third Year</option>
        <option value="4">Forth Year</option>
      </select>
      @error('niveau') <span style="color: red"> {{ $message }} </span> @enderror
    </div>

    <button type="submit" class="btn btn-primary" style="background-color: #6f6894;">Create</button>
  </form>
</div>
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

@section('scriptsJS')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection