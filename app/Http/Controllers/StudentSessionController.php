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
        $studSesion = StudentSession::where('status', '=', 'pending')->get();
        return view('coordinator.student.pending');
    }
}
