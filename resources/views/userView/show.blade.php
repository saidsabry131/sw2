@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">user Page</div>
  <div class="card-body">
   
 
        <div class="card-body">
          
        <h5 class="card-title">Name : {{ $user->name }}</h5>
        <p class="card-text">ID : {{ $user->id }}</p>
        <p class="card-text">Address : {{ $user->address }}</p>
        <p class="card-text">Phone : {{ $user->phone }}</p>
        <p class="card-text">Email : {{ $user->email }}</p>
  </div>
       
    </hr>
  
  </div>
</div>

<br>
<div class="card">
    <div class="card-header">Courses Sign</div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Course Code</th>
                    <th>Course degree</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $result)
                <tr>
                    <td>{{ $result->course_name }}</td>
                    <td>{{ $result->course_code }}</td>
                    <td>{{ $result->grade_score }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection