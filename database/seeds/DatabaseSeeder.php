<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountryTableSeeder::class,
            ProvincesTableSeeder::class,
            CitiesTableSeeder::class,
            InterestsTableSeeder::class,
            UsersTableSeeder::class,
            RolesAndPermissionsSeeder::class,
        ]);
    }
}
