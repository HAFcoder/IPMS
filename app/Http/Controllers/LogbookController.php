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
    
    public function listLogbook()
    {
        $lect = $this->getLecturerInfo();
        return view('logbook.index', ['lect' => $lect]);
    }

    public function createLogbook(Request $request)
    {
 
        $logbook = new Logbook;

        $request->validate([
            'date'=>'required',
        ]);

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

        return redirect()->back()->with('success', 'Company data has been successfully updated.');
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
