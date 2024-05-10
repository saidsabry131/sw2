@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

 

<div class="card">
  <div class="card-header">user Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
          
        {{-- <h5 class="card-title">Name : {{ $user->name }}</h5>
        <p class="card-text">ID : {{ $user->id }}</p>
        <p class="card-text">Address : {{ $user->address }}</p>
        <p class="card-text">Phone : {{ $user->phone }}</p>
        <p class="card-text">Email : {{ $user->email }}</p> --}}
  </div>
       
    </hr>
  
  </div>
</div>
@endsection
