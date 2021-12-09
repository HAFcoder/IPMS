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
use App\Http\Controllers\Controller;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ResumeManagementController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\FormEvaluateController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\FormFeedbackController;
use App\Http\Controllers\LectEvaluateController;
use App\Http\Controllers\MailingController;
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
Route::get('/login/lecturer', [LoginController::class, 'showLecturerLoginForm']);
Route::get('/login/sadmin', [LoginController::class, 'showSuperAdminLoginForm']);

// display register page
Route::post('api/fetch-cities', [RegisterController::class, 'fetchCity']);
Route::get('/register/lecturer', [RegisterController::class, 'showLecturerRegisterForm']);

// process login and register
Route::post('/login/lecturer', [LoginController::class, 'lecturerLogin']);
Route::post('/login/sadmin', [LoginController::class, 'superAdminLogin']);
Route::post('/register/lecturer', [RegisterController::class, 'createLecturer']);

Route::get('logout', [HomeController::class, 'logout'])->name('logout.home');

//test page resume
Route::get('/resumeview',[ResumeManagementController::class, 'resumeview'])->name('resume.view');

// forgot password


//student group route
Route::group(['middleware' => 'auth', 'role:student'], function() {
    //Route::post('/logout', [LoginController::class, 'logout'])->name('logout.admin');
    Route::get('/', [HomeController::class, 'studentHome']);
    Route::get('/home', [HomeController::class, 'studentHome'])->name('home');

    // resume
    Route::get('/resume/create', [ResumeManagementController::class, 'resumeForm'])->name('student.resume');
    Route::post('/resume/show', [ResumeManagementController::class, 'getDataResume'])->name('student.resume.show');

    //company
    Route::get('/company-all', [companiesController::class, 'companyAll']);
    Route::get('/apply-list', [companiesController::class, 'applyList']);

    //report
    Route::get('/report', [StudentController::class, 'report']);

    //feedbacks and survey
    Route::get('/graduate-survey', [FormEvaluateController::class, 'graduate']);

    // profile
    Route::get('/profile', [StudentController::class, 'profileStudent']);
    Route::get('/profile/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/profile/edit/{id}/update', [StudentController::class, 'update'])->name('student.update');
    Route::post('/profile/edit/api/fetch-cities', [StudentController::class, 'fetchCity']);

    // session
    Route::get('/session/register', [StudentSessionController::class, 'registerSession']);
    Route::post('student/fetch-programmes', [StudentSessionController::class, 'fetchProgramme']);
    Route::get('/session/register-session', [StudentSessionController::class, 'createStudSession'])->name('register.session');
    Route::get('/session/view-status', [StudentSessionController::class, 'viewStatus']);
});

//lecturer group route
Route::group(['middleware' => ['auth:lecturer', 'role:coordinator']], function() {
    // if user is approve [coordinator]
    Route::get('/coordinator', [HomeController::class, 'coordinatorHome'])->name('coordinator.index');
    Route::get('/coordinator/profile', [LecturerController::class, 'profileLect']);

    //lecturer menu
    Route::get('coordinator/lecturers-all', [LecturerController::class, 'viewAll'])->name('lecturer.viewAll');
    Route::get('coordinator/lecturers/update-status', [LecturerController::class, 'updateStatus'])->name('lecturer.update.status');
    Route::get('changeRole', [LecturerController::class, 'changeRole'])->name('lecturer.update.role');
    Route::resource('coordinator/lecturers', LecturerController::class);


    //company route
    Route::get('coordinator/company/list', [companiesController::class, 'list'])->name('company.list.coordinator');
    Route::get('coordinator/company', [companiesController::class, 'create'])->name('company.create.coordinator');
    Route::get('coordinator/company/{id}/edit', [companiesController::class, 'edit'])->name('company.edit.coordinator');
    Route::put('coordinator/company/{id}', [companiesController::class, 'update'])->name('company.update');
    Route::delete('coordinator/company/{id}', [companiesController::class, 'destroy'])->name('company.destroy');
    Route::get('coordinator/company/status', [companiesController::class, 'updateStatus'])->name('company.update.status');
    Route::post('coordinator/company/add', [companiesController::class, 'createCompany'])->name('company.create');

    //session route

    // student menu
    // student view all
    Route::resource('coordinator/students', StudentController::class);
    Route::post('/edit-student/api/fetch-cities', [RegisterController::class, 'fetchCity']);
    // student pending
    Route::get('coordinator/student-pending', [StudentSessionController::class, 'index']);
    Route::get('coordinator/student-pending/{id}', [StudentSessionController::class, 'approve'])->name('student.register.approve');
    Route::get('coordinator/student/session/status', [StudentSessionController::class, 'updateStatus'])->name('studentSession.update.status');
    Route::get('coordinator/student/update-status', [StudentController::class, 'updateStatus'])->name('student.update.status');

    //under lecturer
    Route::get('coordinator/view-all/supervisee', [LecturerController::class, 'viewSupervisee']);
    Route::get('coordinator/attach/supervisee', [LecturerController::class, 'attachSupervisee']);

    //under company letter
    Route::get('coordinator/company/acceptence-letter', [companiesController::class, 'acceptance']);
    Route::get('coordinator/company/decline-letter', [companiesController::class, 'reject']);
    Route::get('coordinator/company/evaluation-company', [companiesController::class, 'companySV']);

    //under studnet company 
    Route::get('coordinator/student-company/status-all', [companiesController::class, 'statusAll']);

    //feedback menu
    Route::get('coordinator/feedback/company', [FormFeedbackController::class, 'company']);
    Route::get('coordinator/feedback/logbook-report', [FormFeedbackController::class, 'logbookReport']);


});

