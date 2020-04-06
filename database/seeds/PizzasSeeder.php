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
        // TODO: Use Faker instead
        DB::table('pizzas')->insert(
            [
                [
                    'name' => 'Margherita',
                    'description' => self::getRandomWords(),
                    'pictureFilename' => 'm.jpg'
                ],
                [
                    'name' => 'Prosciutto e Funghi',
                    'description' => self::getRandomWords(),
                    'pictureFilename' => 'pef.jpg'
                ],
                [
                    'name' => 'Marinara',
                    'description' => self::getRandomWords(),
                    'pictureFilename' => 'ma.jpg'
                ],
                [
                    'name' => 'Quattro Stagioni',
                    'description' => self::getRandomWords(),
                    'pictureFilename' => 'qs.jpg'
                ],
                [
                    'name' => 'Capricciosa',
                    'description' => self::getRandomWords(),
                    'pictureFilename' => 'c.jpg'
                ],
                [
                    'name' => 'Quattro Formaggi',
                    'description' => self::getRandomWords(),
                    'pictureFilename' => 'qf.jpg'
                ],
                [
                    'name' => 'Vegetariana',
                    'description' => self::getRandomWords(),
                    'pictureFilename' => 'v.jpg'
                ],
                [
                    'name' => 'Diavola',
                    'description' => self::getRandomWords(),
                    'pictureFilename' => 'd.jpg'
                ],
                [
                    'name' => 'Boscaiola',
                    'description' => self::getRandomWords(),
                    'pictureFilename' => 'b.jpg'
                ],
                [
                    'name' => 'Frutti di Mare',
                    'description' => self::getRandomWords(),
                    'pictureFilename' => 'fdm.jpg'
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

    /**
     * @return string
     * 
     * Returns concatenated set of randomly generated substrings to imitate words for a text description
     */
    public static function getRandomWords()
    {
        $str = '';
        $dict = array_merge(range('a', 'z'));
        
        for ($i = 0; $i < 10; $i++) {
            shuffle($dict);
            $word = substr(implode($dict), 0, rand(3, 10));
            $str .= ucfirst($word) . ' ';
        }

        return $str;
    }
}
