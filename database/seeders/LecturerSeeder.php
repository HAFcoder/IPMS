<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $role = 'lecturer';
        $status = 'active';
        $positon = 'Head Lecturer';

        DB::table('lecturers')->insert([
            [
            'email' => 'lect@mail.com',
            'password' => Hash::make('password'),
            'role' => $role,
            'status' => $status,
            'created_at' => now(),
            ],
        ]);

        DB::table('lecturer_info')->insert([
            [
            'lect_id' => 1,
            'lecturerID' => 'LC123456',
            'f_name' => 'Muhd',
            'l_name' => 'Lecturer',
            'telephone' => '01234567889',
            'faculty_id' => 1,
            'position' => $positon,
            'created_at' => now(),
            ],
        ]);




    }
}
