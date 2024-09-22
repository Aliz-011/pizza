<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::factory()->createMany([
            [
                'name' => 'Omelette with ham and mushrooms',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE7970321044479C1D1085457A36EB.webp',
                'category_id' => '01j80jys4qq6yfehcz31yx2ach',
            ],
            [
                'name' => 'Omelette with pepperoni',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE94ECF33B0C46BA410DEC1B1DD6F8.webp',
                'category_id' => '01j80jys4qq6yfehcz31yx2ach',
            ],
            [
                'name' => 'Denwich with ham and cheese',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE796FF0059B799A17F57A9E64C725.webp',
                'category_id' => '01j80jys4p83xgmf1wmhw5d9mq',
            ],
            [
                'name' => 'Chicken nuggets',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE7D618B5C7EC29350069AE9532C6E.webp',
                'category_id' => '01j80jys4p83xgmf1wmhw5d9mq',
            ],
            [
                'name' => 'Baked potatoes with sauce 🌱',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EED646A9CD324C962C6BEA78124F19.webp',
                'category_id' => '01j80jys4p83xgmf1wmhw5d9mq',
            ],
            [
                'name' => 'Dodster',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE796F96D11392A2F6DD73599921B9.webp',
                'category_id' => '01j80jys4p83xgmf1wmhw5d9mq',
            ],
            [
                'name' => 'Spicy Dodster 🌶️🌶️',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE796FD3B594068F7A752DF8161D04.webp',
                'category_id' => '01j80jys4p83xgmf1wmhw5d9mq',
            ],
            [
                'name' => 'Banana milkshake',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EEE20B8772A72A9B60CFB20012C185.webp',
                'category_id' => '01j80jys3qk5sh3jpht1ra2ezp',
            ],
            [
                'name' => 'Caramel apple milkshake',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE79702E2A22E693D96133906FB1B8.webp',
                'category_id' => '01j80jys3qk5sh3jpht1ra2ezp',
            ],
            [
                'name' => 'Milkshake with Oreo cookies',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE796FA1F50F8F8111A399E4C1A1E3.webp',
                'category_id' => '01j80jys3qk5sh3jpht1ra2ezp',
            ],
            [
                'name' => 'Classic milkshake 👶',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE796F93FB126693F96CB1D3E403FB.webp',
                'category_id' => '01j80jys3qk5sh3jpht1ra2ezp',
            ],
            [
                'name' => 'Irish Cappuccino',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE7D61999EBDA59C10E216430A6093.webp',
                'category_id' => '01j80jys4qq6yfehcz31yx2ach',
            ],
            [
                'name' => 'Caramel cappuccino',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE7D61AED6B6D4BFDAD4E58D76CF56.webp',
                'category_id' => '01j80jys4qq6yfehcz31yx2ach',
            ],
            [
                'name' => 'Coconut latte',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE7D61B19FA07090EE88B0ED347F42.webp',
                'category_id' => '01j80jys4qq6yfehcz31yx2ach',
            ],
            [
                'name' => 'Americano coffee',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE7D61B044583596548A59078BBD33.webp',
                'category_id' => '01j80jys3qk5sh3jpht1ra2ezp',
            ],
            [
                'name' => 'Coffee Latte',
                'image_url' => 'https://media.dodostatic.net/image/r:292x292/11EE7D61B0C26A3F85D97A78FEEE00AD.webp',
                'category_id' => '01j80jys4qq6yfehcz31yx2ach',
            ],
        ]);
        
    }
}
