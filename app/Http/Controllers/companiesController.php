<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\LookupAddress;
use App\Models\Internship;
use App\Models\Supervisor;
use App\Models\Lecturer;
use App\Models\OrfForm;
use App\Models\RdnForm;
use App\Models\SvEvaluationMarks;
use RealRashid\SweetAlert\Facades\Alert;

use Mail;
use App\Mail\InternMail;
use App\Models\Session;
use DateTime;
use Illuminate\Support\Facades\Storage;

use App\Http\Controllers\NotificationController;

class companiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        //$lect = $this->getLecturerInfo();
        
        $company = Company::with('lecturerInfo','studentInfo')->get();
        //dump($company);
        //dump($lect);
        
        return view('company.viewAll',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lect = $this->getLecturerInfo();
        $postcode = LookupAddress::orderBy('postcode', 'ASC')->distinct()->get(['postcode']);

        $state = LookupAddress::orderBy('state', 'ASC')->distinct()->get(['state']);

        $city = LookupAddress::orderBy('city', 'ASC')->distinct(['city'])->get(['city']);

        return view('company.addNew',compact('postcode','state','city','lect'));
    }

    public function addForm()
    {
        $postcode = LookupAddress::orderBy('postcode', 'ASC')->distinct()->get(['postcode']);

        $state = LookupAddress::orderBy('state', 'ASC')->distinct()->get(['state']);

        $city = LookupAddress::orderBy('city', 'ASC')->distinct(['city'])->get(['city']);

        return view('company.studAddNew',compact('postcode','state','city'));
    }
    
    public function createCompany(Request $request)
    {
        //print('<script>console.log("hollaaaa create");</script>');
        
        $lect_id = Auth::guard("lecturer")->user()->id;
        $companies = new Company;
        

        //print('<script>console.log("'. $lect_id .'");</script>');

        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'postal_code'=>'required',
            'city'=>'required',
            'state'=>'required',
            'status'=>'required',
            'email'=>'required',
            'phoneNumber'=>'required',
        ]);

        $companies->name = $request->name;
        $companies->address = $request->address;
        $companies->postal_code = $request->postal_code;
        $companies->city = $request->city;
        $companies->state = $request->state;
        $companies->lecturer_id = $lect_id;
        $companies->status = $request->status;
        $companies->email = $request->email;
        $companies->phoneNumber = $request->phoneNumber;
        $companies->webURL = $request->webURL;

        $companies->save();

        return redirect()->back()->with('success', 'Company data has been successfully added.');
        
    }

    public function studCreateCompany(Request $request)
    {
        //print('<script>console.log("hollaaaa create");</script>');
        
        $student_id = Auth::user()->id;
        $companies = new Company;

        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'postal_code'=>'required',
            'city'=>'required',
            'state'=>'required',
            'status'=>'required',
            'email'=>'required',
            'phoneNumber'=>'required',
        ]);

        $companies->name = $request->name;
        $companies->address = $request->address;
        $companies->postal_code = $request->postal_code;
        $companies->city = $request->city;
        $companies->state = $request->state;
        $companies->student_id = $student_id;
        $companies->status = $request->status;
        $companies->email = $request->email;
        $companies->phoneNumber = $request->phoneNumber;
        $companies->webURL = $request->webURL;

        $companies->save();

        $student = StudentInfo::where('stud_id',$student_id)->first();
        $studentname = $student->f_name . " " . $student->l_name;

        //send notification to coordinator
        $message = "There is a new company has been requested for review by student - " . $studentname;
        $lecturer = $this->getAllCoordinator();  //get all coor lecturer
        foreach($lecturer as $lect){
            //dump($lect);
            $notif = (new NotificationController)->addNotificationLecturer($lect->id,$message);

        }

        Alert::success('Success!', 'Company successfully registered but need to be approved by the coordinator.');
        return redirect('/company-all');
        
    }
    
    public function edit($id)
    {
        $lect = $this->getLecturerInfo();
        //dump("id = " . $id);

        $company = Company::find($id)->first();
        //dump($company->postal_code);

        $postcode = LookupAddress::orderBy('postcode', 'ASC')->distinct()->get(['postcode']);

        $state = LookupAddress::orderBy('state', 'ASC')->distinct()->get(['state']);

        $city = LookupAddress::where("postcode",$company->postal_code)->orderBy('city', 'ASC')->distinct(['city'])->get(['city']);

        //dump($city);
        
        return view('company.edit',compact('company','lect','postcode','state','city'));
    }

    public function update(Request $request, $id)
    {
        
        $companies = Company::find($id);

        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'postal_code'=>'required',
            'city'=>'required',
            'state'=>'required',
        ]);

        $companies->name = $request->name;
        $companies->address = $request->address;
        $companies->postal_code = $request->postal_code;
        $companies->city = $request->city;
        $companies->state = $request->state;
        $companies->status = $request->status;
        $companies->email = $request->email;
        $companies->phoneNumber = $request->phoneNumber;
        $companies->webURL = $request->webURL;

        $companies->save();

        // return redirect()->back()->with('success', 'Company data has been successfully updated.');

        Alert::success('Success!', 'Company data has been successfully updated.');
        return redirect('/coordinator/company/list');

    }

    public function destroy($id)
    {
        //dump($id);
        $companies = Company::find($id)->first();
        $name = $companies->name;
        $companies->delete();

        Alert::success('Success!', 'Company has been successfully deleted.');
        return redirect('/coordinator/company/list');
    }

    public function updateStatus(Request $request)
    {
        $status = $request->get('status');
        $comp_id = $request->get('comp_id');
        
        foreach($comp_id as $id){

            $companies = Company::find($id);
            $companies->status = $status;
    
            $companies->save();

        }

        return 0;

    }

    //student website
    public function companyAll()
    {
        $state = LookupAddress::orderBy('state', 'ASC')
                ->distinct()
                ->get(['state']);
        $company = Company::orderBy('status', 'ASC')->where('status', '=', 'approved')->get();
        //dump($company);
        
        return view('company.studViewList',compact('company', 'state'));
    }

    public function applyList()
    {
        $studentsession = $this->getStudentSession();
        //dump($studentsession);
        //dump(now()->addDay());
        if($studentsession != null){

            $internship = Internship::where('session_id', $studentsession->session_id)->where('student_id',Auth::user()->id)->with('company')->get();
            //dump($internship);
        }


        $company = Company::where('status', 'approved')->get();

        return view('company.applyList',compact('studentsession','company','internship'));
    }

    public function addStudentCompany(Request $request){

        //dump("hello");

        $studentid = Auth::user()->id;
        $companyid = $request->company;
        $sessionid = $request->session_id;
        $status = 'pending';

        $internship = new Internship;

        $internship->student_id = $studentid;
        $internship->company_id = $companyid;
        $internship->session_id = $sessionid;
        $internship->status = $status;

        $internship->save();
        Alert::success('Success!', 'Your company application has been added.');

        return $this->applyList();
    }

    public function studentDecline($id){
        //dump($id);
        $internship = Internship::where('id',$id)->with('company')->first();
        //dump($internship);
        return view('company.studentDeclineForm',compact('internship'));
    }

    public function studentReject($id){
        //dump($id);
        $internship = Internship::where('id',$id)->with('company')->first();
        //dump($internship);
        return view('company.studentRejectForm',compact('internship'));
    }

    public function studentAccept($id){
        
        $orf_doc = null;
        $rdn_doc = null;

        //dump($id);
        $internship = Internship::where('id',$id)->first();
        //dump($internship);

        $sessioncode = $internship->session->session_code;

        if(!empty($internship->orfForm)){

            $orf_name = $internship->orfForm->filename;

            $orf_doc = (new FileManagementController)->getUrlFile($sessioncode, $orf_name);
            //dump($orf_name . " - " . $sessioncode);

        }

        if(!empty($internship->rdnForm)){
                
            $rdn_name = $internship->rdnForm->filename;

            $rdn_doc = (new FileManagementController)->getUrlFile($sessioncode, $rdn_name);
        }

        //dump($orf_doc);

        return view('company.studentAcceptForm',compact('internship','orf_doc','rdn_doc'));

    }

    public function studentDeclineOther($internship,$id){

        //set all pending into decline status
        $internship2 = Internship::where('student_id',$internship->student_id)->where('session_id',$internship->session_id)->where('id','!=',$id)->get();
        //dump($internship);
        foreach($internship2 as $intern){

            $rejectstat = 'declined';

            //dump('id' . $intern->id);
         
            $intern->updated_at = now();
            $intern->status = $rejectstat;

            $intern->save();

        }

        //send notification to coordinator
        $message = "There is " . count($internship2) . " new company to send Decline Letter email.";
        $lecturer = $this->getAllCoordinator();  //get all coor lecturer
        foreach($lecturer as $lect){
            //dump($lect);
            $notif = (new NotificationController)->addNotificationLecturer($lect->id,$message);

        }



    }

    public function internship_updateOrf(Request $request, $id){

        $internship = Internship::where('id',$id)->first();
        $status = $request->status;
        
        if($request->orf_id == 0){
            $orf = new OrfForm;
            $orf->internship_id = $internship->id;
            $orf->created_at = now();
        }else{
            $orf = OrfForm::where('id',$request->orf_id)->first();
        }

        $orf->start_training = $request->start_training;
        $orf->end_training = $request->end_training;
        $orf->department = $request->department;
        $orf->represent_name = $request->represent_name;
        $orf->represent_position = $request->represent_position;
        $orf->contact = $request->contact;
        $orf->email = $request->email;
        $location = $internship->session->session_code;

        if ($request->hasFile('filename')) {
            //dump("oii");
            $filename = $request->file('filename')->getClientOriginalName();
            $orf->filename = $filename;

            $file = $request->file('filename');

            $orf_doc = (new FileManagementController)->uploadFile($location, $filename, $file);

        }

        $orf->updated_at = now();
        $orf->save();

        
        //set remaining pending status into decline
        if($internship->status != "accepted"){

            $this->studentDeclineOther($internship,$id);
            
            //send notification to coordinator
            $message = "Student - " . $internship->studentInfo->f_name . " " . $internship->studentInfo->l_name . " has accept company - ". $internship->company->name;
            $lecturer = $this->getAllCoordinator();  //get all coor lecturer
            foreach($lecturer as $lect){
                //dump($lect);
                $notif = (new NotificationController)->addNotificationLecturer($lect->id,$message);

            }

        }

        $internship->updated_at = now();
        $internship->status = $status;
        $internship->allowance = $request->allowance;
        $internship->start_date = $request->start_training;
        $internship->end_date = $request->end_training;
        // intern duration in days
        $d1 = new DateTime($request->start_training);
        $d2 = new DateTime($request->end_training);
        $interval = $d1->diff($d2);
        $internship->duration= $interval->format('%a');
        $internship->save();

        
        Alert::success('Success!', 'Your ORF details has been updated.');

        return $this->studentAccept($id);

    }

    public function internship_updateRdn(Request $request, $id){

        $internship = Internship::where('id',$id)->first();
        $status = $request->status;
        
        //add to rdnForm table
        if($request->rdn_id == 0){
            $rdn = new RdnForm;
            $rdn->internship_id = $internship->id;
            $rdn->created_at = now();
        }else{
            $rdn = RdnForm::where('id',$request->rdn_id)->first();
        }

        //update or add file to s3
        $location = $internship->session->session_code;

        if ($request->hasFile('filename')) {
            $filename = $request->file('filename')->getClientOriginalName();
            $rdn->filename = $filename;

            $file = $request->file('filename');

            $orf_doc = (new FileManagementController)->uploadFile($location, $filename, $file);
        }

        $rdn->report_duty = $request->report_duty;
        $rdn->department = $request->department;
        $rdn->job_scope = $request->job_scope;
        $rdn->represent_name = $request->represent_name;
        $rdn->represent_position = $request->represent_position;


        //add or update supervisor
        if($request->supervisor_id == 0){
            $sv = new Supervisor;

            $sv->company_id = $internship->company_id;
            $sv->name = $request->sv_name;
            $sv->position = $request->sv_position;
            $sv->contact = $request->sv_telephone;
            $sv->email = $request->sv_email;

            $sv->save();
            $internship->supervisor_id = $sv->id;

        }else{
            
            $sv = Supervisor::where('id',$request->supervisor_id)->first();

            $sv->company_id = $internship->company_id;
            $sv->name = $request->sv_name;
            $sv->position = $request->sv_position;
            $sv->contact = $request->sv_telephone;
            $sv->email = $request->sv_email;

            $sv->save();
        }

        $rdn->updated_at = now();
        $rdn->save();

        //set remaining pending status into decline
        if($internship->status != "accepted"){

            $this->studentDeclineOther($internship,$id);

            
            //send notification to coordinator
            $message = "Student - " . $internship->studentInfo->f_name . " " . $internship->studentInfo->l_name . " has accept company - ". $internship->company->name;
            $lecturer = $this->getAllCoordinator();  //get all coor lecturer
            foreach($lecturer as $lect){
                //dump($lect);
                $notif = (new NotificationController)->addNotificationLecturer($lect->id,$message);

            }

        }

        $internship->job_scope = $request->job_scope;
        $internship->updated_at = now();
        $internship->status = $status;
        $internship->save();
        
        Alert::success('Success!', 'Your RDN details has been updated.');

        return $this->studentAccept($id);
        
    }

    public function studentInternship_update(Request $request, $id){

        $internship = Internship::where('id',$id)->first();
        //dump($request);
        $status = $request->status;

        $location = $internship->session->session_code;

        if($status == 'accepted'){ //if status is accepted, get duration,start date, end date data and update

            $duration = $request->duration;
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $job_scope = $request->job_scope;
            $allowance = $request->allowance;
            $supervisor_id = $request->supervisor_id;

            if ($request->hasFile('orf_file')) {
                //dump("oii");
                $filename = $request->file('orf_file')->getClientOriginalName();
                $internship->orf_file = $filename;

                $file = $request->file('orf_file');

                $orf_doc = (new FileManagementController)->uploadFile($location, $filename, $file);

            }

            if ($request->hasFile('rdn_file')) {
                $filename = $request->file('rdn_file')->getClientOriginalName();
                $internship->rdn_file = $filename;

                $file = $request->file('rdn_file');

                $orf_doc = (new FileManagementController)->uploadFile($location, $filename, $file);
            }

            if($supervisor_id == 0){
                $sv = new Supervisor;

                $sv->company_id = $request->company_id;
                $sv->name = $request->sv_name;
                $sv->position = $request->sv_position;
                $sv->contact = $request->sv_telephone;
                $sv->email = $request->sv_email;

                $sv->save();
                $internship->supervisor_id = $sv->id;

            }else{
                
                $sv = Supervisor::where('id',$supervisor_id)->first();

                $sv->company_id = $request->company_id;
                $sv->name = $request->sv_name;
                $sv->position = $request->sv_position;
                $sv->contact = $request->sv_telephone;
                $sv->email = $request->sv_email;

                $sv->save();
            }
    
            $internship->duration = $duration;
            $internship->start_date = $start_date;
            $internship->end_date = $end_date;
            $internship->job_scope = $job_scope;
            $internship->allowance = $allowance;
        }

        $internship->updated_at = now();
        $internship->status = $status;

        $internship->save();

        if($status == "declined"){

            //send notification to coordinator
            $message = "There is a new company to send Decline Letter email.";
            $lecturer = $this->getAllCoordinator();  //get all coor lecturer
            foreach($lecturer as $lect){
                //dump($lect);
                $notif = (new NotificationController)->addNotificationLecturer($lect->id,$message);

            }

        }
        
        Alert::success('Success!', 'Your internship details has been updated.');

        // return $this->applyList();
        return redirect('/apply-list');
    }

    public function internship_updateReport(Request $request, $id){
        
        $internship = Internship::where('id',$id)->first();
        //dump($request);
        $request->validate([
            'report'=>'required',
        ]);

        $report = $request->report;

        $internship->report_link = $report;
        $internship->save();

        return redirect()->back()->with('success', 'Your report document link has been updated.');

    }

    //coordinator menu
    //letter
    public function acceptance()
    {
        return view('company.coorAcceptanceLetter');
    }

    public function reject()
    {
        return view('company.coorDeclineLetter');
    }

    public function companySV()
    {
        // $internship = Internship::with('company','session','studentInfo','svEvaluation')->where('status','accepted')->get();
        // return view('company.coorCompanySVEva',compact('internship'));

        $internship = Internship::with('company','session','studentInfo','empIndustrySurvey')->where('status','accepted')->get();
        $svMarks = SvEvaluationMarks::all();
        //dump($internship);
        return view('feedback.coorCompany',compact('internship','svMarks'));
    }

    //studnet-company
    public function statusAll()
    {
        $internship = Internship::with('company','session','studentInfo')->orderBy('id','DESC')->get();
        //dump($internship->groupBy('company_id'));
        return view('company.coorStudentStatusAll',compact('internship'));
    }

    public function statusSess()
{
        $lect = $this->getLecturerInfo();
        $sessions = Session::with('sessionProgramme','lecturerInfo')->get();

        return view('feedback.coorGraduateSess',compact('sessions','lect'));
    }

    public function statusSess2($id)
    {
        $internship = Internship::with('company','session','studentInfo')->where('session_id', $id)->orderBy('id','DESC')->get();
        //dump($internship->groupBy('company_id'));
        return view('company.coorStudentStatusAll',compact('internship'));
    }
    
    public function internship_details($id)
    {
        $orf_doc = null;
        $rdn_doc = null;

        $internship = Internship::where('id',$id)->with('company','session','studentInfo','lecturer')->first();
        //dump($internship);

        $sessioncode = $internship->session->session_code;

        $lecturers = Lecturer::where('status','approve')->with('lecturerInfo')->get();

        if(!empty($internship->orfForm)){

            $orf_name = $internship->orfForm->filename;

            $orf_doc = (new FileManagementController)->getUrlFile($sessioncode, $orf_name);

        }

        if(!empty($internship->rdnForm)){
                
            $rdn_name = $internship->rdnForm->filename;

            $rdn_doc = (new FileManagementController)->getUrlFile($sessioncode, $rdn_name);
        }

        //dump($orf_doc);

        return view('company.internshipDetail',compact('internship','lecturers','orf_doc','rdn_doc'));

    }
    
    public function internship_assignLect(Request $request,$id)
    {
        $lectid = $request->lecturer;

        $internship = Internship::where('id',$id)->first();
        $internship->lecturer_id = $lectid;

        $internship->save();
        Alert::success('Success!', 'Student internship has been successfully assign a lecturer.');

        return $this->internship_details($id);

    }

    public function internship_sendDecline($id){

        $internship = Internship::where('id',$id)->first();

        //get student details
        $studentname = $internship->studentInfo->f_name . " " . $internship->studentInfo->l_name;
        $studentid = $internship->studentInfo->studentID;
        $studentemail = $internship->student->email;

        //company details
        $companyname = $internship->company->name;
        $companyemail = $internship->company->email;
   
        $details = [
            'title' => 'Internship Declination',
            'url' => 'https://www.kuptm.edu.my/',
            'name' => $studentname,
            'id' => $studentid,
            'company' => $companyname
        ];
  
        Mail::to($companyemail)
            ->cc($studentemail)
            ->send(new InternMail($details));

        //get and update email count in database ; internship->emailCount
        $currentCount = $internship->emailDecline;
        $newCount = $currentCount + 1;
        
        $internship->emailDecline = $newCount;
        $internship->save();


        return redirect()->back()->with('success', 'Decline letter has been sent to ' . $companyemail);
    }
   
    public function checkCompanyName(Request $request){

        $company['company'] = Company::where('name', 'ilike' ,$request->companyName)->get();
        return response()->json($company);


    }



}
