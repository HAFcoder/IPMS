<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\Faculty;
use App\Models\Lecturer;
use App\Models\LecturerInfo;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role = 'coordinator';
        $status = 'approve';
        $positon = 'Head Lecturer';

        $faculties = Faculty::first();
        $facultyid = $faculties->id;

        $lecturer = 
        [
            'email' => 'lect@mail.com',
            'password' => Hash::make('password'),
            'role' => $role,
            'status' => $status,
            'created_at' => now(),
        ];

        $lect = Lecturer::create($lecturer);

        $lectinfo = 
        [
            'lect_id' => $lect->id,
            'lecturerID' => 'LC123456',
            'f_name' => 'Muhd',
            'l_name' => 'Lecturer',
            'telephone' => '01234567889',
            'faculty_id' => $facultyid,
            'position' => $positon,
            'created_at' => now(),
        ];

        
        LecturerInfo::create($lectinfo);


    }
}
