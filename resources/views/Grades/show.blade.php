@extends('layout')

@section('content')
<div class="card">
    <div class="card-header">Courses Scores</div>
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
                    <td><a href="http://">{{ $result->course_name }}</a></td>
                    <td>{{ $result->course_code }}</td>
                    <td>{{ $result->grade_score }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
