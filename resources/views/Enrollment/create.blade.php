@extends('layout')

@section('content')
<div class="container">
    <h2>Sign Up for Courses</h2>
    <form action="{{ route('enrollment.store') }}" method="POST">
        @csrf

        @for ($i = 1; $i <= 6; $i++)
        <div class="form-group">
            <label for="course{{ $i }}">Course {{ $i }}:</label>
            <select name="courses[]" id="course{{ $i }}" class="form-control" required>
                <option value="">Select Course</option>
                @foreach ($courses as $course)
                <option value="{{ $course->course_code }}">{{ $course->course_code }} - {{ $course->course_name }}</option>
                @endforeach
            </select>
        </div>
        @endfor

        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>
@endsection
