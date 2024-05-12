<?php

namespace App\Http\Controllers;

use App\Models\TempUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'course_code' => 'required|string|exists:courses,course_code',
            'grade_score' => 'required|numeric|between:0,100',
        ]);

        // Create a new entry in the tempp_table
        $temppTable = new TempUser();
        $temppTable->user_id = $request->input('user_id');
        $temppTable->course_code = $request->input('course_code');
        $temppTable->grade_score = $request->input('grade_score');
        $temppTable->save();

        // Redirect the doctor to a success page or show a success message
        return redirect()->back()->with('success', 'Grade inserted successfully!');
    

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
    public function show()
    {

        $courseCode = DB::table('tempp_table')
        ->join('users', 'tempp_table.user_id', '=', 'users.id')
        ->where('users.id', 2)
        ->where('users.user_type', 'doctor')
        ->select('tempp_table.course_code')
        ->first();

    // Check if the course code was retrieved
    if ($courseCode) {
        // Fetch the list of students enrolled in the course, excluding those with user_type 'doctor'
        $students = DB::table('tempp_table')
            ->join('users', 'users.id', '=', 'tempp_table.user_id')
            ->where('tempp_table.course_code', $courseCode->course_code)
            ->where('users.user_type', '!=', 'doctor')
            ->select('users.name','tempp_table.grade_score')
            ->get();

        // Return the list of students
        return view('doctorview.show', [
            'students' => $students,
            'course_code' => $courseCode->course_code,
        ]);
    } else {
        // Handle the case where no course code is found for the specified doctor ID
        return view('doctorview.show', [
            'students' => collect(), // Return an empty collection if no students are found
            'course_code' => 'No course found',
        ]);
    }


        // Return the view with the list of students and the course code
        return view('doctorview.show', [
            'students' => $students,

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
