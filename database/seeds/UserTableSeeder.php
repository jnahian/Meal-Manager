<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create( [
            'name'     => 'Nahian',
            'email'    => 'nahian@bigm-bd.com',
            'mobile'   => '01717036048',
            'role'     => 1,
            'password' => Hash::make( 'mm@123' ),
            'status'   => 1,
        ] );
    }
}
