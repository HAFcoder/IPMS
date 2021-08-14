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

        $date = $request->date;
        $date = strtotime($date);
        $dateformat = date('d/M/Y',$date);

        $logbook->intern_id = $intern->intern_id;
        $logbook->monday = 'No Task';
        $logbook->tuesday = 'No Task';
        $logbook->wednesday = 'No Task';
        $logbook->thursday = 'No Task';
        $logbook->friday = 'No Task';
        $logbook->saturday = 'On Holiday';
        $logbook->sunday = 'On Holiday';
        $logbook->status = 'Unvalidate';
        $logbook->date = $dateformat;
        
        $logbook->save();

        return redirect('/logbook');
    }

    public function showLogbook(){
        $student_id = Auth::user()->id;
        $intern = Internship::where('intern_id', $student_id)->first();
        $logbooks = Logbook::where('intern_id', $student_id)->get();
        
        return view('logbook.index', compact('logbooks'));
    }

    public function updateLogbook(Request $request, $intern_id, $week)
    {

        $request->validate([
            'date'=>'required',
        ]);

        $date = $request->date;
        $date = strtotime($date);
        $dateformat = date('d/M/Y',$date);

        $logbook = Logbook::where('intern_id', $intern_id)
                    ->where('week', $week)
                    ->update([
                       'monday'-> $request->monday,
                       'tuesday'-> $request->tuesday,
                       'wednesday'-> $request->wednesday,
                       'thursday'-> $request->thursday,
                       'friday'-> $request->friday,
                       'saturday'-> $request->saturday,
                       'sunday'-> $request->sunday,
                       'date'-> $dateformat,
                    ]);

        return redirect('/logbook');
    }

    public function deleteLogbook($intern_id, $week)
    {
        $logbook = Logbook::where('intern_id', $intern_id)
                    ->where('week', $week)
                    ->delete();
    }
    
    public function testShowLogbook(){
        $studentid = "15";
        $weeks = [1,2];
        
        return view('logbook.backup', compact('studentid','weeks'));
    }
}
