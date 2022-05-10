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
use App\Http\Controllers\SvEvaluationMarksController;
use App\Http\Controllers\GradSurveyAnswerController;
use App\Http\Controllers\PresentMarksController;
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

//verify mail
Auth::routes(['verify' => true]);


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
    Route::post('/apply-company', [companiesController::class, 'addStudentCompany'])->name('apply.student_company');
    Route::get('company/apply/{id}/accept', [companiesController::class, 'studentAccept'])->name('company.student-accept');
    Route::get('company/apply/{id}/decline', [companiesController::class, 'studentDecline'])->name('company.student-decline');
    Route::get('company/apply/{id}/reject', [companiesController::class, 'studentReject'])->name('company.student-reject');
    Route::put('company/apply/{id}/update', [companiesController::class, 'studentInternship_update'])->name('company.internship.update');
    Route::put('company/apply/{id}/orf/update/', [companiesController::class, 'internship_updateOrf'])->name('internship.update.orf');
    Route::put('company/apply/{id}/rdn/update', [companiesController::class, 'internship_updateRdn'])->name('internship.update.rdn');

    //report
    Route::get('/report', [StudentController::class, 'report']);
    Route::put('submission/report/{id}/update', [companiesController::class, 'internship_updateReport'])->name('internship.update.reportlink');

    //feedbacks and survey
    Route::get('/graduate-survey', [FormEvaluateController::class, 'graduate']);
    Route::post('/graduate-survey', [FormEvaluateController::class, 'submit_graduate'])->name('student.graduate.submit');

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

    //logbook
    Route::get('/logbook', [LogbookController::class, 'showLogbook']);
    Route::post('/logbook/{id}/update', [LogbookController::class, 'updateLogbook'])->name('logbook.update');
    Route::get('/logbook/{id}/{week}/send', [LogbookController::class, 'studEmailLogbook'])->name('logbook.email');

    //submission
    Route::get('/submission', [LogbookController::class, 'studSubmission'])->name('student.submission');


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
    Route::get('coordinator/student/view-logbook', [StudentController::class, 'studentLogbook'])->name('coordinator.view.logbook');

    // student pending
    Route::get('coordinator/student-pending', [StudentSessionController::class, 'index']);
    Route::get('coordinator/student-pending/{id}', [StudentSessionController::class, 'approve'])->name('student.register.approve');
    Route::get('coordinator/student/session/status', [StudentSessionController::class, 'updateStatus'])->name('studentSession.update.status');
    Route::get('coordinator/student/update-status', [StudentController::class, 'updateStatus'])->name('student.update.status');

    //under lecturer
    Route::get('coordinator/view-all/supervisee', [LecturerController::class, 'viewSupervisee']);
    Route::get('coordinator/attach/supervisee', [LecturerController::class, 'attachSupervisee']);
    Route::get('coordinator/attach/supervisee2/{id}', [LecturerController::class, 'attachSupervisee2'])->name('attach.view.supervisee');;
    // Route::post('coordinator/attach/supervisee/lecturer', [LecturerController::class, 'attachLecturer'])->name('attach.supervisee');
    Route::post('coordinator/attach/supervisee/lecturer', [LecturerController::class, 'attachLecturer'])->name('intern.update.supervisor');


    //under company letter
    Route::get('coordinator/company/acceptence-letter', [companiesController::class, 'acceptance']);
    Route::get('coordinator/company/decline-letter', [companiesController::class, 'reject']);
    Route::get('coordinator/company/evaluation-company', [companiesController::class, 'companySV']);

    //under student company 
    Route::get('coordinator/student-company/status-all', [companiesController::class, 'statusAll'])->name('internship.status-all');
    Route::get('coordinator/student/internship/{id}', [companiesController::class, 'internship_details'])->name('internship.student.detail');
    Route::put('coordinator/student/internship/{id}/assign', [companiesController::class, 'internship_assignLect'])->name('internship.assign-lecturer');
    Route::get('coordinator/student/internship/{id}/decline', [companiesController::class, 'internship_sendDecline'])->name('internship.student.decline');

    //feedback menu
    Route::get('coordinator/feedback/company', [FormFeedbackController::class, 'company']);
    Route::get('coordinator/feedback/company/sessions', [FormFeedbackController::class, 'companySess']);
    Route::get('coordinator/feedback/company/sessions/{id}', [FormFeedbackController::class, 'reportViewSess2'])->name('view.company.feed');

    Route::get('coordinator/feedback/logbook-report', [FormFeedbackController::class, 'logbookReport']);
    Route::get('coordinator/feedback/logbook-report/sessions', [FormFeedbackController::class, 'reportViewSess']);
    Route::get('coordinator/feedback/logbook-report/sessions/{id}', [FormFeedbackController::class, 'reportViewSess2'])->name('view.reportLog.marks');
    Route::get('coordinator/feedback/view/logbook-report/{id}', [FormFeedbackController::class, 'viewReportMark'])->name('feedback.view.reportLog');

    Route::get('coordinator/feedback/{id}/sendForm/', [FormFeedbackController::class, 'sendFormFeedback'])->name('feedback.sendForm');
    Route::get('coordinator/feedback/{id}/viewForm/', [FormFeedbackController::class, 'viewForm'])->name('feedback.viewForm');

    Route::get('coordinator/feedback/{id}/sendPoeForm/', [FormFeedbackController::class, 'sendFormPeo'])->name('feedback.sendPoe');
    Route::get('coordinator/feedback/{id}/viewPoeForm/', [FormFeedbackController::class, 'viewFormPeo'])->name('feedback.viewPoe');

    Route::get('coordinator/feedback/view-marks/all', [SvEvaluationMarksController::class, 'viewAll']);
    Route::get('coordinator/feedback/view-marks/sessions', [SvEvaluationMarksController::class, 'viewBySess']);
    Route::get('coordinator/feedback/view-marks/sessions/{id}', [SvEvaluationMarksController::class, 'viewBySess2'])->name('view.marks');;

    Route::get('coordinator/feedback/graduate-survey', [GradSurveyAnswerController::class, 'gradViewAll']);
    Route::get('coordinator/feedback/graduate-survey/sessions', [GradSurveyAnswerController::class, 'viewBySessGrad']);
    Route::get('coordinator/feedback/graduate-survey/sessions/{id}', [GradSurveyAnswerController::class, 'viewBySessGrad2'])->name('view.graduate.survey');
    Route::get('coordinator/feedback/view/graduate-survey/{id}', [GradSurveyAnswerController::class, 'viewGradSurvey'])->name('feedback.viewGrad');
    Route::get('coordinator/feedback/graduate-survey/chart', [GradSurveyAnswerController::class, 'viewChart']);

    Route::get('coordinator/feedback/presentation', [PresentMarksController::class, 'presentViewAll']);
    Route::get('coordinator/feedback/presentation/sessions', [PresentMarksController::class, 'presentViewSess']);
    Route::get('coordinator/feedback/presentation/sessions/{id}', [PresentMarksController::class, 'presentViewSess2'])->name('view.present.marks');
    Route::get('coordinator/feedback/view/presentation/{id}', [PresentMarksController::class, 'viewPresentMark'])->name('feedback.view.present');



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
    Route::get('lecturer/fedbacks-evaluation/{id}/student-list', [LectEvaluateController::class, 'studList'])->name('feedback.session.studentlist');

    Route::get('lecturer/fedbacks-evaluation/student-list/{id}/logbook-report/details', [LectEvaluateController::class, 'logbookRead']);
    Route::get('lecturer/fedbacks-evaluation/student-list/{id}/logbook-report/evaluation', [LectEvaluateController::class, 'logbookEva']);
    Route::post('lecturer/fedbacks-evaluation/student-list/{id}/logbook-report/update/evaluation', [LectEvaluateController::class, 'update_logbookEva'])->name('lecturer.finalevaluation.update');

    Route::get('lecturer/fedbacks-evaluation/student-list/{id}/presentation', [LectEvaluateController::class, 'presentationEva']);
    Route::post('lecturer/fedbacks-evaluation/student-list/{id}/update/presentation', [LectEvaluateController::class, 'update_presentationEva'])->name('lecturer.presentation.update');

    //lecturer student
    Route::get('lecturer/supervisee', [LecturerController::class, 'superviseeSess']);
    Route::get('lecturer/supervisee/list', [LecturerController::class, 'superviseeList']);
    Route::get('lecturer/supervisee/{id}/list', [LecturerController::class, 'superviseeList']);
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

