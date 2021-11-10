<?php

namespace App\Http\Controllers;

use App\Models\FormEvaluate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\StudentInfo;
use RealRashid\SweetAlert\Facades\Alert;

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
        return view('feedback.graduate', compact('stud', 'stud_info'));
    }
}
