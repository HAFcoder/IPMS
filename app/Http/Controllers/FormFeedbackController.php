<?php

namespace App\Http\Controllers;

use App\Models\FormFeedback;
use App\Models\StudentInfo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
