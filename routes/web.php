<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FileManagementController;
use App\Http\Controllers\companiesController;
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
    Route::get('/', [HomeController::class, 'studentHome'])->name('home');
    Route::get('/home', [HomeController::class, 'studentHome'])->name('home');
});

//coordinator or admin group route
Route::group(['middleware' => ['auth:admin']], function() {
    Route::post('/logout/admin', [LoginController::class, 'adminLogout'])->name('logout.admin');
    Route::get('/admin', [HomeController::class, 'adminHome']);
});


//lecturer group route
Route::group(['middleware' => ['auth:lecturer']], function() {
    Route::post('/logout/lecturer', [LoginController::class, 'lecturerLogout'])->name('logout.lecturer');
    // if user is approve [coordinator]
    Route::get('/coordinator', [HomeController::class, 'coordinatorHome']);

    // if user is approve [lecturer]
    Route::get('/lecturer', [HomeController::class, 'lecturerHome']);
});

 // redirect user if not approve
 Route::get('/lecturer/pending', [HomeController::class, 'pending'])->middleware(['auth:lecturer', 'role']);;

//super amdin group route
Route::group(['middleware' => 'auth:sadmin'], function() {
    Route::post('/logout/sadmin', [LoginController::class, 'sadminLogout'])->name('logout.sadmin');
    Route::get('/sadmin', [HomeController::class, 'sadminHome']);
});

// session route
//Route::get('/session_view', [SessionController::class, 'index']);
//Route::get('/session_add', [SessionController::class, 'create']);
//Route::post('/session_insert', [SessionController::class, 'store']);
//Route::get('/session/edit/{id}', [SessionController::class, 'edit'])->name('session.edit');
Route::resource('session', SessionController::class);
//Route::get('/session/delete/{id}', [SessionController::class, 'delete'])->name('session.delete');

//company route
Route::get('/companylist', [companiesController::class, 'list'])->name('company.list');
Route::get('/companyadd', [companiesController::class, 'create'])->name('company.create');

// s3 amazon file management route
Route::get('/file', [FileManagementController::class, 'index']);
Route::post('/file/store', [FileManagementController::class, 'store']);
Route::get('file/download/{file}',[FileManagementController::class, 'download']);
Route::delete('file/remove/{file}',[FileManagementController::class, 'destroy']);
