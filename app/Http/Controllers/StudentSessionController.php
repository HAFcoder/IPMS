<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Session;
use App\Models\StudentSession;
use App\Models\Student;
use App\Models\Programme;
use Illuminate\Http\Request;

class StudentSessionController extends Controller
{
    // for student register session
    public function fetchProgramme(Request $request)
    {
        $session = Session::find($request->session_id);
        return response()->json($session);
    }

    public function createStudSession(Request $request) 
    {
        $sessID = $request->get('session_id');
        $progID = $request->get('programme_id');

        $studSess = new StudentSession();
        $studSess->student()->associate(Auth::user()->id);
        $studSess->session()->associate($sessID);
        $studSess->programme()->associate($progID);
        $studSess->save();

        $user = Student::find(Auth::user()->id);
        $user->status = 'pending';
        $user->save();

        $sessions = Session::where('status', '=', 'active')->get();
        return view('student.index', compact('sessions'));
        
    }

    public function index()
    {
        $studSession = StudentSession::where('status', '=', 'pending')->get();
        return view('student.pending', compact('studSession'));
    }

    public function approve($id)
    {
        $studSession = StudentSession::find($id);
        $studSession->status = 'approve';
        $studSession->save();

        $uid = $studSession->student_id;
        $user = Student::find($uid);
        $user->status = 'approve';
        $user->save();

        return redirect()->back();
    }

    public function updateStatus(Request $request)
    {
        $status = $request->get('status');
        $studSession_id = $request->get('studSession_id');
        
        foreach($studSession_id as $id){

            $studSess = StudentSession::find($id);
            $studSess->status = $status;
    
            $studSess->save();

        }

        return 0;

    }
}
