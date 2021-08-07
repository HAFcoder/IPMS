<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faculty;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $faculty = Faculty::all();
        //dump($sessions);

        return view('faculty.index',compact('faculty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('faculty.create');
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
        $faculty = new Faculty;
        
        $request->validate([
            'faculty_name'=>'required',
            'status'=>'required',
        ]);

        $faculty->faculty_name = $request->faculty_name;
        $faculty->status = $request->status;

        $faculty->save();

        return redirect()->back()->with('success', 'Faculty data has been successfully created.');
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
        //
        $faculty = Faculty::find($id);
        //dump($programme);

        return view('faculty.edit',compact('faculty'));
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
        $faculty = Faculty::find($id);

        $request->validate([
            'faculty_name'=>'required',
            'status'=>'required',
        ]);

        $faculty->faculty_name = $request->faculty_name;
        $faculty->status = $request->status;

        $faculty->save();

        return redirect()->back()->with('success', 'Faculty data has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    public function updateStatus(Request $request)
    {
        $status = $request->get('status');
        $arr_id = $request->get('arr_id');

        foreach($arr_id as $id){

            $faculty = Faculty::find($id);
            $faculty->status = $status;
        
            $faculty->save();

        }

        return 0;

    }
}
