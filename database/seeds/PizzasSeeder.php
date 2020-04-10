<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class PizzasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        DB::table('pizzas')->insert(
            [
                [
                    'name' => 'Margherita',
                    'description' => $faker->realText(),
                    'pictureFilename' => 'm.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'USD'
                ],
                [
                    'name' => 'Prosciutto e Funghi',
                    'description' => $faker->realText(),
                    'pictureFilename' => 'pef.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'USD'
                ],
                [
                    'name' => 'Marinara',
                    'description' => $faker->realText(),
                    'pictureFilename' => 'ma.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'USD'
                ],
                [
                    'name' => 'Quattro Stagioni',
                    'description' => $faker->realText(),
                    'pictureFilename' => 'qs.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'USD'
                ],
                [
                    'name' => 'Capricciosa',
                    'description' => $faker->realText(),
                    'pictureFilename' => 'c.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'USD'
                ],
                [
                    'name' => 'Quattro Formaggi',
                    'description' => $faker->realText(),
                    'pictureFilename' => 'qf.png',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'USD'
                ],
                [
                    'name' => 'Vegetariana',
                    'description' => $faker->realText(),
                    'pictureFilename' => 'v.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'USD'
                ],
                [
                    'name' => 'Diavola',
                    'description' => $faker->realText(),
                    'pictureFilename' => 'd.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'USD'
                ],
                [
                    'name' => 'Boscaiola',
                    'description' => $faker->realText(),
                    'pictureFilename' => 'b.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'USD'
                ],
                [
                    'name' => 'Frutti di Mare',
                    'description' => $faker->realText(),
                    'pictureFilename' => 'fdm.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'USD'
                ]
            ]
        );

        // Binds related models via pivot tables
        $sizes = App\Size::all();
        $toppings = App\Topping::all();

        App\Pizza::all()->each(function ($pizza) use ($sizes, $toppings) {
            $pizza->sizes()->attach(
                $sizes->random(rand(1, 3))->pluck('id')->toArray()
            );
            $pizza->toppings()->attach(
                $toppings->random(rand(3, 5))->pluck('id')->toArray()
            );
        });
    }
}
