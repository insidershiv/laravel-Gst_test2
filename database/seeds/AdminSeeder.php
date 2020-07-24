<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([

            'name' => 'admin',
            'email'=> 'admin@admin.com',
            'password'=>Hash::make('admin'),
            'company_name'=>'admin',
            'mobile' => '9540997158',
            'address' => 'Timarpur',
            'city' => 'delhi',
            'state' => 'delhi',
            'country' => 'India',
            'is_admin' => 1



        ]);
    }
}
