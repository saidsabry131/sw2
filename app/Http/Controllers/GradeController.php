<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentGrades = DB::table('tempp_table')
        ->join('users', 'users.id', '=', 'tempp_table.user_id')
        ->join('courses', 'courses.course_code', '=', 'tempp_table.course_code')
        ->where('users.user_type', 'student')
        ->select('users.name', 'courses.course_code', 'tempp_table.grade_score')
        ->get();

        return view('Grades.index', compact('studentGrades'));
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
        $user = User::find($id);

        if (!$user) {
            return back()->withErrors(['error' => 'User not found.']);
        }

        // Get courses the user is signed up for
        $subjects = DB::select('
            SELECT courses.course_name, courses.course_code, tempp_table.grade_score
            FROM tempp_table
            JOIN users ON users.id = tempp_table.user_id
            JOIN courses ON courses.course_code = tempp_table.course_code
            WHERE tempp_table.user_id = ?
        ', [$id]);

       

        return view("Grades.show", [ "subjects" => $subjects]);
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
