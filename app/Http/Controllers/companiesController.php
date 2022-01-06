<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\LookupAddress;
use App\Models\Internship;
use App\Models\Lecturer;
use RealRashid\SweetAlert\Facades\Alert;

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

        return redirect()->back()->with('success', 'Company data has been successfully updated.');

    }

    public function destroy($id)
    {
        //dump($id);
        $companies = Company::find($id)->first();
        $name = $companies->name;
        $companies->delete();
        return redirect()->back()->with('delete', $name.' has been successfully deleted.');
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
        $company = Company::orderBy('status', 'ASC')->get();
        //dump($company);
        
        return view('company.studViewList',compact('company'));
    }

    public function applyList()
    {
        $studentsession = $this->getStudentSession();
        //dump($studentsession);
        //dump(now()->addDay());
        if($studentsession != null){

            $internship = Internship::where('session_id', $studentsession->session_id)->with('company')->get();
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

    public function studentAccept($id){
        //dump($id);
        $internship = Internship::where('id',$id)->with('company')->first();
        //dump($internship);
        return view('company.studentAcceptForm',compact('internship'));
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

    public function studentInternship_update(Request $request, $id){

        $internship = Internship::where('id',$id)->first();

        $status = $request->get('status');

        if($status == 'accepted'){ //if status is accepted, get duration,start date, end date data and update

            $duration = $request->get('duration');
            $start_date = $request->get('start_date');
            $end_date = $request->get('end_date');
    
            $internship->duration = $duration;
            $internship->start_date = $start_date;
            $internship->end_date = $end_date;
        }

        $internship->updated_at = now();
        $internship->status = $status;

        $internship->save();
        
        Alert::success('Success!', 'Your internship details has been updated.');

        return $this->applyList();
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
        return view('company.coorCompanySVEva');
    }

    //studnet-company
    public function statusAll()
    {
        $internship = Internship::with('company','session','studentInfo')->get();
        //dump($internship);
        return view('company.coorStudentStatusAll',compact('internship'));
    }
    
    public function internship_details($id)
    {

        $internship = Internship::find($id)->with('company','session','studentInfo','lecturer')->first();
        //dump($internship);

        $lecturers = Lecturer::where('status','approve')->with('lecturerInfo')->get();

        return view('company.internshipDetail',compact('internship','lecturers'));


    }
    
    public function internship_assignLect(Request $request,$id)
    {
        $lectid = $request->lecturer;

        $internship = Internship::where('id',$id);
        $internship->lecturer_id = $lectid;

        $internship->save();
        Alert::success('Success!', 'Student internship has been successfully assign a lecturer.');

        return $this->internship_details($id);

    }

}
