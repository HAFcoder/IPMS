<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Internship;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LecturerInfo;
use App\models\Session;
use App\Models\Student;
use App\Models\StudentInfo;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    //     // $this->middleware('auth');
    //     // $this->middleware('role:coordinator');
    //     // $this->middleware('role:lecturer');
    //     // $this->middleware('status:approve');
    //     // $this->middleware('status:pending');
    //     // $this->middleware('auth:admin');
    //     // $this->middleware('auth:lecturer');
    //     // $this->middleware('auth:sadmin');
        $this->middleware(['auth','verified']);
    }

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
        $sessions = Session::where('status', '=', 'active')->get();
        //dump($sessions);
        return view('student.index', compact('sessions'));
    }

    public function lecturerHome()
    {
        $uid = Auth::user()->id;
        $lect = LecturerInfo::where([
            'lect_id' => $uid,
         ])->first(); 
        //print_r($lect);
        $studIntern = Internship::where('lecturer_id', $uid)->count();
        $session = Session::whereDate('start_date', '>', Carbon::now())->count();
        return view('lecturer.index', compact('lect', 'studIntern', 'session'));
    }

    public function coordinatorHome()
    {
        $student = Student::count();
        $lecturer = Lecturer::count();
        $company = Company::count();
        $sessions = Session::count();
        return view('coordinator.index', compact('student', 'lecturer', 'company', 'sessions'));
    }

    public function sadminHome()
    {
        $name = Auth::user()->name;
        //dump($uid);
        return view('sadmin.index'); 
    }
    
}
