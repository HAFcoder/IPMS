<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Programme as Prog;

class Programme extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $status = 'active';

        $program = [
            [
            'code' => 'CC101',
            'name' => 'Diploma in Computer Science',
            'status' => $status,
            ],
            [
            'code' => 'AA103',
            'name' => 'Diploma of Accountancy',
            'status' => $status,
            ],
            [
            'code' => 'BE101',
            'name' => 'Diploma in Teaching of English As a Second Language',
            'status' => $status,
            ],
            [
            'code' => 'BK101',
            'name' => 'Diploma In Corporate Communication',
            'status' => $status,
            ]
        ];

        
        foreach ($program as $key => $value) {
            Prog::create($value);
        }

    }
}
