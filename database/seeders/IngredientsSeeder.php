<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Ingredient::factory()->createMany([
            [
                'name' => 'Cheese-stuffed crust',
                'price' => 179,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/99f5cb91225b4875bd06a26d2e842106.png'
            ],
            [
                'name' => 'Creamy mozzarella',
                'price' => 79,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/cdea869ef287426386ed634e6099a5ba.png'
            ],
            [
                'name' => 'Cheddar and parmesan cheeses',
                'price' => 79,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/000D3A22FA54A81411E9AFA69C1FE796'
            ],
            [
                'name' => 'Spicy jalapeño pepper',
                'price' => 59,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/11ee95b6bfdf98fb88a113db92d7b3df.png'
            ],
            [
                'name' => 'Tender chicken',
                'price' => 79,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/000D3A39D824A82E11E9AFA5B328D35A'
            ],
            [
                'name' => 'Mushrooms',
                'price' => 59,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/000D3A22FA54A81411E9AFA67259A324'
            ],
            [
                'name' => 'Ham',
                'price' => 79,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/000D3A39D824A82E11E9AFA61B9A8D61'
            ],
            [
                'name' => 'Spicy pepperoni',
                'price' => 79,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/000D3A22FA54A81411E9AFA6258199C3'
            ],
            [
                'name' => 'Spicy chorizo',
                'price' => 79,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/000D3A22FA54A81411E9AFA62D5D6027'
            ],
            [
                'name' => 'Pickles',
                'price' => 59,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/000D3A21DA51A81211E9EA89958D782B'
            ],
            [
                'name' => 'Fresh tomatoes',
                'price' => 59,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/000D3A39D824A82E11E9AFA7AC1A1D67'
            ],
            [
                'name' => 'Red onion',
                'price' => 59,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/000D3A22FA54A81411E9AFA60AE6464C'
            ],
            [
                'name' => 'Juicy pineapples',
                'price' => 59,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/000D3A21DA51A81211E9AFA6795BA2A0'
            ],
            [
                'name' => 'Italian herbs',
                'price' => 39,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/370dac9ed21e4bffaf9bc2618d258734.png'
            ],
            [
                'name' => 'Sweet bell pepper',
                'price' => 59,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/000D3A22FA54A81411E9AFA63F774C1B'
            ],
            [
                'name' => 'Feta cheese cubes',
                'price' => 79,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/000D3A39D824A82E11E9AFA6B0FFC349'
            ],
            [
                'name' => 'Meatballs',
                'price' => 79,
                'image_url' => 'https://cdn.dodostatic.net/static/Img/Ingredients/b2f3a5d5afe44516a93cfc0d2ee60088.png'
            ]
        ]);
        
    }
}
