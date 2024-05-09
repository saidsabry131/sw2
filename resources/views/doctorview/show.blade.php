@extends('layout')
@section('content')
    <div class="container">
        <h1>Students for Course: </h1>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Grade Score</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        {{-- <td>{{ $student->grade_score }}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Add any additional navigation or buttons as needed -->
    </div>
@endsection
