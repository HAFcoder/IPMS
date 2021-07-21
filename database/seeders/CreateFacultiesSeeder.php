<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faculty;

class CreateFacultiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faculty = [
            [
                'faculty_name'=>'Faculty of Computing and Multimedia (FCOM)',
                'status'=>'active'
            ],
            [
                'faculty_name'=>'Faculty of Education, Humanities and Arts (FEHA)',
                'status'=>'active'
            ],
            [
                'faculty_name'=>'Faculty of Business, Accountancy and Social Sciences (FBASS)',
                'status'=>'active'
            ],
            [
                'faculty_name'=>'Institute of Graduate Studies (IGS)',
                'status'=>'inactive'
            ],
            [
                'faculty_name'=>'Institute of Professional Studies (IPS)',
                'status'=>'inactive'
            ],
        ];

        foreach ($faculty as $key => $value) {
            Faculty::create($value);
        }

    }
}
