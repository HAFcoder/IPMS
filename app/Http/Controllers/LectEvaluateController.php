<?php

namespace App\Http\Controllers;

use App\Models\LectEvaluate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('feedback.lectStudSession');
    }

    // view stud list for feedbacks
    public function studList ()
    {
        return view('feedback.lectStudList');
    }

    //lect logbook evaluation for student
    public function logbookRead ()
    {
        return view('logbook.lectLogbookReport');
    }

    public function logbookEva ()
    {
        return view('feedback.lectLogbook');
    }

    public function presentationEva ()
    {
        return view('feedback.lectPresentation');
    }
}
