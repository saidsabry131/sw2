<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\TempUser;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::get();
        return view('Enrollment.create', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'courses' => 'required|array|min:1|max:6',
            'courses.*' => 'exists:courses,course_code',
        ]);

        // Get the authenticated user's ID
        $userId = Auth::id();

        // Insert user id and course code into the TempUser table for each selected course
        foreach ($validatedData['courses'] as $courseCode) {
            TempUser::create([
                'user_id' => $userId,
                'course_code' => $courseCode,
            ]);
        }

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Enrollment successful!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
