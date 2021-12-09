<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\LecturerInfo;
use App\Models\Student;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getLecturerInfo(){

        $uid = Auth::guard("lecturer")->user()->id;
        $lect = LecturerInfo::where([
            'lect_id' => $uid,
         ])->first(); 

        return $lect;

    }
    
    public function getStudentInfo(){

        $uid = Auth::guard()->user()->id;
        $stud = Student::where([
            'id' => $uid,
         ])->with('student_info')->first(); 

        return $stud;

    }


}
