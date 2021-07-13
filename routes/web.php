<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// display login page
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/lecturer', [LoginController::class, 'showLecturerLoginForm']);
Route::get('/login/sadmin', [LoginController::class, 'showSuperAdminLoginForm']);

// display register page
Route::get('/register/lecturer', [RegisterController::class, 'showLecturerRegisterForm']);

// process login and register
Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::post('/login/lecturer', [LoginController::class, 'lecturerLogin']);
Route::post('/login/sadmin', [LoginController::class, 'superAdminLogin']);

Route::post('/register/lecturer', [RegisterController::class, 'createLecturer']);

// homepages of student, lecturer, admin, super admin
Route::get('/home', [HomeController::class, 'studentHome'])->name('home')->middleware('auth');
Route::get('/lecturer', [HomeController::class, 'lecturerHome'])->name('lecturer')->middleware('auth:lecturer');
//Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin')->middleware('auth:admin');
Route::get('/sadmin', [HomeController::class, 'sadminHome'])->name('sadmin')->middleware('auth:sadmin');

Route::get('/admin', [HomeController::class, 'adminHome']);
