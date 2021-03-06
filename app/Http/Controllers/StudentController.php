<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\StudentInfo;
use App\Models\StudentSession;
use App\Models\LookupAddress;
use App\Models\Programme;
use App\Models\Internship;
use App\Models\Session;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dump("in");
        // view student all
        $stud = StudentInfo::all();
        return view('student.viewAll', compact('stud'));
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
    public function show(Student $student)
    {
        //dump("sh");
        return view('students.show', compact('student'));
    }

    public function bySess()
    {
        $lect = $this->getLecturerInfo();
        $sessions = Session::with('sessionProgramme','lecturerInfo')->get();

        return view('student.bySession',compact('sessions','lect'));
    }

    public function bySess2($id)
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
        //dump("ed");
        $stud = Student::find($id);
        $studInfo = StudentInfo::where('stud_id', $id)->first();
        $studSession = StudentSession::where('student_id', $id)->first();

        $sessions = Session::where('status', '=', 'active')->get();
        $programmes = Programme::where('status', '=', 'active')->get();

        $state = LookupAddress::orderBy('state', 'ASC')->distinct()->get(['state']);
        $city = LookupAddress::orderBy('city', 'ASC')->distinct()->get(['city']);
        return view('student.editProfile', compact('stud', 'studInfo', 'studSession', 'state', 'city', 'sessions', 'programmes'));
    }

    /**
     * Update the specified resource in storage.
     * Update student profile in student page
     */
    public function update(Request $request, $id)
    {
        //dump('upd');
        $request->validate([
            'studentID'=>'required',
            'f_name'=>'required',
            'l_name'=>'required',
            'telephone'=>'required',
            'address'=>'required',
            'state'=>'required',
            'postcode'=>'required',
            'programme_id' => 'required',
        ]);

        $status = 'noRequest';

        $studInfo = StudentInfo::where('stud_id', $id)->first();
        // $studInfo->studentID = $request->get('studentID');
        if ($request->get('studentID') != $studInfo->studentID) {
            $studInfo->studentID = $request->get('studentID');
            $studInfo->status = $status;
        }         
        $studInfo->f_name = $request->get('f_name');
        $studInfo->l_name = $request->get('l_name');
        $studInfo->address = $request->get('address');
        $studInfo->city = $request->get('city');
        $studInfo->state = $request->get('state');
        $studInfo->postcode = $request->get('postcode');
        $studInfo->telephone = $request->get('telephone');
        $studInfo->programme_id = $request->get('programme_id');
        $studInfo->save();

        $stud = Student::find($id);
        $stud_info = StudentInfo::where('stud_id', $id)->first();
        Alert::success('Updated!', 'Profile updated.');
        // return view('student.profile', compact('stud', 'stud_info'));
        return Redirect("/profile");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dump("des");
        $stud = Student::find($id);
        $stud->delete();
        Alert::success('Success!', 'User deleted.');
        return redirect()->back();
    }

    public function profileStudent()
    {
        //dump("test");
        $id = Auth::user()->id;
        $stud = Student::find($id);
        $stud_info = StudentInfo::where('stud_id', $id)->first();
        $internship = Internship::orderBy('created_at', 'DESC')
                    ->where('student_id', $id)
                    ->where('status', '=', 'accepted')
                    ->with('company','session','studentInfo','lecturerInfo')
                    ->first();
        return view('student.profile', compact('stud', 'stud_info', 'internship'));
    }

    public function fetchCity(Request $request)
    {
        $data['city'] = LookupAddress::orderBy('city', 'ASC')
                        ->where("state",$request->state)
                        ->distinct()
                        ->get(["city", "city"]);
        return response()->json($data);
    }


    //report
    public function report()
    {
        return view('logbook.report');
    }

    //logbook
    public function studentLogbook()
    {
        //dump("log");
        return view('logbook.coordinatorview');
    }

    
    public function updateStatus(Request $request)
    {
        //dump('up');
        $status = $request->get('status');
        $stud_id = $request->get('stud_id');
        
        foreach($stud_id as $id){

            $student = Student::find($id);
            $student->status = $status;
    
            $student->save();
        }

        return 0;
    }


}
