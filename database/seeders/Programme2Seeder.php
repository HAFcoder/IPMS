<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Programme as Prog;

class Programme2Seeder extends Seeder
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
            'code' => 'CT206',
            'name' => 'Bachelor of Information Technology (Honours) In Cyber Security',
            'status' => $status,
            ],
            [
            'code' => 'CT203',
            'name' => 'Bachelor of Information  Technology (Honours) in Business Computing',
            'status' => $status,
            ],
            [
            'code' => 'CM201',
            'name' => 'Bachelor of Arts in 3D Animation and Digital Media (Honours)',
            'status' => $status,
            ],
            [
            'code' => 'AB201',
            'name' => 'Bachelor of Business Administration (Honours) Human Resource Management',
            'status' => $status,
            ],
            [
                'code' => 'AA201',
                'name' => 'Bachelor of Accountancy (Hons)',
                'status' => $status,
            ],
            [
                'code' => 'BE201',
                'name' => 'Bachelor of Arts (Hons) in Applied English Language Studies',
                'status' => $status,
            ],
            [
                'code' => 'AB202',
                'name' => 'Bachelor of Business Administration (Honours)',
                'status' => $status,
            ],
            [
                'code' => 'AC201',
                'name' => 'Bachelor of Corporate Administration (Hons)',
                'status' => $status,
            ],
            [
                'code' => 'BK201',
                'name' => 'Bachelor of Communication (Hons) in Corporate Communication',
                'status' => $status,
            ],
            [
                'code' => 'BE202',
                'name' => 'Bachelor of Early Childhood Education (Honours)',
                'status' => $status,
            ],
            [
                'code' => 'BE203',
                'name' => 'Bachelor of Education (Honours) in Teaching English As A Second Language (TESL)',
                'status' => $status,
            ],
            [
                'code' => 'CT204',
                'name' => 'Bachelor of Information Techology (Honours) in Computer Application Development',
                'status' => $status,
            ],
        ];

        
        foreach ($program as $key => $value) {
            Prog::create($value);
        }
    }
}
