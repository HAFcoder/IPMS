<?php

namespace App\Http\Controllers;

use App\Models\PresentMarks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Internship;
use App\Models\Programme;
use App\Models\Session;


class PresentMarksController extends Controller
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
     * @param  \App\Models\PresentMarks  $presentMarks
     * @return \Illuminate\Http\Response
     */
    public function show(PresentMarks $presentMarks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PresentMarks  $presentMarks
     * @return \Illuminate\Http\Response
     */
    public function edit(PresentMarks $presentMarks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PresentMarks  $presentMarks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PresentMarks $presentMarks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PresentMarks  $presentMarks
     * @return \Illuminate\Http\Response
     */
    public function destroy(PresentMarks $presentMarks)
    {
        //
    }

    public function presentViewAll()
    {
        $internship = Internship::with('company','session','studentInfo')->where('status','accepted')->get();
        //dump($internship);
        $presentMarks = PresentMarks::all();
        $findme   = 'Bachelor';
        return view('feedback.coorPresentView',compact('internship', 'presentMarks', 'findme'));
    }

    public function presentViewSess()
    {
        $lect = $this->getLecturerInfo();
        $sessions = Session::with('sessionProgramme','lecturerInfo')->get();

        return view('feedback.coorGraduateSess',compact('sessions','lect'));
    }

    public function presentViewSess2($id)
    {
        $internship = Internship::with('company','session','studentInfo')->where('status','accepted')->where('session_id', $id)->get();
        //dump($internship);
        $presentMarks = PresentMarks::all();
        $findme   = 'Bachelor';
        return view('feedback.coorPresentView',compact('internship', 'presentMarks', 'findme'));
    }

    public function viewPresentMark($id)
    {
        $presentMarks = PresentMarks::where('internship_id',$id)->first();
        $internship = Internship::where('id',$id)->first();
        $programme = Programme::all();
        return view('feedback.presentationView',compact('presentMarks', 'internship', 'programme'));
    }
}
