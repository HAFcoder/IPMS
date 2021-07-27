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
        $lect = $this->getLecturerInfo();
        
        $company = Company::all();
        //print_r($company);
        
        return view('company.viewAll',compact('company','lect'));
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
    
    public function storeLecturer(Request $request)
    {
        $lect_id = Auth::guard("lecturer")->user()->id;
        $companies = new Company;

        $status = 'active';

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
        $companies->lecturer_id = $request->lect_id;
        $companies->status = $request->status;

        $companies->save();

        return redirect()->back()->with('success', 'Company data has been successfully added.');
    }

    
    public function getpostal(Request $request)
    {
        $city = $request->get('city');
        $city = LookupAddress::where('city','=',$city)->orderBy('postcode', 'ASC')->distinct(['postcode'])->get(['postcode','state']);
        return $city;
    }
    
    public function getcity(Request $request)
    {
        $postalcode = $request->get('postalcode');
        $postcode = LookupAddress::where('postcode','=',$postalcode)->orderBy('city', 'ASC')->distinct(['city'])->get(['city','state']);
        return $postcode;
    }

}
