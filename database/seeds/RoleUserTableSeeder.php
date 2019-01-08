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
                'email' => 'superadmin@think.web.id',
                'role' => 'sup'
            ],
            [
                'email' => 'admin@think.web.id',
                'role' => 'adm'
            ],
            [
                'email' => 'operator@think.web.id',
                'role' => 'opr'
            ],
            [
                'email' => 'finance@think.web.id',
                'role' => 'fnc'
            ],
            [
                'email' => 'report@think.web.id',
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
