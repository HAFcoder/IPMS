<?php

namespace App\Http\Controllers;

use App\Models\LectEvaluate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\Session;
use App\Models\StudentSession;
use App\Models\Internship;
use App\Models\Programme;
use App\Models\PresentMarks;
use App\Models\FinalEvaluationMarks;
use App\Models\Logbook;

class LectEvaluateController extends Controller
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
     * @param  \App\Models\LectEvaluate  $lectEvaluate
     * @return \Illuminate\Http\Response
     */
    public function show(LectEvaluate $lectEvaluate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LectEvaluate  $lectEvaluate
     * @return \Illuminate\Http\Response
     */
    public function edit(LectEvaluate $lectEvaluate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LectEvaluate  $lectEvaluate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LectEvaluate $lectEvaluate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LectEvaluate  $lectEvaluate
     * @return \Illuminate\Http\Response
     */
    public function destroy(LectEvaluate $lectEvaluate)
    {
        //
    }

    //lecturer website

    // view session list lect in charge
    public function feedbackSess ()
    {   
        $sessions = Session::all();
        //dump($sessions);
        return view('feedback.lectStudSession',compact('sessions'));
    }

    // view stud list for feedbacks
    public function studList ($id)
    {
        //$sessions = Session::where('id',$id)->with('sessionProgramme','lecturerInfo')->first();
        //$student_session = StudentSession::orderBy('status', 'ASC')->where('session_id',$id)->with('studentInfo','programme')->get();
        $internship = Internship::where('lecturer_id',Auth::user()->id)
                                ->where('session_id',$id)
                                ->get();
        $programme = Programme::all();
        $findme   = 'Bachelor';
        //dump($internship);
        //dump($sessions);
        //dump(Auth::user()->id);
        return view('feedback.lectStudList',compact('internship','programme','findme'));
    }

    //lect logbook evaluation for student
    public function logbookRead ($id)
    {
        $logbook = Logbook::where('internship_id', $id)->get();
        $internship = Internship::where('id', $id)->first();
        $programme = Programme::all();
        return view('logbook.lectLogbookReport',compact('logbook', 'internship', 'programme'));
    }

    public function logbookEva ($id)
    {
        $finaleva = FinalEvaluationMarks::where('internship_id',$id)->first();
        $internship = Internship::where('id',$id)->first();
        $programme = Programme::all();

        $yesno= 'no';
        $markArr = null;

        if(!empty($finaleva)){
            $yesno = 'yes';
            
            $markArr = explode(',' , $finaleva->marks);

        }
        return view('feedback.lectLogbook',compact('id','yesno','markArr','finaleva', 'internship', 'programme'));
    }

    public function update_logbookEva (Request $request, $id)
    {
        //dump($request);
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
            'q20'=>'required'
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

        //dump($markArr);

        $markStr = implode(',' , $markArr);
        //dump($markStr);

        if($request->evaId == 0){
            $finaleva = new FinalEvaluationMarks;
        }else{
            $finaleva = FinalEvaluationMarks::find($request->evaId);
        }

        $finaleva->internship_id = $request->internship_id;
        $finaleva->marks = $markStr;

        $finaleva->save();
        
        $intern = Internship::where('id', $id)->first();
        Alert::success('Submitted!', 'Student final report & logbook evaluation mark has been successfully submitted.');

        return $this->studList($intern->session_id);

    }

    public function presentationEva ($id)
    {
        $presentMark = PresentMarks::where('internship_id',$id)->first();
        $internship = Internship::where('id',$id)->first();
        $programme = Programme::all();

        $yesno= 'no';
        $markArr = null;

        if(!empty($presentMark)){
            $yesno = 'yes';
            
            $markArr = explode(',' , $presentMark->marks);

        }
        return view('feedback.lectPresentation',compact('id','yesno','presentMark','markArr', 'internship', 'programme'));
    }

    public function update_presentationEva (Request $request, $id)
    {
        //dump($request);
        $markArr = array();

        $request->validate([
            'q1'=>'required',
            'q2'=>'required',
            'q3'=>'required',
            'q4'=>'required'
        ]);

        array_push($markArr, $request->q1, $request->q2, $request->q3, $request->q4);

        //dump($markArr);

        $markStr = implode(',' , $markArr);
        //dump($markStr);

        if($request->presentId == 0){
            $present = new PresentMarks;
        }else{
            $present = PresentMarks::find($request->presentId);
        }

        $present->internship_id = $request->internship_id;
        $present->comment = $request->comment;
        $present->marks = $markStr;

        $present->save();
        
        $intern = Internship::where('id', $id)->first();
        Alert::success('Submitted!', 'Student presentation mark has been successfully submitted.');

        return $this->studList($intern->session_id);

    }

}
