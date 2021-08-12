<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\FileManagementController;
use App\Http\Controllers\companiesController;
use App\Http\Controllers\StudentSessionController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ResumeManagementController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FormFeedbackController;

use App\Http\Controllers\MailingController;
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
    Route::get('/coordinator', [HomeController::class, 'coordinatorHome'])->name('coordinator.index');
    
    //company route
    Route::get('coordinator/company/list', [companiesController::class, 'list'])->name('company.list.coordinator');
    Route::get('coordinator/company', [companiesController::class, 'create'])->name('company.create.coordinator');
    Route::get('coordinator/company/{id}/edit', [companiesController::class, 'edit'])->name('company.edit.coordinator');
    Route::put('coordinator/company/{id}', [companiesController::class, 'update'])->name('company.update');
    Route::delete('coordinator/company/{id}', [companiesController::class, 'destroy'])->name('company.destroy');
    Route::get('coordinator/company/status', [companiesController::class, 'updateStatus'])->name('company.update.status');

    //session route

    // student menu
    // student view all
    Route::resource('coordinator/students', StudentController::class);
    Route::post('/edit-student/api/fetch-cities', [RegisterController::class, 'fetchCity']);
    // student pending
    Route::get('coordinator/student-pending', [StudentSessionController::class, 'index']);
    Route::get('coordinator/student-pending/{id}', [StudentSessionController::class, 'approve'])->name('student.register.approve');
    Route::get('coordinator/student/session/status', [StudentSessionController::class, 'updateStatus'])->name('studentSession.update.status');
});

Route::group(['middleware' => ['auth:lecturer', 'role:lecturer', 'status:approve']], function() {
    // if user is approve [lecturer]
    Route::get('/lecturer', [HomeController::class, 'lecturerHome'])->name('lecturer.index');
    
    //company route
    Route::get('lecturer/company/list', [companiesController::class, 'list'])->name('company.list.lecturer');
    Route::get('lecturer/company', [companiesController::class, 'create'])->name('company.create.lecturer');
    
});

Route::group(['middleware' => ['auth:lecturer', 'role:lecturer', 'status:pending']], function() {
    // redirect user if not approve
    Route::get('/lecturer/pending', [HomeController::class, 'pending'])->name('lecturer.pending');
});

//super amdin group route
Route::group(['middleware' => 'auth:sadmin'], function() {
    Route::get('/sadmin', [HomeController::class, 'sadminHome']);


    //programme menu
    Route::resource('/sadmin/programme', ProgrammeController::class);
    Route::get('/programme/status', [ProgrammeController::class, 'updateStatus'])->name('programme.update.status');

    //faculty menu
    Route::resource('/sadmin/faculty', FacultyController::class);
    Route::get('/faculty/status', [FacultyController::class, 'updateStatus'])->name('faculty.update.status');

    //address menu
    Route::resource('/sadmin/address', AddressController::class);
    Route::get('/address/status', [AddressController::class, 'updateStatus'])->name('address.update.status');

    //form feedback route
    Route::resource('sadmin/formFeedback', FormFeedbackController::class); 

});

//session route for all lecturer and coordinator
Route::resource('session', SessionController::class)->middleware('auth:lecturer','auth:admin', 'role:coordinator', 'role:lecturer', 'status:approve');

//company route for store - lecturer
Route::post('/company', [companiesController::class, 'storeLecturer'])
        ->name('company.storeLecturer')
        ->middleware('auth:lecturer','auth:admin', 'role:coordinator', 'role:lecturer', 'status:approve');


//get address route
Route::get('/getpostal', [AddressController::class, 'getpostal'])->name('getpostal');
Route::get('/getcity', [AddressController::class, 'getcity'])->name('getcity');

//internship forms - s3 amazon file management route
Route::get('/internfile', [FileManagementController::class, 'listInternFile']);
Route::post('/internfile/store', [FileManagementController::class, 'storeInternFile']);
Route::delete('/internfile/delete', [FileManagementController::class, 'destroyInternFile']);
Route::get('/internfile/download/{filename}',[FileManagementController::class, 'downloadInternFile']);

//internship resumes - s3 amazon file management route
Route::get('/resume', [ResumeManagementController::class, 'listResume']);
Route::post('/resume/store', [ResumeManagementController::class, 'storeResume']);
Route::delete('/resume/delete', [ResumeManagementController::class, 'destroyResume']);
Route::get('/resume/download/{filename}',[ResumeManagementController::class, 'downloadResume']);

//Logbook
// Route::get('/logbook', [LogbookController::class, 'listLogbook']);
Route::get('/logbooktest', [LogbookController::class, 'testlistLogbook']);
// Route::post('/logbook', [LogbookController::class, 'testcreateLogbook']);
// Route::put('/logbook/week/{week_number}', [LogbookController::class, 'testupdateLogbook']);
// Route::delete('/logbook/week/week_number', [LogbookController::class, 'testdeleteLogbook']);


//Mailing
Route::get('internship/mail/send', [MailingController::class, 'declineMail']);
Route::get('logbook/mail/send', [MailingController::class, 'logbookApprovalMail']);
Route::get('evaluation/mail/send', [MailingController::class, 'studentEvaluationMail']);
