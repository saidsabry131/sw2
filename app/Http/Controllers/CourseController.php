<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $student=User::find($id);
        $user_id = auth()->id() ;// The user ID for which you want to retrieve the courses

            $courses = Course::select('courses.course_code', 'courses.course_name', 'tempp_table.grade_score')
            ->join('tempp_table', 'courses.course_code', '=', 'tempp_table.course_code')
            ->join('users', 'users.id', '=', 'tempp_table.user_id')
            ->where('users.id', $user_id)
            ->get();


        return view("courseview.show",[
            "courses"=>$courses,
            "student"=>$student]);
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
