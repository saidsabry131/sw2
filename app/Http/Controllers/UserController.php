<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = User::where('user_type', "student")->get();
        $data=user::all();
        return view("userView.index",["students"=>$data]);
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
     */
    public function store(Request $request)
    {
        // Validate the request
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
    // public function show(string $userType)
    // {
    // //    if($userType==="student"){ $students = User::where('user_type', 'student')->get();

    // //     // Pass the students to the view
    // //     return view('userView.student', compact('students'));}
    // //     else{
    // //         $doctors = User::where('user_type', 'doctor')->get();

    // //         // Pass the doctors to the view
    // //         return view('userView.doctor', compact('doctors'));
    // //     }

    //     $students=user::find()
    // }


    public function show(string $id)  {
        
        $data=user::find($id);

        return view("userView.show",["user"=>$data]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = user::find($id);
        return view('userView.edit',["user"=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = user::find($id);
        $input = $request->all();
        $data->update($input);
        return redirect('users')->with('flash_message', 'user Updated!');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        user::destroy($id);
        return redirect('users')->with('flash_message', 'user deleted!'); 
    }


   

    /**
     * Display all students.
     */
  



}
