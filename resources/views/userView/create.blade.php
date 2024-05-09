{{-- @extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Add New User</div>
    <div class="card-body">

        <form action="{{ url('/users') }}" method="post">
            {!! csrf_field() !!}

            <!-- Name field -->
            <label>Name</label><br>
            <input type="text" name="name" id="name" class="form-control" required><br>

            <!-- Email field -->
            <label>Email</label><br>
            <input type="email" name="email" id="email" class="form-control" required><br>

            <!-- Password field -->
            <label>Password</label><br>
            <input type="password" name="password" id="password" class="form-control" required><br>

            <!-- User type field -->
            <label>User Type</label><br>
            <select name="user_type" id="user_type" class="form-control" onchange="">
                <option value="student">Student</option>
                <option value="doctor">Doctor</option>
                <option value="admin">Admin</option>
            </select><br>

            <!-- Subject input fields (initially hidden) -->
            <div id="course_input" style="display: none;">
                <!-- Course Code -->
                <label>Course Code</label><br>
                <input type="text" name="course_code" id="course_code" class="form-control"><br>

                <!-- Course Name -->
                <label>Course Name</label><br>
                <input type="text" name="course_name" id="course_name" class="form-control"><br>

                <!-- Course Description -->
                <label>Course Description</label><br>
                <textarea name="course_desc" id="course_desc" class="form-control"></textarea><br>

                <!-- Course Department -->
                <label>Course Department</label><br>
                <select name="course_depart" id="course_depart" class="form-control" required>
                    <option value="">Select Department</option>
                    <option value="cs">Computer Science (CS)</option>
                    <option value="it">Information Technology (IT)</option>
                    <option value="is">Information Systems (IS)</option>
                    <!-- Add more options as needed -->
                </select><br>
            </div>

            <!-- Phone field -->
            <label>Phone</label><br>
            <input type="text" name="phone" id="phone" class="form-control"><br>

            <!-- Address field -->
            <label>Address</label><br>
            <input type="text" name="address" id="address" class="form-control"><br>

            <!-- Department code field -->
            <label>Department</label><br>
            <select name="depart_code" id="depart_code" class="form-control" required>
                <option value="">Select Department</option>
                <option value="cs">Computer Science (CS)</option>
                <option value="it">Information Technology (IT)</option>
                <option value="is">Information Systems (IS)</option>
                <!-- Add more options as needed -->
            </select><br>

            <!-- Submit button -->
            <input type="submit" value="Save" class="btn btn-success"><br>
        </form>

    </div>
</div>

{{-- <script>
    function toggleSubjectInput() {
        var userType = document.getElementById("user_type").value;
        var subjectInputDiv = document.getElementById("course_input");

        if (userType !== "doctor") {
            subjectInputDiv.style.display = "none"; 
        } else {
        }
    }
</script> --}}

@extends('layout')
@section('content')

<div class="card">
    <div class="card-header">Add New User</div>
    <div class="card-body">

        <form action="{{ url('user') }}" method="post">
            {!! csrf_field() !!}

            <!-- Name field -->
            <label>Name</label><br>
            <input type="text" name="name" id="name" class="form-control" required><br>

            <!-- Email field -->
            <label>Email</label><br>
            <input type="email" name="email" id="email" class="form-control" required><br>

            <!-- Password field -->
            <label>Password</label><br>
            <input type="password" name="password" id="password" class="form-control" required><br>

            <!-- User type field -->
            <label>User Type</label><br>
            <select name="user_type" id="user_type" class="form-control">
                <option value="student">Student</option>
                <option value="doctor">Doctor</option>
                <option value="admin">Admin</option>
            </select><br>

            <!-- Phone field -->
            <label>Phone</label><br>
            <input type="text" name="phone" id="phone" class="form-control"><br>

            <!-- Address field -->
            <label>Address</label><br>
            <input type="text" name="address" id="address" class="form-control"><br>

           <!-- Department code field -->
<label>Department</label><br>
<select name="depart_code" id="depart_code" class="form-control" required>
    <option value="">Select Department</option>
    <option value="cs">Computer Science (CS)</option>
    <option value="it">Information Technology (IT)</option>
    <option value="is">Information Systems (IS)</option>
    <!-- Add more options as needed -->
</select><br>


            <!-- Submit button -->
            <input type="submit" value="Save" class="btn btn-success"><br>
        </form>

    </div>
</div>

@stop