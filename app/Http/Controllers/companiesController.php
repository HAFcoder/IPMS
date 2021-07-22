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
        
        $company = Company::all();
        //print_r($company);
        
        return view('company.viewAll',compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postcode = LookupAddress::orderBy('postcode', 'ASC')->distinct()->get(['postcode']);

        $state = LookupAddress::orderBy('state', 'ASC')->distinct()->get(['state']);

        $city = LookupAddress::orderBy('city', 'ASC')->distinct()->get(['city']);

        return view('company.addNew',compact('postcode','state','city'));
    }

}
