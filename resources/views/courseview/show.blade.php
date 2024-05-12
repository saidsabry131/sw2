@extends('layout')

@section('content')
<div class="container">
    <!-- User Information Card -->
    <div class="card mb-4">
        <div class="card-header">
            <h3>User Information</h3>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>ID:</strong> {{ $student->id }}</p>
        </div>
    </div>

    <!-- Course List Card -->
    <div class="card">
        <div class="card-header">
            <h4>Courses Signed by Student</h4>
        </div>
        <div class="card-body">
            <h4>Course List:</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Grade Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->course_code }}</td>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->grade_score }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
