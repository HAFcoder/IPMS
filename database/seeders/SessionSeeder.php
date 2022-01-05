<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Lecturer;
use App\Models\Session;
use App\Models\StudentInfo;
use App\Models\SessionProgramme;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $student = StudentInfo::first();
        $lecturer = Lecturer::first();
        $sessioncode = "SS123456";

        $datases = [
            'session_code'=>$sessioncode,
            'start_date'=>now(),
            'end_date' =>now()->addDay(5),
            'description'=>'This is session for students.',
            'lecturer_id' => $lecturer->id,
            'status' => 'active',
            'created_at'=>now(),
            'updated_at'=>now()
        ];

        $session = Session::create($datases);

        $dataprog = [
            'session_id'=>$session->id,
            'programme_id' => $student->programme_id,
            'status' => 'active',
            'created_at'=>now(),
            'updated_at'=>now()
        ];

        $session_prog = SessionProgramme::create($dataprog);


    }
}
