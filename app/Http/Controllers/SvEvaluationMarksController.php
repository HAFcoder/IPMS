<?php

namespace App\Http\Controllers;

use App\Models\SvEvaluationMarks;
use App\Http\Controllers\Controller;
use App\Models\EmpIndustrySurveyAnswer;
use App\Models\FinalEvaluationMarks;
use App\Models\Internship;
use App\Models\PresentMarks;
use App\Models\Session;
use Illuminate\Http\Request;

class SvEvaluationMarksController extends Controller
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
     * @param  \App\Models\SvEvaluationMarks  $svEvaluationMarks
     * @return \Illuminate\Http\Response
     */
    public function show(SvEvaluationMarks $svEvaluationMarks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SvEvaluationMarks  $svEvaluationMarks
     * @return \Illuminate\Http\Response
     */
    public function edit(SvEvaluationMarks $svEvaluationMarks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SvEvaluationMarks  $svEvaluationMarks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SvEvaluationMarks $svEvaluationMarks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SvEvaluationMarks  $svEvaluationMarks
     * @return \Illuminate\Http\Response
     */
    public function destroy(SvEvaluationMarks $svEvaluationMarks)
    {
        //
    }

    //coor view marks all
    public function viewAll()
    {
        $intern = Internship::all();
        $evaluationMarks = FinalEvaluationMarks::all();
        $svMarks = SvEvaluationMarks::all();
        $presentMarks = PresentMarks::all();
        $peoMarks = EmpIndustrySurveyAnswer::all();

        return view('feedback.coorMarksAll', compact('intern', 'evaluationMarks', 'svMarks', 'presentMarks', 'peoMarks'));
    }

    public function viewBySess()
    {
        $lect = $this->getLecturerInfo();
        $sessions = Session::with('sessionProgramme','lecturerInfo')->get();
        //dump($sessions);

        return view('lecturer.coorSuperviseeAttach',compact('sessions','lect'));
    }

    public function viewBySess2($id)
    {
        $intern = Internship::where('session_id',$id)->get();
        $evaluationMarks = FinalEvaluationMarks::all();
        $svMarks = SvEvaluationMarks::all();
        $presentMarks = PresentMarks::all();
        $peoMarks = EmpIndustrySurveyAnswer::all();
        return view('feedback.coorMarksSess', compact('intern', 'evaluationMarks', 'svMarks', 'presentMarks', 'peoMarks'));
    }
}