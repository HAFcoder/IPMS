<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Lecturer;
use App\Models\LecturerInfo;
use Illuminate\Http\Request;
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


}
