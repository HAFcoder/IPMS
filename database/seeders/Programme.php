<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        DB::table('programmes')->insert([
            [
            'code' => 'CC101',
            'name' => 'Diploma in Computer Science',
            'status' => $status,
            'created_at' => now(),
            ],
            [
            'code' => 'AA103',
            'name' => 'Diploma of Accountancy',
            'status' => $status,
            'created_at' => now(),
            ]
        ]);

    }
}
