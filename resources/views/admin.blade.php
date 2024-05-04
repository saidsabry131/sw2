{{-- resources/views/admin/home.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    @auth
    <h1>Welcome, Admin!</h1>
    @endauth
    
    <p>This is your home page.</p>
    <!-- Add any other content you want for the admin's home page -->
</div>
@endsection
