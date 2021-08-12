<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use App\Models\LecturerInfo;
use Illuminate\Http\Request;

class LectStatusController extends Controller
{
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

    public function viewAll()
    {
        $lectInfo = LecturerInfo::all();

        return view('lecturer.viewAll',compact('lectInfo'));
    }
}
