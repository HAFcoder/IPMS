<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\LookupAddress;
use App\Models\Company;
use App\Models\Lecturer;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $lookaddress = LookupAddress::first();
        $lecturer = Lecturer::first();

        $address = $lookaddress->address;
        $city = $lookaddress->city;
        $postcode = $lookaddress->postcode;
        $state = $lookaddress->state;

        $status = 'approve';

        $company = [
            [
                'name'=>'Software Engineering Enterprise',
                'address'=>$address,
                'city'=>$city,
                'postal_code'=>$postcode,
                'state'=>$state,
                'status'=>$status,
                'created_at'=>now(),
                'lecturer_id'=>$lecturer->id,
                'email'=>'softwareEg@gmail.com',
                'phoneNumber'=>'0121345487',
                'webURL'=>'instagram.com'
            ]   
        ];

        foreach ($company as $key => $value) {
            Company::create($value);
        }
    }
}
