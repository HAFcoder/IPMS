<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\Student;
use App\Models\StudentInfo;
use App\Models\Faculty;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status = 'approved';
        $role = "student";
        $password = "password";

        $faculties = Faculty::first();
        $facultyid = $faculties->id;

        $stud = [
            'email' => 'student@gmail.com',
            'role' => $role,
            'password' => Hash::make($password),
            'status' => $status,
            'created_at' => now(),
        ];

        $test = Student::create($stud);

        $studinfo = [
            'stud_id' => $test->id,
            'studentID' => 'AM123435446',
            'f_name' => 'Muhammad Student',
            'l_name' => 'Bin Pelajar',
            'no_ic' => '970101-14-5757',
            'telephone' => '0123456789',
            'address' => 'Jalan 11-14, Resident Kuptm',
            'city' => 'Kuala Lumpur',
            'postcode' => '56100',
            'state' => 'Kuala Lumpur',
            'programme_id' => $facultyid,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        StudentInfo::create($studinfo);
        


    }
}
