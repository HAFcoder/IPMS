<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentInfo;
use App\Models\StudentSession;
use App\Models\LookupAddress;
use App\Models\Programme;
use App\Models\Session;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // view student all
        $stud = Student::all();
        return view('coordinator.student.viewAll', compact('stud'));
    }

    public function viewDetails()
    {
        // view student all
        $stud = Student::all();
        return view('coordinator.student.viewAll', compact('stud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $stud = Student::find($id);
        $studInfo = StudentInfo::where('stud_id', $id)->first();
        $studSession = StudentSession::where('student_id', $id)->first();

        $sessions = Session::where('status', '=', 'active')->get();
        $programmes = Programme::where('status', '=', 'active')->get();

        $state = LookupAddress::orderBy('state', 'ASC')->distinct()->get(['state']);
        $city = LookupAddress::orderBy('city', 'ASC')->distinct()->get(['city']);
        return view('coordinator.student.editStudent', compact('stud', 'studInfo', 'studSession', 'state', 'city', 'sessions', 'programmes'));
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
        $request->validate([
            'studentID'=>'required',
            'f_name'=>'required',
            'l_name'=>'required',
            'no_ic'=>'required',
            'telephone'=>'required',
            'email'=>'required',
            'address'=>'required',
            'state'=>'required',
            'postcode'=>'required',
            'status'=>'required',
            'city'=>'required',
            'programme_id' => 'required',
        ]);

        $stud = Student::find($id);
        $stud->email = $request->get('email');
        $stud->status = $request->get('status');
        $stud->save();

        $studInfo = StudentInfo::where('stud_id', $id)->first();
        $studInfo->studentID = $request->get('studentID');
        $studInfo->f_name = $request->get('f_name');
        $studInfo->l_name = $request->get('l_name');
        $studInfo->no_ic = $request->get('no_ic');
        $studInfo->address = $request->get('address');
        $studInfo->city = $request->get('city');
        $studInfo->state = $request->get('state');
        $studInfo->postcode = $request->get('postcode');
        $studInfo->telephone = $request->get('telephone');
        $studInfo->programme_id = $request->get('programme_id');
        $studInfo->save();

        $studSession = StudentSession::where('student_id', $id)->first();
        if($studSession != null)
        {
            $studSession->session_id = $request->get('session_id');
            $studSession->programme_id = $request->get('programme_id');
            $studSession->status = $request->get('status');
            $studSession->save();
        }

        return redirect('/lecturer/coordinator/students');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stud = Student::find($id);
        $stud->delete();
        return redirect()->back();
    }
}
