@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">User Information</div>
  <div class="card-body">
    <div class="card-body">
      <h5 class="card-title">Name : {{ $user->name }}</h5>
      <p class="card-text">ID : {{ $user->id }}</p>
      <p class="card-text">Address : {{ $user->address }}</p>
      <p class="card-text">Phone : {{ $user->phone }}</p>
      <p class="card-text">Email : {{ $user->email }}</p>
    </div>
    <hr>
    <!-- Button to trigger edit modal or page -->
    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
  </div>
</div>
@endsection
