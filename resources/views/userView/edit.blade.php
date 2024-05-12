@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Edit Contact Information</div>
  <div class="card-body">
    <form action="{{ url('users/' .$user->id) }}" method="post">
      @csrf
      @method('PATCH')
      
      <label for="address">Address</label><br>
      <input type="text" name="address" id="address" value="{{$user->address}}" class="form-control"><br>
      <label for="phone">Phone</label><br>
      <input type="text" name="phone" id="phone" value="{{$user->phone}}" class="form-control"><br>
      <label for="email">Email</label><br>
      <input type="text" name="email" id="email" value="{{$user->email}}" class="form-control"><br>
      <input type="submit" value="Update" class="btn btn-success"><br>
    </form>
  </div>
</div>

@stop
