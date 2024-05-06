@extends('layouts.app')
@section('content')
 
<div class="card">
  <div class="card-header">student applacition</div>
  <div class="card-body">
      
    <form action="{{ url('students') }}" method="post">
      @csrf
      <label for="name">Name</label><br>
      <input type="text" name="name" id="name" class="form-control"><br>
  
      <label for="address">Address</label><br>
      <input type="text" name="address" id="address" class="form-control"><br>
  
      <label for="Phone">Phone</label><br>
      <input type="text" name="Phone" id="Phone" class="form-control"><br>
  
      <div class="form-group">
          <label for="age">Birthdate</label><br>
          <input type="date" class="form-control" id="age" name="age">
      </div>
  
      <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="maleradio" checked value="male">
          <label class="form-check-label" for="maleradio">
              Male
          </label>
      </div>
      <div class="form-check">
          <input class="form-check-input" type="radio" name="gender" id="femaleradio" value="female">
          <label class="form-check-label" for="femaleradio">
              Female
          </label>
      </div>
  
      <input type="submit" value="Save" class="btn btn-success"><br>
  </form>
  
   
  </div>
</div>
 
@stop