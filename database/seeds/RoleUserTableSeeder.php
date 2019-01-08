<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'email' => 'superadmin@utmostphere.com',
                'role' => 'sup'
            ],
            [
                'email' => 'admin@utmostphere.com',
                'role' => 'adm'
            ],
            [
                'email' => 'operator@utmostphere.com',
                'role' => 'opr'
            ],
            [
                'email' => 'finance@utmostphere.com',
                'role' => 'fnc'
            ],
            [
                'email' => 'report@utmostphere.com',
                'role' => 'rpt'
            ]
        ];

        foreach ($data as $value) {

            $user = DB::table('users')->where('email', $value['email'])->first();
            $role = DB::table('roles')->where('role', $value['role'])->first();

            DB::table('user_roles')->insert([
                'user_id' => $user->id,
                'role_id' => $role->id
            ]);

        }
    }
}
