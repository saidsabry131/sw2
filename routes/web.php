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




Route::resource('/users', UserController::class);
Route::post('/user', [UserController::class, 'store'])->name('user.store');



use App\Http\Controllers\DoctorController;


Route::get('/doctor', [DoctorController::class, 'show'])->name('doctor.show');




