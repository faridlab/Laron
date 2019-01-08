<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles =
            [
                [
                    'name' => "Super Administrator",
                    'role' => "sup",
                    'description' => 'Super Administrator'
                ],
                [
                    'name' => "Administrator",
                    'role' => "adm",
                    'description' => 'Administrator'
                ],
                [
                    'name' => "Operator",
                    'role' => "opr",
                    'description' => 'Operator'
                ],
                [
                    'name' => "Reporter",
                    'role' => "rpt",
                    'description' => 'Admin Reporter'
                ],
                [
                    'name' => "Finance",
                    'role' => "fnc",
                    'description' => 'Financial Officer'
                ],
                [
                    'name' => "Manager",
                    'role' => "mng",
                    'description' => 'Management User'
                ],
                [
                    'name' => "Influencer",
                    'role' => "inf",
                    'description' => 'Influencer'
                ],
                [
                    'name' => "Designer",
                    'role' => "dsg",
                    'description' => 'Designer'
                ],
                [
                    'name' => "Product Owner",
                    'role' => "pro",
                    'description' => 'Product Owner'
                ],
                [
                    'name' => "Project Owner",
                    'role' => "prj",
                    'description' => 'Project Owner'
                ],
                [
                    'name' => "User",
                    'role' => "usr",
                    'description' => 'Public User'
                ]
            ];

        DB::table('roles')->insert($roles);
    }
}
