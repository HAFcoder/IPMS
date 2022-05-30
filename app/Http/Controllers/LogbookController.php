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
use App\Models\Internship;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

use App\Http\Controllers\MailingController;

class LogbookController extends Controller
{
    public function studSubmission(){
        
        $student_id = Auth::user()->id;
        $internship = Internship::where('student_id', $student_id)->where('status','accepted')->first();

        return view('logbook.studSubmission',compact('internship'));

    }
    
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
        $internship = Internship::where('student_id', $student_id)->where('status','accepted')->first();
        
        return view('logbook.index', compact('internship'));
    }

    public function showLogbookSupervisor($id){
        $logbook = Logbook::where('id',$id)->first();
        $internid = $logbook->internship_id;
        
        $internship = Internship::where('id', $internid)->first();

        return view('logbook.supervisorview',compact('logbook','internship'));
    }

    public function updateLogbook(Request $request, $id)
    {
        $statusvalid = "unvalidate";
        $week = $request->week;

        $request->validate([
            'start_date'=>'required',
        ]);

        //format date
        $date = $request->start_date;
        $date = strtotime($date);
        $dateformat = date('Y-m-d',$date);

        if($request->logbookid == 0){
            $logbook = new Logbook;
        }else{
            $logid = $request->logbookid;
            $logbook = Logbook::where('id',$logid)->first();
        }


        $logbook->internship_id = $id;
        $logbook->start_date = $dateformat;
        $logbook->week = $week;
        $logbook->validate = $statusvalid;
        $logbook->monday = $request->monday; 
        $logbook->tuesday = $request->tuesday; 
        $logbook->wednesday = $request->wednesday; 
        $logbook->thursday = $request->thursday; 
        $logbook->friday = $request->friday; 
        $logbook->saturday = $request->saturday; 
        $logbook->sunday = $request->sunday; 

        $logbook->save();

        
        return redirect()->back()->with('success', 'Your logbook has been successfully save.');
    }

    public function approveLogbookSupervisor($id){
        $status = "validate";
        $logbook = Logbook::where('id',$id)->first();

        $logbook->validate = $status;

        $logbook->save();
        
        return redirect()->back()->with('success', 'Student logbook has been successfully approved.');

    }

    public function studEmailLogbook($id, $week){
        $statusvalid = 'pending';
        $logbook = Logbook::where('id',$id)->first();

        $logbook->validate = $statusvalid;
        $logbook->save();

        $internship = Internship::where('id',$logbook->internship_id)->first();
        $student = StudentInfo::where('stud_id',$internship->student_id)->first();

        $studentname = $student->f_name . " " . $student->l_name;
        $studentid = $student->studentID;

        $companyname = $internship->company->name;
        $companyemail = $internship->company->email;

        //send email here
        $details = [
            'title' => 'Internship Weekly Logbook Update',
            'week' => $week,
            'url' => 'https://www.kuptm.edu.my/',
            'logbookurl' => route('logbook.view.supervisor',$logbook->id),
            'name' => $studentname,
            'company' => $companyname
        ];
        
        $email = (new MailingController)->logbookApprovalMail($companyemail,$details);


        return redirect()->back()->with('info', 'Your logbook has been successfully sent to your company supervisor.');

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

    //at coordinator under feedback menu, logbook and report
    public function coorViewLogbook($id) {
        $logbook = Logbook::where('internship_id', $id)->get();
        $internship = Internship::where('id', $id)->first();
        $programme = Programme::all();
        return view('logbook.coorLogbook', compact('logbook', 'internship', 'programme'));

    }
}
