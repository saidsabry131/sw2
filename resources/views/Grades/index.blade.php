@extends('layout')

@section('content')
<div class="container">
    <div class="card mb-4">
        <div class="card-header">
            <h3>Student Grades</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Course Code</th>
                        <th>Grade Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($studentGrades as $grade)
                    <tr>
                        <td>{{ $grade->name }}</td>
                        <td>{{ $grade->course_code }}</td>
                        <td>{{ $grade->grade_score }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
