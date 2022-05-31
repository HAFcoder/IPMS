<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Session;
use App\Models\StudentSession;
use App\Models\Student;
use App\Models\Programme;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Controllers\NotificationController;

class StudentSessionController extends Controller
{
    // for student register session
    public function fetchProgramme(Request $request)
    {
        $session['session'] = Session::find($request->session_id);
        return response()->json($session);
    }

    public function createStudSession(Request $request) 
    {
        $id = Auth::user()->id;
        
        $sessID = $request->get('session_id');
        $progID = $request->get('programme_id');

        $studSess = new StudentSession();
        $studSess->student()->associate($id);
        $studSess->session()->associate($sessID);
        $studSess->programme()->associate($progID);

        $user = Student::find($id);
        $user->status = 'pending';

        $studSess->save();
        $user->save();

        $session = Session::where('id',$request->session_id)->first();
        $sessionCode = $session->session_code;
        
        //send notification to coordinator
        $message = "There is new student registered for session - " . $sessionCode;
        $lecturer = $this->getAllCoordinator();  //get all coor lecturer
        foreach($lecturer as $lect){
            //dump($lect);
            $notif = (new NotificationController)->addNotificationLecturer($lect->id,$message);

        }

        // $sessions = Session::where('status', '=', 'active')->get();
        Alert::success('Success!', 'Your session registration has been successful.');

        // student register sesison in studnet page
        // return $this->viewStatus();
        return Redirect("/session/view-status");
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

            dump($id);

            $studSess = StudentSession::find($id);
            $uid = $studSess->student_id;
            $user = Student::find($uid);
            $studSess->status = $status;
            $user->status = $status;
    
            $studSess->save();
            $user->save();

        }

        return 0;

    }

    public function registerSession()
    {
        // student register sesison in studnet page
        $sessions = Session::where('status', '=', 'active')->get();
        //dump($sessions);
        return view('session.register', compact('sessions'));
    }

    public function viewStatus()
    {
        $id = Auth::user()->id;
        // student register sesison in studnet page
        $sessions = StudentSession::where('student_id', $id)->orderBy('created_at', 'ASC')->get();
        //dump($sessions);
        return view('session.viewStatus', compact('sessions'));
    }
}
