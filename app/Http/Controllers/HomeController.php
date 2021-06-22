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
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('auth:admin');
        // $this->middleware('auth:lecturer');
        // $this->middleware('auth:sadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function studentHome()
    {
        return view('home');
    }

    public function lecturerHome()
    {
        return view('lecturer');
    }

    public function adminHome()
    {
        return view('admin');
    }

    public function sadminHome()
    {
        return view('sadmin');
    }
}
