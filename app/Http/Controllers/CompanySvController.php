<?php

namespace App\Http\Controllers;

use App\Models\CompanySv;
use App\Http\Controllers\Controller;
use App\Models\Internship;
use App\Models\Session;
use App\Models\Supervisor;
use Illuminate\Http\Request;

class CompanySvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intern = Internship::where('status', 'accepted')->get();
        $sv = Supervisor::all();

        return view('company.coorIndustrySV', compact('intern', 'sv'));
    }

    public function bySess()
    {
        $lect = $this->getLecturerInfo();
        $sessions = Session::with('sessionProgramme','lecturerInfo')->get();

        return view('company.bySession',compact('sessions','lect'));
    }

    public function bySess2($id)
    {
        $intern = Internship::where('status', 'accepted')->where('session_id', $id)->get();
        $sv = Supervisor::all();

        return view('company.coorIndustrySV', compact('intern', 'sv'));
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
     * @param  \App\Models\CompanySv  $companySv
     * @return \Illuminate\Http\Response
     */
    public function show(CompanySv $companySv)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanySv  $companySv
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanySv $companySv)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanySv  $companySv
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanySv $companySv)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanySv  $companySv
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanySv $companySv)
    {
        //
    }
}
