<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\TempUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all users (students, doctors, admins)
        $users = User::all();
        return view("userView.index", ["students" => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("userView.create");
    }

    /**
     * Store a newly created resource in storage.
     
    public function store(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'user_type' => 'required|string',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'depart_code' => 'required|string|in:cs,it,is',
            // 'course_code' => $request->input('user_type') === 'doctor' ? 'required|string|max:255' : 'nullable',
            // 'course_name' => $request->input('user_type') === 'doctor' ? 'required|string|max:255' : 'nullable',
            // 'course_desc' => $request->input('user_type') === 'doctor' ? 'nullable|string|max:255' : 'nullable',
            // 'course_depart' => $request->input('user_type') === 'doctor' ? 'required|string|in:cs,it,is' : 'nullable',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        try {
            // Create and save the user
            $user = new User([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'user_type' => $request->input('user_type'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'depart_code' => $request->input('depart_code'),
            ]);
            
            $user->save();

            if ($user->user_type === 'doctor') {
                // Begin a transaction
                DB::beginTransaction();

                try {
                    // Create and save the course
                    $course = new Course([
                        'course_code' => $request->input('course_code'),
                        'course_name' => $request->input('course_name'),
                        'course_desc' => $request->input('course_desc'),
                        'course_depart' => $request->input('course_depart'),
                    ]);

                    $course->save();

                    // Create and save the TempUser entry
                    $tempTableEntry = new TempUser([
                        'user_id' => $user->id,
                        'course_code' => $request->input('course_code'),
                    ]);

                    $tempTableEntry->save();

                    // Commit the transaction
                    DB::commit();
                } catch (\Exception $e) {
                    // Rollback the transaction if there is an error
                    DB::rollBack();
                    return back()->withErrors(['error' => 'Failed to create user and course.']);
                }
            }
            return redirect('users')->with('success', 'User created successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create user.']);
        }
    }
    */


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'user_type' => 'required|string',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'depart_code' => 'required|string|in:cs,it,is', // Restrict the department codes to 'cs', 'it', and 'is'
        ]);
    
        // Create a new user
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'user_type' => $request->input('user_type'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'user_depart' => $request->input('depart_code'),
        ]);
    
        // Save the user
        $user->save();
    
        // Redirect with a success message
        return redirect("users")->with('success', 'User created successfully.');

    }
    

    

    /**
     * Display the specified resource.
     */
    public function show(string $id) {
        // Show user information
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

        

        return view("userView.show", ["user" => $user, "subjects" => $subjects]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);

        if (!$user) {
            return back()->withErrors(['error' => 'User not found.']);
        }

        return view('userView.edit', ["user" => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the user and update the input
        $user = User::find($id);

        if (!$user) {
            return back()->withErrors(['error' => 'User not found.']);
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'user_type' => 'required|string',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'depart_code' => 'required|string|in:cs,it,is',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        // Update the user data
        $user->update($request->all());

        return redirect('users')->with('flash_message', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            // Start a transaction
            DB::beginTransaction();

            // Delete TempUser records
            TempUser::where('user_id', $id)->delete();

            // Delete the user
            User::destroy($id);

            // Commit the transaction
            DB::commit();

            return redirect('users')->with('flash_message', 'User deleted successfully.');
        } catch (\Exception $e) {
            // Roll back the transaction if there is an error
            DB::rollBack();
            return back()->withErrors(['error' => 'Failed to delete user.']);
        }
    }





    public function showUserInfo()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Return the userinfo view with the authenticated user's information
        return view('userinfo', ['user' => $user]);
    }

}
