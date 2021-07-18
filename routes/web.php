<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InternshipFormsController;
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

//student group route
Route::group(['middleware' => 'auth'], function() {
    //Route::post('/logout', [LoginController::class, 'logout'])->name('logout.admin');
    Route::get('/home', [HomeController::class, 'studentHome'])->name('home');
});

//coordinator or admin group route
Route::group(['middleware' => 'auth:admin'], function() {
    Route::post('/logout/admin', [LoginController::class, 'adminLogout'])->name('logout.admin');
    Route::get('/admin', [HomeController::class, 'adminHome']);
});

//lecturer group route
Route::group(['middleware' => 'auth:lecturer'], function() {
    Route::post('/logout/lecturer', [LoginController::class, 'lecturerLogout'])->name('logout.lecturer');
    Route::get('/lecturer', [HomeController::class, 'lecturerHome']);
});


//super amdin group route
Route::group(['middleware' => 'auth:sadmin'], function() {
    Route::post('/logout/sadmin', [LoginController::class, 'sadminLogout'])->name('logout.sadmin');
    Route::get('/sadmin', [HomeController::class, 'sadminHome']);
});
