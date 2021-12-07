<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\LookupAddress;

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
        print('<script>console.log("hollaaaa create");</script>');
        
        $lect_id = Auth::guard("lecturer")->user()->id;
        $companies = new Company;
        

        print('<script>console.log("'. $lect_id .'");</script>');

        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'postal_code'=>'required',
            'city'=>'required',
            'state'=>'required',
            'status'=>'required',
        ]);

        $companies->name = $request->name;
        $companies->address = $request->address;
        $companies->postal_code = $request->postal_code;
        $companies->city = $request->city;
        $companies->state = $request->state;
        $companies->lecturer_id = $lect_id;
        $companies->status = $request->status;

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
        return view('company.applyList');
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
        return view('company.coorStudentStatusAll');
    }

}
