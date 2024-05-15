<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

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

        $results = DB::table('tempp_table')
        ->join('users', 'tempp_table.user_id', '=', 'users.id')
        ->join('courses', 'tempp_table.course_code', '=', 'courses.course_code')
        ->join('departments', 'courses.course_depart', '=', 'departments.depart_code')
        ->where('users.id', $user_id)
        ->select('courses.course_code', 'courses.course_name', 'tempp_table.grade_score', 'departments.depart_code')
        ->get();
    

        $courseDetails = DB::table('tempp_table')
        ->join('users', 'users.id', '=', 'tempp_table.user_id')
        ->join('courses', 'courses.course_code', '=', 'tempp_table.course_code')
        ->where('users.user_type', 'student')
        ->select('courses.course_code', 'courses.course_name', DB::raw('COUNT(*) AS student_count'))
        ->groupBy('courses.course_code', 'courses.course_name')
        ->get();


        return view("courseview.show",[
            "courses"=>$results,
            "student"=>$student,
            "details"=>$courseDetails
            
        
        ]);
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
