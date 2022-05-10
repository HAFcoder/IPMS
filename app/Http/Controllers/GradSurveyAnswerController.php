<?php

namespace App\Http\Controllers;

use App\Models\GradSurveyAnswer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Session;

class GradSurveyAnswerController extends Controller
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
     * @param  \App\Models\GradSurveyAnswer  $gradSurveyAnswer
     * @return \Illuminate\Http\Response
     */
    public function show(GradSurveyAnswer $gradSurveyAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GradSurveyAnswer  $gradSurveyAnswer
     * @return \Illuminate\Http\Response
     */
    public function edit(GradSurveyAnswer $gradSurveyAnswer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GradSurveyAnswer  $gradSurveyAnswer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GradSurveyAnswer $gradSurveyAnswer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GradSurveyAnswer  $gradSurveyAnswer
     * @return \Illuminate\Http\Response
     */
    public function destroy(GradSurveyAnswer $gradSurveyAnswer)
    {
        //
    }

    public function gradViewAll()
    {
        $internship = Internship::with('company','session','studentInfo','empIndustrySurvey')->where('status','accepted')->get();
        //dump($internship);
        return view('feedback.coorGraduateAll',compact('internship'));
    }

    public function viewBySessGrad()
    {
        $lect = $this->getLecturerInfo();
        $sessions = Session::with('sessionProgramme','lecturerInfo')->get();

        return view('feedback.coorGraduateSess',compact('sessions','lect'));
    }

    public function viewBySessGrad2($id)
    {
        $internship = Internship::where('session_id',$id)->get();
        //dump('test');
        return view('feedback.coorGraduateAll',compact('internship'));
    }

    public function viewGradSurvey($id)
    {
        $internship = Internship::where('id',$id)->first();
        return view('feedback.graduateView',compact('internship'));
    }

    public function viewChart()
    {
        $graduateMarks = GradSurveyAnswer::all();
        return view('feedback.coorGraduatePie', compact('graduateMarks'));
    }
}
