<?php

namespace App\Http\Controllers;

use App\Models\FormEvaluate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\StudentInfo;
use App\Models\Internship;
use App\Models\GradSurveyAnswer;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\NotificationController;

class FormEvaluateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\FormEvaluate  $formEvaluate
     * @return \Illuminate\Http\Response
     */
    public function show(FormEvaluate $formEvaluate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormEvaluate  $formEvaluate
     * @return \Illuminate\Http\Response
     */
    public function edit(FormEvaluate $formEvaluate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FormEvaluate  $formEvaluate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FormEvaluate $formEvaluate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormEvaluate  $formEvaluate
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormEvaluate $formEvaluate)
    {
        //
    }

    //student
    public function graduate ()
    {
        $id = Auth::user()->id;
        $stud = Student::find($id);
        $stud_info = StudentInfo::where('stud_id', $id)->first();

        $internship = Internship::where('student_id',$id)->where('status','accepted')->with('session','company','graduateAnswer')->first();
        //dump($internship);

        return view('feedback.graduate', compact('stud', 'stud_info','internship'));
    }

    public function submit_graduate (Request $request)
    {
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
         $request->q15
        );
        $markStr = implode(',' , $markArr);

        $graduate = new GradSurveyAnswer;

        $graduate->internship_id = $request->internship_id;
        $graduate->marks = $markStr;
        $graduate->comment = $request->comment;
        $graduate->save();

        $intern = Internship::where('id', $request->internship_id)->first();
        
        //send notification to coordinator
        $message = "Graduate Form Answer has been submitted by student - " . $intern->lecturerInfo->f_name . " " . $intern->lecturerInfo->l_name;
        $lecturer = $this->getAllCoordinator();  //get all coor lecturer
        foreach($lecturer as $lect){
            //dump($lect);
            $notif = (new NotificationController)->addNotificationLecturer($lect->id,$message);

        }

        Alert::success('Submitted!', 'Graduate Survey has been successfully submitted.');

        return $this->graduate();
    }

    public function getsurvey(Request $request)
    {
        $internship_id = $request->get('internid');
        $internship = Internship::where('id',$internship_id)->with('session','company')->get();
        return $internship;
    }


}
