<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
