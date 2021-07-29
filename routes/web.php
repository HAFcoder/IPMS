<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FileManagementController;
use App\Http\Controllers\companiesController;
use App\Http\Controllers\StudentSessionController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\StudentController;
use App\Models\StudentSession;
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

//dashboard
Route::get('/dashboard', [HomeController::class, 'dashboard']);

// display login page
Route::get('/login/admin', [LoginController::class, 'showAdminLoginForm']);
Route::get('/login/lecturer', [LoginController::class, 'showLecturerLoginForm']);
Route::get('/login/sadmin', [LoginController::class, 'showSuperAdminLoginForm']);

// display register page
Route::post('api/fetch-cities', [RegisterController::class, 'fetchCity']);
Route::get('/register/lecturer', [RegisterController::class, 'showLecturerRegisterForm']);

// process login and register
Route::post('/login/admin', [LoginController::class, 'adminLogin']);
Route::post('/login/lecturer', [LoginController::class, 'lecturerLogin']);
Route::post('/login/sadmin', [LoginController::class, 'superAdminLogin']);
Route::post('/register/lecturer', [RegisterController::class, 'createLecturer']);

Route::get('logout', [HomeController::class, 'logout'])->name('logout.home');

//student group route
Route::group(['middleware' => 'auth', 'role:student'], function() {
    //Route::post('/logout', [LoginController::class, 'logout'])->name('logout.admin');
    Route::get('/', [HomeController::class, 'studentHome']);
    Route::get('/home', [HomeController::class, 'studentHome'])->name('home');
    Route::post('student/fetch-programmes', [StudentSessionController::class, 'fetchProgramme']);
    Route::get('/student/register-session', [StudentSessionController::class, 'createStudSession'])->name('register.session');
});

//coordinator or admin group route
Route::group(['middleware' => ['auth:admin']], function() {
    Route::get('/admin', [HomeController::class, 'adminHome']);
});

//lecturer group route
Route::group(['middleware' => ['auth:lecturer', 'role:coordinator']], function() {
    // if user is approve [coordinator]
    Route::get('/lecturer/coordinator', [HomeController::class, 'coordinatorHome'])->name('coordinator.index');

    // student menu
    // student view all
    Route::get('/lecturer/coordinator/student-all', [StudentController::class, 'index']);
    // student pending
    Route::get('/lecturer/coordinator/student-pending', [StudentSessionController::class, 'index']);
    Route::get('/lecturer/coordinator/student-pending/{id}', [StudentSessionController::class, 'approve'])->name('student.register.approve');
});

Route::group(['middleware' => ['auth:lecturer', 'role:lecturer', 'status:approve']], function() {
    // if user is approve [lecturer]
    Route::get('/lecturer', [HomeController::class, 'lecturerHome'])->name('lecturer.index');
});

Route::group(['middleware' => ['auth:lecturer', 'role:lecturer', 'status:pending']], function() {
    // redirect user if not approve
    Route::get('/lecturer/pending', [HomeController::class, 'pending'])->name('lecturer.pending');
});

//super amdin group route
Route::group(['middleware' => 'auth:sadmin'], function() {
    Route::get('/sadmin', [HomeController::class, 'sadminHome']);
});
// Route::get('/coordinator', [HomeController::class, 'coordinatorHome']);

// session route
Route::resource('session', SessionController::class);

//company route
Route::get('/company/list', [companiesController::class, 'list'])->name('company.list');
Route::get('/company', [companiesController::class, 'create'])->name('company.create');
Route::post('/company', [companiesController::class, 'storeLecturer'])->name('company.storeLecturer');
Route::get('/company/{id}/edit', [companiesController::class, 'edit'])->name('company.edit');
Route::put('/company/{id}', [companiesController::class, 'update'])->name('company.update');
Route::delete('/company/{id}', [companiesController::class, 'destroy'])->name('company.destroy');

//get address route
Route::get('/getpostal', [AddressController::class, 'getpostal'])->name('getpostal');
Route::get('/getcity', [AddressController::class, 'getcity'])->name('getcity');

// s3 amazon file management route
Route::get('/internfile', [FileManagementController::class, 'getFile']);
Route::post('/internfile/store', [FileManagementController::class, 'store']);
Route::get('/internfile/download/{filename}',[FileManagementController::class, 'download']);
// Route::delete('/internfile/remove/{file}',[FileManagementController::class, 'destroy']);
// Route::get('/internfile', [FileManagementController::class, 'create']);
// Route::post('/internfile', [FileManagementController::class, 'store']);
// Route::get('/internfile/{file}',[FileManagementController::class, 'show']);
