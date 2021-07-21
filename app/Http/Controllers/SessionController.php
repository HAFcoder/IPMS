<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Programme;
use App\Models\Session;
use App\Models\Lecturer;
use App\Models\LecturerInfo;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::all();
        //print_r($sessions);
        
        //print_r($test);

        return view('session.index',compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$programme = DB::table('programmes')->get();
        $programme = Programme::all();

        $rand_code = "SS" . rand(100000,99999999);

        return view('session.create',array('randcode'=>$rand_code, 'programme'=>$programme));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //dump($request->post());
        
        $session = new Session;
        $status = 'active';

        $request->validate([
            'session_code'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'programme'=>'required',
        ]);


        $session->session_code = $request->session_code;
        $session->start_date = $request->start_date;
        $session->end_date = $request->end_date;
        $session->description = $request->description;
        $session->programme = $request->programme;
        $session->status = $status;
        $session->lecturer_id = 1; //set dummy id for lecturer

        $session->save();

        return redirect()->back()->with('success', 'Session data has been successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
