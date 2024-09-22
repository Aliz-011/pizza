<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PizzasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $chorizo = \App\Models\Product::create([
        //     'name' => 'Chorize',
        //     'image_url' => 'https://media.dodostatic.net/image/r:584x584/11EE7D61706D472F9A5D71EB94149304.webp',
        //     'category_id' => '01j80jys4qq6yfehcz31yx2acg',
        // ]);

        /**
         * attach() for creating
         * sync() for updating
         * detach() for deleting
         * the value passed into these functions are array of ids
         */
        // $chorizo->ingredients()->attach(['01j80jz4fyf3s9zng5m2kjsz09', '01j80jz4g08q23kytvs8h7cpj9']);

        \App\Models\ProductItem::insert([
            ['id' => Str::ulid(), 'price' => 4, 'product_id' => '01j80k4s5gwv3p0rg8gcxwwsgt'],
            ['id' => Str::ulid(), 'price' => 8, 'product_id' => '01j80k4s5gwv3p0rg8gcxwwsgv'],
            ['id' => Str::ulid(), 'price' => 5, 'product_id' => '01j80k4s5h91qwepz04pnbwn6s'],
            ['id' => Str::ulid(), 'price' => 7, 'product_id' => '01j80k4s5h91qwepz04pnbwn6t'],
            ['id' => Str::ulid(), 'price' => 9, 'product_id' => '01j80k4s5j4qvm7pnm0gpa9nqs'],
            ['id' => Str::ulid(), 'price' => 6, 'product_id' => '01j80k4s5j4qvm7pnm0gpa9nqt'],
            ['id' => Str::ulid(), 'price' => 7, 'product_id' => '01j80k4s3fdf5d0gbd936206vv'],
            ['id' => Str::ulid(), 'price' => 5, 'product_id' => '01j80k4s5kwbhw2tgk72t57ad1'],
            ['id' => Str::ulid(), 'price' => 5, 'product_id' => '01j80k4s5phn4rkaj5tads0yez'],
            ['id' => Str::ulid(), 'price' => 9, 'product_id' => '01j80k4s5mmbtzbjff7xr25qcs'],
            ['id' => Str::ulid(), 'price' => 10, 'product_id' => '01j80k4s5n6vzt8gh6dk9e369a'],
            ['id' => Str::ulid(), 'price' => 5, 'product_id' => '01j80k4s5qyhs660j9bsc6r06s'],
            ['id' => Str::ulid(), 'price' => 5, 'product_id' => '01j80k4s5kwbhw2tgk72t57ad0'],
            ['id' => Str::ulid(), 'price' => 7, 'product_id' => '01j80k4s5e1a2z2vvqq4p1h6hd'],
            ['id' => Str::ulid(), 'price' => 6, 'product_id' => '01j80k4s5fssbwc4hg202gbzq0'],
        ]);
    }
}