//get graduate survey student
Route::get('/getsurvey', [FormEvaluateController::class, 'getsurvey'])->name('getStudentGradSurvey');

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
Route::get('/logbook/supervisor/{id}/view', [LogbookController::class, 'showLogbookSupervisor'])->name('logbook.view.supervisor');
Route::get('/logbook/supervisor/{id}/approve', [LogbookController::class, 'approveLogbookSupervisor'])->name('logbook.approved.supervisor');
// Route::get('/logbooktest', [LogbookController::class, 'testlistLogbook']);
// Route::post('/logbooks', [LogbookController::class, 'testcreateLogbook']);
// Route::put('/logbook/week/{week_number}', [LogbookController::class, 'testupdateLogbook']);
// Route::delete('/logbook/week/week_number', [LogbookController::class, 'testdeleteLogbook']);


//Mailing
Route::get('/internship/mail/send/{encryptedstudentid}', [MailingController::class, 'declineMail']);
//Route::get('/logbook/{id}/mail/send', [MailingController::class, 'logbookApprovalMail'])->name('logbook.email');
// Route::get('evaluation/mail/send/{encryptedstudentid}', [MailingController::class, 'studentEvaluationMail']);

//Test Mailing
Route::get('/logbook/show', [LogbookController::class, 'testShowLogbook']);
Route::get('/logbook/mail/{week}/{encryptedstudentid}', [MailingController::class, 'testlogbookApprovalMail']);
Route::get('/declination/mail/{encryptedstudentid}', [MailingController::class, 'testdeclineMail']);
Route::get('/evaluation/mail/{encryptedstudentid}', [MailingController::class, 'teststudentEvaluationMail']);

//Encryption
// /{{Crypt::encryptString($studentid)}}
// $decrypted = Crypt::decryptString($encryptedValue);

//industrial sv evaluation from
Route::get('/company-sv/{id}/evaluation-form', [FormFeedbackController::class, 'compEvaluationForm'])->name('company.feedbackForm');
Route::post('/company-sv/{id}/evaluation-form', [FormFeedbackController::class, 'compEvaluationAnswer'])->name('company.feedbackAnswer');
Route::get('/company-sv/{id}/peo-form', [FormFeedbackController::class, 'peoForm'])->name('company.peoForm');
Route::post('/company-sv/{id}/peo-form', [FormFeedbackController::class, 'peoAnswer'])->name('company.peoAnswer');

