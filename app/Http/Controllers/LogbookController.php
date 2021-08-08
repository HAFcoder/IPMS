<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Programme;
use App\Models\Session;
use App\Models\Lecturer;
use App\Models\LecturerInfo;
use App\Models\SessionProgramme;
use App\Models\StudentSession;
use App\Models\Student;
use App\Models\StudentInfo;
use Carbon\Carbon;

class LogbookController extends Controller
{
    
    public function createLogbook(Request $request)
    {
        $student_id = Auth::user()->id;
        $intern = Internship::where('intern_id', $student_id)->first();

        $logbook = new Logbook;

        $request->validate([
            'date'=>'required',
        ]);

        $logbook->intern_id = $intern->intern_id;
        $logbook->monday = 'No Task';
        $logbook->tuesday = 'No Task';
        $logbook->wednesday = 'No Task';
        $logbook->thursday = 'No Task';
        $logbook->friday = 'No Task';
        $logbook->saturday = 'On Holiday';
        $logbook->sunday = 'On Holiday';
        $logbook->status = 'Unvalidate';
        $logbook->date = $request->date;
        
        $logbook->save();

        return redirect('/logbook');
    }

    public function updateLogbook()
    {
        return Null;
    }

    public function deleteLogbook()
    {
        return Null;
    }

    public function testlistLogbook()
    {
        return view('logbook.testindex');
    }

    public function testcreateLogbook()
    {
        return Null;
    }

    public function testupdateLogbook()
    {
        return Null;
    }

    public function testdeleteLogbook()
    {
        return Null;
    }
    
}
