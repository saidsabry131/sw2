<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Custom login method to handle authentication and redirection based on user type.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function loginn(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'user_type' => 'required|string|in:admin,doctor,student', // Validate user type
        ]);

        // Attempt authentication with email and password
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            // Check the authenticated user's type and redirect accordingly
            $userType = auth()->user()->user_type;

            if ($userType === 'admin') {
                // return redirect()->route('admin.home');

                return "admin user";
            } elseif ($userType === 'doctor') {
               // return redirect()->route('manager.home');
                return "doctor user";
            } else {
                // return redirect()->route('home');
                return "student user";
            }
        } else {
            // Authentication failed, return back to login with error message
            return redirect()->route('login')
                ->withErrors(['email' => 'Email-Address and Password are incorrect.']);
        }
    }


    public function login(Request $request)
{
    // Validate the request data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'user_type' => 'required|string|in:admin,doctor,student', // Validate user type
    ]);

    // Attempt authentication with email and password
    $credentials = $request->only('email', 'password','user_type');
    if (auth()->attempt($credentials)) {

       
        // Check the authenticated user's type and redirect accordingly
        $userType = auth()->user()->user_type;
        return $userType;
        //return $userType;
        // if ($userType === 'admin') {
        //     return view("admin");
        // } elseif ($userType === 'doctor') {
        //     return view("doctor");
        // } else {
            
        //     // Perform the join and select the required fields
        //     $results = DB::table('temp_table')
        //     ->join('users', 'users.id', '=', 'temp_table.user_id')
        //     ->join('courses', 'courses.course_code', '=', 'temp_table.course_code')
        //     ->select( 'courses.course_code', 'courses.course_name')
        //     ->get(); // This will execute the query and return a collection of results

        //     $resultsArray = $results->toArray();

        //     return $resultsArray;


        // }



        $authenticatedUser = Auth::user();  // You can also use request()->user() to achieve the same

        // Get the email of the authenticated user
        $email = $authenticatedUser->email;
        
        // Perform the query with the additional where condition
        $results = DB::table('tempp_table')
            ->join('users', 'users.id', '=', 'tempp_table.user_id')
            ->join('courses', 'courses.course_code', '=', 'tempp_table.course_code')
            ->select('courses.course_code', 'courses.course_name')
            ->where('users.email', '=', $email) // Add condition where users.email = authenticated user's email
            ->get();
         // This will execute the query and return a collection of results
    
        $resultsArray = $results->toArray();
            
        return $resultsArray;
    } else {
        // Authentication failed, return back to login with error message
        return "redirect()->route('login')
            ->withErrors(['email' => 'Email-Address and Password are incorrect.'])";
    }




   
}

    
}
