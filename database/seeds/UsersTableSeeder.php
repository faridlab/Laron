<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =
            [
                [
                    'first_name' => "Super",
                    'last_name' => "Administrator",
                    'email' => 'superadmin@utmostphere.com',
                    'password' => bcrypt('password'),
                    "gender" => 1,
                    "dob" => date('Y-m-d'),

                    "phone"	=> '000-0000-0000',
                    // "country_id"	=> 1,
                    // "province_id"	=> 1,
                    // "city_id"	=> 1,
                    // "address"	=> 'Jakarta',
                    // "postal_code"	=> '00000',
                ],
                [
                    'first_name' => "Admin",
                    'last_name' => "Administrator",
                    'email' => 'admin@utmostphere.com',
                    'password' => bcrypt('password'),
                    "gender" => 1,
                    "dob" => date('Y-m-d'),

                    "phone"	=> '000-0000-0000',
                    // "country_id"	=> 1,
                    // "province_id"	=> 1,
                    // "city_id"	=> 1,
                    // "address"	=> 'Jakarta',
                    // "postal_code"	=> '00000',
                ],
                [
                    'first_name' => "Admin",
                    'last_name' => "Operator",
                    'email' => 'operator@utmostphere.com',
                    'password' => bcrypt('password'),
                    "gender" => 1,
                    "dob" => date('Y-m-d'),

                    "phone"	=> '000-0000-0000',
                    // "country_id"	=> 1,
                    // "province_id"	=> 1,
                    // "city_id"	=> 1,
                    // "address"	=> 'Jakarta',
                    // "postal_code"	=> '00000',
                ],
                [
                    'first_name' => "Admin",
                    'last_name' => "Finance",
                    'email' => 'finance@utmostphere.com',
                    'password' => bcrypt('password'),
                    "gender" => 1,
                    "dob" => date('Y-m-d'),

                    "phone"	=> '000-0000-0000',
                    // "country_id"	=> 1,
                    // "province_id"	=> 1,
                    // "city_id"	=> 1,
                    // "address"	=> 'Jakarta',
                    // "postal_code"	=> '00000',
                ],
                [
                    'first_name' => "Admin",
                    'last_name' => "Reporter",
                    'email' => 'report@utmostphere.com',
                    'password' => bcrypt('password'),
                    "gender" => 1,
                    "dob" => date('Y-m-d'),

                    "phone"	=> '000-0000-0000',
                    // "country_id"	=> 1,
                    // "province_id"	=> 1,
                    // "city_id"	=> 1,
                    // "address"	=> 'Jakarta',
                    // "postal_code"	=> '00000',
                ]
            ];

        DB::table('users')->insert($users);
    }
}
