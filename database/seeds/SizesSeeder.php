<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sizes')->insert(
            [
                [
                    'code' => 's',
                    'description' => 'Small, perfectly suitable for a single person',
                    'dia' => 25,
                    'priceMarkup' => 1
                ],
                [
                    'code' => 'm',
                    'description' => 'Medium, good to feed two individuals',
                    'dia' => 30,
                    'priceMarkup' => 1.25
                ],
                [
                    'code' => 'l',
                    'description' => 'Large, best option for a small party',
                    'dia' => 35,
                    'priceMarkup' => 1.5
                ]
            ]
        );
    }
}
