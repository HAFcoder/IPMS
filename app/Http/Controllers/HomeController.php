<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LecturerInfo;
use App\Models\Session;
use App\Models\StudentInfo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    //     // $this->middleware('role:coordinator');
    //     // $this->middleware('role:lecturer');
    //     // $this->middleware('status:approve');
    //     // $this->middleware('status:pending');
    //     // $this->middleware('auth:admin');
    //     // $this->middleware('auth:lecturer');
    //     // $this->middleware('auth:sadmin');
    // }

    public function dashboard()
    {
        return view('welcome');
    }

    public function logout(Request $request) {
        // $role = auth()->user()->role;
        // $this->guard()->logout();
        // $request->session()->flush();
        // $request->session()->regenerate();
        // if ($role == 'lecturer' || $role == 'coordinator') {
        //     return redirect('/login/lecturer');
        // } elseif ($role == 'student') {
        //     return redirect('/login');
        // } else {
        //     return redirect('/login/admin');
        // }
        // $this->guard()->logout();
        // // return redirect('/login/admin');

        if(Auth::guard('lecturer')->check()){
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/login/lecturer');
        }elseif(Auth::guard('sadmin')->check()){
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/login/admin');
        }else{
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/login');
        }
        
    }

    public function studentHome()
    {
        $uid = Auth::user()->id;
        $stud = StudentInfo::where([
            'stud_id' => $uid,
         ])->first(); 

        return view('student.index', compact('stud'));
    }

    public function lecturerHome()
    {
        $uid = Auth::user()->id;
        $lect = LecturerInfo::where([
            'lect_id' => $uid,
         ])->first(); 
        //print_r($lect);
        return view('lecturer.index', compact('lect'));
    }

    public function coordinatorHome()
    {
        $uid = Auth::user()->id;
        $lect = LecturerInfo::where([
            'lect_id' => $uid,
         ])->first(); 
        return view('coordinator.student.logbookView', compact('lect'));
    }

    public function sadminHome()
    {
        return view('sadmin.index');
    }

    public function pending()
    {
        $uid = Auth::user()->id;
        $lect = LecturerInfo::where([
            'lect_id' => $uid,
         ])->first(); 

        return view('lecturer.pending', compact('lect'));
    }
    
}
