<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*

Route::middleware("auth)->resource("student",studentCon::class)

*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/students",
function() {

    return view("layout");
}
);




Route::middleware("auth","can:admin-only-action")->resource('/users', UserController::class);
Route::post('/user', [UserController::class, 'store'])->name('user.store');



use App\Http\Controllers\GradeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\EnrollmentController;


Route::middleware("auth","can:admin-only-action")->get('/doctor', [DoctorController::class, 'show'])->name('doctor.show');


Route::middleware('auth')->group(function () {
    
    Route::get('/userinfo', [UserController::class, 'showUserInfo'])->name('userinfo');
});



Route::middleware('auth')->prefix('users')->group(function () {
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('users.update');
});



Route::middleware("auth","can:admin-only-action")->resource('grades', GradeController::class);

Route::middleware("auth","can:doctor-only-action")->resource('grades', GradeController::class);



Route::middleware("auth")->resource('/courses', CourseController::class);


Route::middleware("auth","can:student-only-action")->resource('/enrollment', EnrollmentController::class);

Route::middleware("auth","can:student-only-action")->post('/enrollment/store', [EnrollmentController::class, 'store'])->name('enrollment.store');

