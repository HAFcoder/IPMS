<?php

namespace App\Http\Controllers;

use App\Models\FormFeedback;
use App\Models\StudentInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SvEvaluationMarks;
use App\Models\FinalEvaluationMarks;
use App\Models\Session;
use App\Models\EmpIndustrySurveyAnswer;
use App\Models\Internship;
use App\Models\Logbook;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\NotificationController;

class FormFeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = 'company';
        $student = 'student';

        $company = FormFeedback::where('role',$company)->get();
        $student = FormFeedback::where('role',$student)->get();

        return view('feedback.index',compact('company','student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormFeedback  $formFeedback
     * @return \Illuminate\Http\Response
     */
    public function show(FormFeedback $formFeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormFeedback  $formFeedback
     * @return \Illuminate\Http\Response
     */
    public function edit(FormFeedback $formFeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormFeedback  $formFeedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormFeedback $formFeedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormFeedback  $formFeedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormFeedback $formFeedback)
    {
        //
    }

    //coordinator menu
    //under fedbacks
    //for compnay
    public function company()
    {
        $internship = Internship::with('company','session','studentInfo','empIndustrySurvey')->where('status','accepted')->get();
        //dump($internship);
        $svMarks = SvEvaluationMarks::all();
        $peoMarks = EmpIndustrySurveyAnswer::all();
        return view('feedback.coorCompany',compact('internship', 'peoMarks', 'svMarks'));
    }

    public function companySess()
    {
        $lect = $this->getLecturerInfo();
        $sessions = Session::with('sessionProgramme','lecturerInfo')->get();

        return view('feedback.coorGraduateSess',compact('sessions','lect'));
    }

    public function companySess2($id)
    {
        $internship = Internship::with('company','session','studentInfo','empIndustrySurvey')->where('status','accepted')->where('session_id', $id)->get();
        //dump($internship);
        $svMarks = SvEvaluationMarks::all();
        $peoMarks = EmpIndustrySurveyAnswer::all();
        return view('feedback.coorCompany',compact('internship', 'peoMarks', 'svMarks'));
    }

    public function logbookReport()
    {
        $internship = Internship::with('company','session','studentInfo','empIndustrySurvey','lecturerInfo')->where('status','accepted')->get();
        $evaluationMarks = FinalEvaluationMarks::all();
        // $logbook = Logbook::get()->groupBy('internship_id');
        $logbook = Logbook::select('internship_id')->groupBy('internship_id')->get();
        return view('feedback.coorLogbook',compact('internship', 'evaluationMarks', 'logbook'));
    }

    public function reportViewSess()
    {
        $lect = $this->getLecturerInfo();
        $sessions = Session::with('sessionProgramme','lecturerInfo')->get();

        return view('feedback.coorGraduateSess',compact('sessions','lect'));
    }

    public function reportViewSess2($id)
    {
        $internship = Internship::with('company','session','studentInfo')->where('status','accepted')->where('session_id', $id)->get();
        //dump($internship);
        $evaluationMarks = FinalEvaluationMarks::all();
        $findme   = 'Bachelor';
        return view('feedback.coorLogbook',compact('internship', 'evaluationMarks', 'findme'));
    }

    public function viewReportMark($id)
    {
        $evaluationMarks = FinalEvaluationMarks::where('internship_id',$id)->first();
        $internship = Internship::where('id',$id)->first();
        return view('feedback.reportLogbookView',compact('evaluationMarks', 'internship'));
    }

    public function compEvaluationForm($id)
    {
        $internship = Internship::where('id',$id)->first();
        //dump('test');
        return view('feedback.compEvaluationForm',compact('internship'));
    }

    public function viewForm($id)
    {
        $internship = Internship::where('id',$id)->first();
        //dump('test');
        return view('feedback.compEvaluationFormView',compact('internship'));
    }

    public function compEvaluationAnswer(Request $request, $id)
    {
        //dump('answer');
        $internship = Internship::where('id',$id)->first();
        $markArr = array();

        $request->validate([
            'q1'=>'required',
            'q2'=>'required',
            'q3'=>'required',
            'q4'=>'required',
            'q5'=>'required',
            'q6'=>'required',
            'q7'=>'required',
            'q8'=>'required',
            'q9'=>'required',
            'q10'=>'required',
            'q11'=>'required',
            'q12'=>'required',
            'q13'=>'required',
            'q14'=>'required',
            'q15'=>'required',
            'q16'=>'required',
            'q17'=>'required',
            'q18'=>'required',
            'q19'=>'required',
            'q20'=>'required',
            'comment'=>'required',
        ]);

        array_push($markArr, 
         $request->q1,
         $request->q2, 
         $request->q3, 
         $request->q4,
         $request->q5,
         $request->q6,
         $request->q7,
         $request->q8,
         $request->q9,
         $request->q10,
         $request->q11,
         $request->q12,
         $request->q13,
         $request->q14,
         $request->q15,
         $request->q16,
         $request->q17,
         $request->q18,
         $request->q19,
         $request->q20
        );
        $markStr = implode(',' , $markArr);

        if(empty($internship->svEvaluation)){
            $evaluation = new SvEvaluationMarks;
        }else{
            $evaluation = SvEvaluationMarks::find($internship->svEvaluation->id);
        }

        $evaluation->internship_id = $internship->id;
        $evaluation->marks = $markStr;
        $evaluation->comment = $request->comment;
        $evaluation->suggestion = $request->suggestion;
        $evaluation->save();

        
        //send notification to coordinator
        $message = "Feedback and Evaluation has been submitted by company - " . $internship->company->name;
        $lecturer = $this->getAllCoordinator();  //get all coor lecturer
        foreach($lecturer as $lect){
            //dump($lect);
            $notif = (new NotificationController)->addNotificationLecturer($lect->id,$message);

        }

        return redirect()->back()->with('success', 'Feedback and Evaluation has been successfully sent. Thank you');
    }

    public function peoForm($id)
    {
        $internship = Internship::where('id',$id)->first();
        return view('feedback.peoForm',compact('internship'));
    }
    
    public function viewFormPeo($id)
    {
        $internship = Internship::where('id',$id)->first();
        return view('feedback.peoView',compact('internship'));
    }

    public function peoAnswer(Request $request, $id)
    {
        //dump($id);
        $internship = Internship::where('id',$id)->first();
        $markArr = array();

        $request->validate([
            'q1'=>'required',
            'q2'=>'required',
            'q3'=>'required',
            'q4'=>'required',
            'q5'=>'required',
            'q6'=>'required',
            'q7'=>'required',
            'q8'=>'required',
            'q9'=>'required',
            'q10'=>'required',
            'q11'=>'required',
            'q12'=>'required',
            'q13'=>'required',
            'q14'=>'required',
            'q15'=>'required',
            'q16'=>'required',
            'q17'=>'required',
            'q18'=>'required',
            'comment'=>'required',
        ]);

        array_push($markArr, 
         $request->q1,
         $request->q2, 
         $request->q3, 
         $request->q4,
         $request->q5,
         $request->q6,
         $request->q7,
         $request->q8,
         $request->q9,
         $request->q10,
         $request->q11,
         $request->q12,
         $request->q13,
         $request->q14,
         $request->q15,
         $request->q16,
         $request->q17,
         $request->q18
        );
        $markStr = implode(',' , $markArr);

        if(empty($internship->empIndustrySurvey)){
            $evaluation = new EmpIndustrySurveyAnswer;
        }else{
            $evaluation = EmpIndustrySurveyAnswer::find($internship->svEvaluation->id);
        }
        //dump($evaluation);
        $evaluation->internship_id = $id;
        $evaluation->marks = $markStr;
        $evaluation->comment = $request->comment;
        $evaluation->save();

        //send notification to coordinator
        $message = "EMPLOYER / INDUSTRY QUESTIONNAIRE (PEO) has been submitted by company - " . $internship->company->name;
        $lecturer = $this->getAllCoordinator();  //get all coor lecturer
        foreach($lecturer as $lect){
            //dump($lect);
            $notif = (new NotificationController)->addNotificationLecturer($lect->id,$message);

        }

        return redirect()->back()->with('success', 'EMPLOYER / INDUSTRY QUESTIONNAIRE (PEO) has been successfully sent. Thank you');

    }

    public function sendFormFeedback($id){

        $type = 'evaluation';

        $internship = Internship::with('company','session','studentInfo','student')->where('id',$id)->first();

        //get student details
        $studentname = $internship->studentInfo->f_name . " " . $internship->studentInfo->l_name;
        $studentid = $internship->studentInfo->studentID;
        $studentemail = $internship->student->email;

        //company details
        $companyname = $internship->company->name;
        $companyemail = $internship->company->email;

        //sv details
        $svemail = $internship->supervisor->email;

        //set url
        $url = route('company.feedbackForm',$internship->id);

        //dump($url);

        $subject = "UPTM INTERNSHIP - INDUSTRIAL SUPERVISOR EVALUATION REPORT";
        
        $email = (new MailingController)->sendEmail($internship,$svemail, $studentemail, $subject,$type);
        
        //get and update email count in database ; internship->emailEvaluationForm
        $currentCount = $internship->emailEvaluationForm;
        $newCount = $currentCount + 1;
        
        $internship->emailEvaluationForm = $newCount;
        $internship->save();
        
        return redirect()->back()->with('success', 'Email has been sent to ' . $companyemail);

    }

    public function sendFormPeo($id){

        $type = 'peo';

        $internship = Internship::with('company','session','studentInfo','student')->where('id',$id)->first();

        //get student details
        $studentname = $internship->studentInfo->f_name . " " . $internship->studentInfo->l_name;
        $studentid = $internship->studentInfo->studentID;
        $studentemail = $internship->student->email;

        //company details
        $companyname = $internship->company->name;
        $companyemail = $internship->company->email;

        //sv details
        $svemail = $internship->supervisor->email;

        //set url
        $url = route('company.feedbackForm',$internship->id);

        //dump($url);

        $subject = "UPTM INTERNSHIP - EMPLOYER / INDUSTRY QUESTIONNAIRE";
        
        $email = (new MailingController)->sendEmail($internship,$svemail, $studentemail, $subject, $type);

        
        //get and update email count in database ; internship->emailPeoForm
        $currentCount = $internship->emailPeoForm;
        $newCount = $currentCount + 1;
        
        $internship->emailPeoForm = $newCount;
        $internship->save();
        
        return redirect()->back()->with('success', 'Email has been sent to ' . $companyemail);

    }

}
