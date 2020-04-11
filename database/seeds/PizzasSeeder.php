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
        DB::table('pizzas')->insert(
            [
                [
                    'name' => 'Margherita',
                    'description' => 'Typical Neapolitan pizza, made with San Marzano tomatoes, mozzarella cheese, fresh basil, salt and extra-virgin olive oil. Traditionally, it is made with fior di latte (cow\'s milk mozzarella) rather than buffalo mozzarella.',
                    'pictureFilename' => 'm.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'EUR'
                ],
                [
                    'name' => 'Prosciutto e Funghi',
                    'description' => 'Topped with tomato sauce, mozzarella, thin slices of prosciutto cotto, and mushrooms. Some varieties can be topped with olives or served drizzled with olive oil.',
                    'pictureFilename' => 'pef.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'EUR'
                ],
                [
                    'name' => 'Marinara',
                    'description' => 'A Neapolitan pizza in Italian cuisine prepared with plain marinara sauce and seasoned with oregano and garlic. It is very similar to a Pizza Margherita, however it lacks the typical Mozzarella or other cheeses.',
                    'pictureFilename' => 'ma.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'EUR'
                ],
                [
                    'name' => 'Quattro Stagioni',
                    'description' => 'Prepared in four sections with diverse ingredients, with each section representing one season of the year.',
                    'pictureFilename' => 'qs.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'EUR'
                ],
                [
                    'name' => 'Capricciosa',
                    'description' => 'Is a style of pizza in Italian cuisine prepared with mozzarella cheese, Italian baked ham, mushroom, artichoke and tomato.',
                    'pictureFilename' => 'c.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'EUR'
                ],
                [
                    'name' => 'Quattro Formaggi',
                    'description' => 'Topped with a combination of four kinds of cheese, as the name suggests. Traditionally, the cheeses should be mozzarella and three other, local cheeses, depending on the region, such as Gorgonzola, Fontina, and Parmigiano-Reggiano.',
                    'pictureFilename' => 'qf.png',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'EUR'
                ],
                [
                    'name' => 'Vegetariana',
                    'description' => 'This Italian pizza variety is created to appeal to the vegetarian palate. Pizza vegetariana consists of a basic pizza dough that is smeared with tomato sauce and topped with mozzarella and a combination of fresh, seasonal vegetables, typically zucchini, eggplants, and peppers, which are almost always pre-cooked.',
                    'pictureFilename' => 'v.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'EUR'
                ],
                [
                    'name' => 'Diavola',
                    'description' => 'A variety of Italian pizza that is traditionally topped with tomato sauce, mozzarella cheese, spicy salami, and hot chili peppers. Black olives are optional and can be added for extra flavor.',
                    'pictureFilename' => 'd.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'EUR'
                ],
                [
                    'name' => 'Boscaiola',
                    'description' => 'Traditional Italian pizza variety that is topped with mozzarella, porcini or champignon mushrooms, tomatoes, cream, and sliced Italian sausage. It is occasionally prepared without tomatoes and can be enriched with a drizzle of olive oil, olives, or fresh parsley.',
                    'pictureFilename' => 'b.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'EUR'
                ],
                [
                    'name' => 'Frutti di Mare',
                    'description' => 'Topped with seafood such as scampi, squid, and mussels. Traditionally, the pizza is served without any cheese, as the seafood is placed on top of the dough and tomato sauce instead. Pizza ai frutti di mare is popular throughout Italy and Mediterranean countries such as Croatia.',
                    'pictureFilename' => 'fdm.jpg',
                    'basePrice' => 9.99,
                    'baseCurrency' => 'EUR'
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
