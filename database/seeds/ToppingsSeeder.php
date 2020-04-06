<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToppingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('toppings')->insert(
            [
                [
                    'ingredient' => 'Basil',
                    'origin' => 'India'
                ],
                [
                    'ingredient' => 'Buffalo Mozzarella Cheese',
                    'origin' => 'Italy',
                ],
                [
                    'ingredient' => 'Goat Mozzarella Cheese',
                    'origin' => 'Italy',
                ],
                [
                    'ingredient' => 'Blue Cheese',
                    'origin' => 'France',
                ],
                [
                    'ingredient' => 'Tomato Sauce',
                    'origin' => 'Mexico',
                ],
                [
                    'ingredient' => 'Prosciutto Cotto',
                    'origin' => 'Italy',
                ],
                [
                    'ingredient' => 'Funghi',
                    'origin' => '',
                ]
            ]
        );
    }
}
