<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $data = json_decode(File::get('./database/seeds/cities.json'));
        $cities = array();
        $index = 0;
        foreach ($data as $key => $val) {
            if(!isset($cities[$index])) $cities[$index] = array();
            $row = (array) $val;
            $cities[$index][] = array(
                "name" => $row['name'],
                "province_id" => intval($row['province_id'])
            );
            if($key > 0 && $key % 1000 == 0) $index++;
        }
        foreach ($cities as $values) {
            DB::table('cities')->insert($values);
        }
        Schema::enableForeignKeyConstraints();
    }
}
