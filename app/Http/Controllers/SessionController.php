<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Programme;
use App\Models\Session;
use App\Models\Lecturer;
use App\Models\LecturerInfo;
use App\Models\SessionProgramme;
use Carbon\Carbon;

class SessionController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $lect = $this->getLecturerInfo();
        $sessions = Session::with('sessionProgramme')->get();
        //dump($sessions);

        return view('session.index',compact('sessions','lect'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dump(Auth::guard("lecturer")->user()->id);
        $lect = $this->getLecturerInfo();
        $programme = Programme::all();
        $randcode = "SS" . rand(100000,999999);
        return view('session.create',compact('randcode', 'programme', 'lect'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $uid = Auth::guard("lecturer")->user()->id;
        $session = new Session;

        $status = 'active';

        $request->validate([
            'start_date'=>'required',
            'end_date'=>'required',
            'programme'=>'required',
        ]);

        $session->session_code = $request->session_code;
        $session->start_date = $request->start_date;
        $session->end_date = $request->end_date;
        $session->description = $request->description;
        $session->status = $status;
        $session->lecturer_id = $uid;

        $session->save();
        $sid = $session->id;

        foreach($request->programme as $prog){

            //dump($prog);
            $ses_prog = new SessionProgramme;
            $ses_prog->session_id = $sid;
            $ses_prog->programme_id = $prog;
            $ses_prog->status = $status;
            $ses_prog->save();

        }

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
        $lect = $this->getLecturerInfo();
        //dump("id = " . $id);
        //$sessions = Session::find($id);
        $sessions = Session::find($id)->with('sessionProgramme')->first();
        $programme = Programme::all();
        //dump($sessions);

        return view('session.edit',compact('sessions','programme','lect'));
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

        $status = 'active';

        $request->validate([
            'start_date'=>'required',
            'end_date'=>'required',
            'programme'=>'required',
        ]);

        $session = Session::find($id);
        $session->session_code = $request->session_code;
        $session->start_date = $request->start_date;
        $session->end_date = $request->end_date;
        $session->description = $request->description;

        $session->save();

        SessionProgramme::where('session_id', $id)->delete();

        foreach($request->programme as $prog){

            //dump($prog);
            $ses_prog = new SessionProgramme;
            $ses_prog->session_id = $id;
            $ses_prog->programme_id = $prog;
            $ses_prog->status = $status;
            $ses_prog->save();

        }

        return redirect()->back()->with('success', 'Session data has been successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::find($id)->first();
        $code = $session->session_code;
        $session->delete();

        SessionProgramme::where('session_id', $id)->delete();

        return redirect()->back()->with('delete', $code.' has been successfully deleted.');
    }


}
