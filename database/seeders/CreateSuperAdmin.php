<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Sadmin;

class CreateSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        $name = 'Super Admin';
        $email = 'admin@ipms.com';
        $password = 'password';

        $superadmin = 
        [
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'created_at' => now(),
        ];

        Sadmin::create($superadmin);

    }
}
