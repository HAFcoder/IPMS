<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\StudentInfo;
use App\Models\StudentSession;
use App\Models\LookupAddress;
use App\Models\Programme;
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
        return view('students.show', compact('student'));
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
        return view('student.editProfile', compact('stud', 'studInfo', 'studSession', 'state', 'city', 'sessions', 'programmes'));
    }

    /**
     * Update the specified resource in storage.
     * Update student profile in student page
     */
    public function update(Request $request, $id)
    {
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

        $studInfo = StudentInfo::where('stud_id', $id)->first();
        $studInfo->studentID = $request->get('studentID');
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
        return view('student.profile', compact('stud', 'stud_info'));
        // return redirect()->back();
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

    public function profileStudent()
    {
        $id = Auth::user()->id;
        $stud = Student::find($id);
        $stud_info = StudentInfo::where('stud_id', $id)->first();
        return view('student.profile', compact('stud', 'stud_info'));
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

    
    public function updateStatus(Request $request)
    {
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
