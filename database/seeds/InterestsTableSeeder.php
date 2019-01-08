<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterestsTableSeeder extends Seeder
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
                'name' => 'Sports/Adventure Sports',
                'description' => ''
            ],
            [
                'name' => 'Beauty Products',
                'description' => ''
            ],
            [
                'name' => 'Books/Reading',
                'description' => ''
            ],
            [
                'name' => 'Business',
                'description' => ''
            ],
            [
                'name' => 'Cars/Automobiles',
                'description' => ''
            ],
            [
                'name' => 'Celebrity news and gossip',
                'description' => ''
            ],
            [
                'name' => 'Comics',
                'description' => ''
            ],
            [
                'name' => 'Decorating/DIY/Home Improvements',
                'description' => ''
            ],
            [
                'name' => 'Economy/Finance',
                'description' => ''
            ],
            [
                'name' => 'Environmental Issue',
                'description' => ''
            ],
            [
                'name' => 'Fashion and Style',
                'description' => ''
            ],
            [
                'name' => 'Film/Movies/TV',
                'description' => ''
            ],
            [
                'name' => 'Fine Arts/Culture',
                'description' => ''
            ],
            [
                'name' => 'Food/Restaurants/Cooking',
                'description' => ''
            ],
            [
                'name' => 'Gadgets',
                'description' => ''
            ],
            [
                'name' => 'Gaming',
                'description' => ''
            ],
            [
                'name' => 'Health and Fitness',
                'description' => ''
            ],
            [
                'name' => 'Humor',
                'description' => ''
            ],
            [
                'name' => 'Music',
                'description' => ''
            ],
            [
                'name' => 'Personal Finance/Invesment',
                'description' => ''
            ],
            [
                'name' => 'Personal Health Care',
                'description' => ''
            ],
            [
                'name' => 'Pets/Pet Care',
                'description' => ''
            ],
            [
                'name' => 'Science and Tech',
                'description' => ''
            ],
            [
                'name' => 'Style',
                'description' => ''
            ],
            [
                'name' => 'Travel',
                'description' => ''
            ]
        ];

        DB::table('interests')->insert($data);
    }
}
