<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->truncate();

        $categories = [
            [
                'name' => 'Community',
                'children' => [
                    ['name' => 'Activities'],
                    ['name' => 'Artists'],
                    ['name' => 'Childcare'],
                    ['name' => 'Classes'],
                    ['name' => 'Events'],
                    ['name' => 'General'],
                    ['name' => 'Groups'],
                    ['name' => 'Local news'],
                    ['name' => 'Lost and found'],
                    ['name' => 'Musicians'],
                    ['name' => 'Pets'],
                    ['name' => 'Politics'],
                    ['name' => 'Rideshare'],
                    ['name' => 'Volunteers'],
                ]
            ],
            [
                'name' => 'Personals',
                'children' => [
                    ['name' => 'Strictly platonic'],
                    ['name' => 'Women seeking women'],
                    ['name' => 'Women seeking men'],
                    ['name' => 'Men seeking women'],
                    ['name' => 'Men seeking men'],
                    ['name' => 'Misc romance'],
                    ['name' => 'Casual encounters'],
                    ['name' => 'Missed connections'],
                    ['name' => 'Rants and raves'],
                ]
            ],
            [
                'name' => 'Housing',
                'children' => [
                    ['name' => 'Apartments / housing'],
                    ['name' => 'Housing swap'],
                    ['name' => 'Housing wanted'],
                    ['name' => 'Office / commercial'],
                    ['name' => 'Parking / storage'],
                    ['name' => 'Real estate for sale'],
                    ['name' => 'Rooms / shared'],
                    ['name' => 'Rooms wanted'],
                    ['name' => 'Sublets / temporary'],
                    ['name' => 'Vacation rentals'],
                ]
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
