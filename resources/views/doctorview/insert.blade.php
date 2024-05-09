@extends('layout')
@section('content')
    <div class="container">
        <h1>Insert Student Grade</h1>
        <form action="{{ route('doctor.insert') }}" method="POST">
            @csrf

            <!-- Form fields for user ID, course code, and grade score -->
            <div class="form-group">
                <label for="user_id">Student ID (User ID):</label>
                <input type="number" name="user_id" id="user_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="course_code">Course Code:</label>
                <input type="text" name="course_code" id="course_code" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="grade_score">Grade Score:</label>
                <input type="number" step="0.01" name="grade_score" id="grade_score" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Insert</button>

            <!-- Button to show all students signed up for the entered course code -->
            <a href="{{ route('doctor.show', ['course_code' => old('course_code')]) }}"
               class="btn btn-secondary mt-3">
               Show Students for Course
            </a>
        </form>
    </div>
@endsection
