<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     // $this->middleware('auth:admin');
    //     // $this->middleware('auth:lecturer');
    //     // $this->middleware('auth:sadmin');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function studentHome()
    {
        return view('student.index');
    }

    public function lecturerHome()
    {
        return view('lecturer.index');
    }

    public function coordinatorHome()
    {
        return view('coordinator.student.logbookView');
    }

    public function sadminHome()
    {
        return view('sadmin.index');
    }

    public function pending()
    {
        // $users = User::all();

        return view('lecturer.index');
    }
    
}
