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

    @cannot('admin-only-action')
        
    
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
                        @if ($student->user_type==="student")
                        <th>Grade Score</th>
                        @endif
                        <th>Department </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($courses as $course)
                    <tr>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->course_code }}</td>
                        @if ($student->user_type==="student")
                        <td>{{ $course->grade_score }}</td> 
                        @endif
                        
                        <td>{{ $course->depart_code }}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endcan


@can("admin-only-action")
    


<div class="container">
    <div class="card mb-4">
        <div class="card-header">
            <h3>Course Details</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Course Name</th>
                        <th>Course Code</th>
                        
                        <th>Number of Students</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $course)
                    <tr>
                        <td>{{ $course->course_name }}</td>
                        <td>{{ $course->course_code }}</td>
                        
                        <td>{{ $course->student_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endcannot
@endsection
