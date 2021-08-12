<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LookupAddress;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $address = LookupAddress::orderBy('postcode', 'ASC')->get();
        //dump($sessions);

        return view('address.index',compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //
        
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
