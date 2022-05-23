<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Lecturer;
use App\Models\LecturerInfo;
use App\Models\Internship;
use App\Models\Programme;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::all();

        return view('lecturer.viewFaculty',compact('faculties'));
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
        $faculty = Faculty::where('id',$id)->first();
        $lectInfo = LecturerInfo::orderBy('lecturerID', 'ASC')->where('faculty_id',$id)->get();
        //dump($sessions);

        return view('lecturer.show',compact('faculty','lectInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lect_info = LecturerInfo::where('lect_id', $id)->first();
        $lecturer = Lecturer::where('id', $id)->first();
        $faculties = Faculty::orderBy('faculty_name', 'ASC')->where('status', '=', 'active')->get();
        return view('lecturer.edit', compact('lect_info', 'faculties'));
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
        $lecturer = Lecturer::find($id);
        $lecturerInfo = LecturerInfo::where('lect_id', $id)->first();

        $lecturer->email = $request->email;
        $lecturerInfo->lecturerID = $request->lecturerID;
        $lecturerInfo->f_name = $request->f_name;
        $lecturerInfo->l_name = $request->l_name;
        $lecturerInfo->telephone = $request->telephone;
        $lecturerInfo->faculty_id = $request->faculty_id;
        $lecturerInfo->position = $request->position;

        $lecturer->save();
        $lecturerInfo->save();

        Alert::success('Success!', 'Lecturer data has been successfully updated.');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lect = Lecturer::find($id);
        $lect->delete();

        Alert::success('Success!', 'Lecturer has been successfully deleted.');
        return redirect()->back();
    }

    public function viewAll()
    {
        $lectInfo = LecturerInfo::orderBy('lecturerID', 'ASC')->get();
        // $lectInfo = LecturerInfo::all();

        return view('lecturer.viewAll',compact('lectInfo'));
    }

    public function updateStatus(Request $request)
    {
        $status = $request->get('status');
        $lect_id = $request->get('lecT_id');
        
        foreach($lect_id as $id){

            $lect = Lecturer::find($id);
            $lect->status = $status;
    
            $lect->save();
        }

        return 0;
    }

    public function changeRole(Request $request)
    {
        $lec = Lecturer::findOrFail($request->id);
        $lec->role = $request->role;
        $lec->save();

        return response()->json(['message' => 'User status updated successfully.']);
    }

    public function profileLect()
    {
        $lect = $this->getLecturerInfo();
        return view('lecturer.profile', compact('lect'));

    }

    //lecturer for view supervisee
    //view session for lecturer
    public function superviseeSess()
    {
        $uid = Auth::id();
        $datas = Internship::where('lecturer_id', $uid)
                            ->distinct('session_id')
                            ->get();

        //dump($datas);
        return view('student.lectSuperviseeSess',compact('datas'));
    }

    //view supervisee for that session
    public function superviseeList($id)
    {
        $uid = Auth::id();
        $datas = Internship::where('lecturer_id', $uid)
                            ->where('session_id', $id)
                            ->get();
        dump($datas);
        return view('student.lectSuperviseeList', compact('datas'));
    }


    //coordinatoor
    //see supervisee for lecturer
    public function viewSupervisee()
    {
        $internship = Internship::where('lecturer_id','!=',null)->with('company','session','studentInfo','lecturerInfo')->get();
        //dump($internship);
        return view ('lecturer.coorSuperviseeView',compact('internship'));
    }

    public function attachSupervisee()
    {
        $lect = $this->getLecturerInfo();
        $sessions = Session::with('sessionProgramme','lecturerInfo')->get();
        //dump($sessions);

        return view('lecturer.coorSuperviseeAttach',compact('sessions','lect'));
    }

    public function attachSupervisee2($id)
    {
        
        $internship = Internship::where('session_id',$id)->where('status','accepted')->orderBy('student_id', 'ASC')->with('company','session','studentInfo','lecturerInfo')->get();
        $lect = Lecturer::where('status','approve')->get();
        $session = Session::where('id',$id)->with('sessionProgramme','lecturerInfo')->first();
        $programme = Programme::get();
        //dump($internship);
        return view ('lecturer.coorSuperviseeAttach2', compact('internship', 'lect', 'session', 'programme'));
    }

    public function fetchIntern(Request $request)
    {
        $data['interns'] = Internship::where("session_id",$request->session_id)
                        ->distinct()
                        ->get(["id", "id"]);
        return response()->json($data);
    }

    //attach sv to student from coorSuperviseeAttach blade
    public function attachLecturer(Request $request)
    {
        $lecturer_id = $request->get('lect_id');

        foreach($request->input('intern_id') as $value){
            $intern = Internship::find($value);
            $intern->lecturer_id = $lecturer_id;
    
            $intern->save();
        }

        Alert::success('Success!', 'Student(s) successfully assigned to a lecturer.');
        return back();
    }


}
