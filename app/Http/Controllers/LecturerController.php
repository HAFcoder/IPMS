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
        //
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
        //
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
        return view('student.lectSuperviseeSess');
    }

    //view supervisee for that session
    public function superviseeList()
    {
        $uid = Auth::id();
        $datas = Internship::where('lecturer_id', $uid)->get();
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
        $internship = Internship::with('company','session','studentInfo','lecturerInfo')->get();
        $lect = Lecturer::get();
        $session = Session::get();
        $programme = Programme::get();
        //dump($internship);
        return view ('lecturer.coorSuperviseeAttach', compact('internship', 'lect', 'session', 'programme'));
    }

    //attach sv to student from coorSuperviseeAttach blade
    public function attachLecturer(Request $request)
    {
        //$lect_id = $request->get('lecturer_id');
        $intern_id = $request->get('id');
        $intern = Internship::find($intern_id);
        $intern->lecturer_id = $request->get('lecturer_id');
        $intern->save();

        $internship = Internship::with('company','session','studentInfo','lecturerInfo')->get();
        $lect = Lecturer::get();
        //dump($internship);
        Alert::success('Academic SV changed!', 'Student accademic SV successfully changed.');
        //return view ('lecturer.coorSuperviseeAttach', compact('internship', 'lect'));
        return back();
    }


}
