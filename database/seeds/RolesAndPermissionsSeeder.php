<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use \App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');
        $structures = DB::select('SHOW TABLES');
        $permissions = array();

        Permission::create(['name' => '*']); // Superadministrator permissions
        Permission::create(['name' => '*@create']);
        Permission::create(['name' => '*@read']);
        Permission::create(['name' => '*@update']);
        Permission::create(['name' => '*@delete']);
        Permission::create(['name' => '*@restore']);
        Permission::create(['name' => '*@destroy']);

        foreach ($structures as $key => $table) {
            $table_name = $table->{array_keys((array)$table)[0]};
            // create permissions
            Permission::create(['name' => $table_name.'@create']);
            Permission::create(['name' => $table_name.'@read']);
            Permission::create(['name' => $table_name.'@update']);
            Permission::create(['name' => $table_name.'@delete']);
            Permission::create(['name' => $table_name.'@restore']);
            Permission::create(['name' => $table_name.'@destroy']);

            Permission::create(['name' => $table_name.'@*']);
        }

        Permission::create(['name' => 'users@activate']);
        Permission::create(['name' => 'users@deactivate']);

        // create roles and assign created permissions
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'operator']);
        $role = Role::create(['name' => 'reporter']);
        $role = Role::create(['name' => 'finance']);
        $role = Role::create(['name' => 'manager']);

        $role = Role::create(['name' => 'user']);
        // Default permissions
        $role->givePermissionTo(['users@read', 'users@update']);

        $role = Role::create(['name' => 'superadmin']);
        // $role->givePermissionTo(Permission::all());
        $role->givePermissionTo(['*']);

        $user = User::find(1);
        $user->assignRole('superadmin');
    }
}