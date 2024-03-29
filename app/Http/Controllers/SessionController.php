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
use App\Models\Student;
use App\Models\StudentSession;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

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
        $sessions = Session::with('sessionProgramme','lecturerInfo')->get();
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
            'session_code'=>'required|unique:sessions',
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
        //dump($request->programme);
        //$sid = 99;
        $sid = $session->id;
        
        foreach($request->programme as $prog){

            //dump($prog);
            $ses_prog = new SessionProgramme;
            $ses_prog->session_id = $sid;
            $ses_prog->programme_id = $prog;
            $ses_prog->status = $status;
            $ses_prog->save();

        }
        //dump("id sess " . $sid);
        $createfolder = (new FileManagementController)->createDirectory($request->session_code);

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
        $sessions = Session::where('id',$id)->with('sessionProgramme','lecturerInfo')->first();
        $student_session = StudentSession::orderBy('status', 'ASC')->where('session_id',$id)->with('studentInfo','programme')->get();
        //dump($sessions);

        return view('session.show',compact('sessions','student_session'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dump("id = " . $id);
        //$sessions = Session::find($id);
        $sessions = Session::where('id', $id)->with('sessionProgramme')->first();
        $programme = Programme::all();
        //dump($sessions);

        return view('session.edit',compact('sessions','programme'));
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
        $session = Session::where('id', $id)->first();
        $code = $session->session_code;
        $session->delete();

        SessionProgramme::where('session_id', $id)->delete();
        Alert::success('Success!', $code. 'has been successfully deleted.');
        return redirect()->back();
    }

    public function destroyStud($id)
    {
        //dump("des");
        $stud = Student::find($id);
        $stud->delete();
        Alert::success('Success!', 'User deleted.');
        return redirect()->back();
    }


}