Route::group(['middleware' => ['auth:lecturer', 'role:lecturer']], function() {
    // if user is approve [lecturer]
    Route::get('/lecturer', [HomeController::class, 'lecturerHome'])->name('lecturer.index');
    Route::get('/lecturer/profile', [LecturerController::class, 'profileLect']);
    
    //company route
    Route::get('lecturer/company/list', [companiesController::class, 'list'])->name('company.list.lecturer');
    //Route::get('lecturer/company', [companiesController::class, 'create'])->name('company.create.lecturer');

    //feedbacks and evaluation
    Route::get('lecturer/fedbacks-evaluation/session', [LectEvaluateController::class, 'feedbackSess']);
    Route::get('lecturer/fedbacks-evaluation/student-list', [LectEvaluateController::class, 'studList']);
    Route::get('lecturer/fedbacks-evaluation/student-list/logbook-report/details', [LectEvaluateController::class, 'logbookRead']);
    Route::get('lecturer/fedbacks-evaluation/student-list/logbook-report/evaluation', [LectEvaluateController::class, 'logbookEva']);
    Route::get('lecturer/fedbacks-evaluation/student-list/presentation', [LectEvaluateController::class, 'presentationEva']);

    //lecturer student
    Route::get('lecturer/supervisee', [LecturerController::class, 'superviseeSess']);
    Route::get('lecturer/supervisee/list', [LecturerController::class, 'superviseeList']);
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
Route::get('/logbook', [LogbookController::class, 'showLogbook']);
// Route::get('/logbooktest', [LogbookController::class, 'testlistLogbook']);
// Route::post('/logbook', [LogbookController::class, 'testcreateLogbook']);
// Route::put('/logbook/week/{week_number}', [LogbookController::class, 'testupdateLogbook']);
// Route::delete('/logbook/week/week_number', [LogbookController::class, 'testdeleteLogbook']);


//Mailing
Route::get('internship/mail/send/{encryptedstudentid}', [MailingController::class, 'declineMail']);
Route::get('logbook/mail/send/', [MailingController::class, 'logbookApprovalMail']);
// Route::get('evaluation/mail/send/{encryptedstudentid}', [MailingController::class, 'studentEvaluationMail']);

//Test Mailing
Route::get('/logbook/show', [LogbookController::class, 'testShowLogbook']);
Route::get('/logbook/mail/{week}/{encryptedstudentid}', [MailingController::class, 'testlogbookApprovalMail']);
Route::get('/declination/mail/{encryptedstudentid}', [MailingController::class, 'testdeclineMail']);
Route::get('/evaluation/mail/{encryptedstudentid}', [MailingController::class, 'teststudentEvaluationMail']);

//Encryption
// /{{Crypt::encryptString($studentid)}}
// $decrypted = Crypt::decryptString($encryptedValue);
