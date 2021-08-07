<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programme;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $programme = Programme::all();
        //dump($sessions);

        return view('programme.index',compact('programme'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('programme.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $programme = new Programme;
        
        $request->validate([
            'name'=>'required',
            'code'=>'required',
            'status'=>'required',
        ]);

        $programme->name = $request->name;
        $programme->code = $request->code;
        $programme->status = $request->status;

        $programme->save();

        return redirect()->back()->with('success', 'Programme data has been successfully created.');
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
        $programme = Programme::find($id);
        //dump($programme);

        return view('programme.edit',compact('programme'));
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
        $programme = Programme::find($id);

        $request->validate([
            'name'=>'required',
            'code'=>'required',
            'status'=>'required',
        ]);

        $programme->name = $request->name;
        $programme->code = $request->code;
        $programme->status = $request->status;

        $programme->save();

        return redirect()->back()->with('success', 'Programme data has been successfully updated.');
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

            $programme = Programme::find($id);
            $programme->status = $status;
    
            $programme->save();

        }

        return 0;

    }
}
