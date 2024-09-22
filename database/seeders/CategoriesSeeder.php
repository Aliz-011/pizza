<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Category::factory()->createMany([
            ['name' => 'Drinks'],
            ['name' => 'Starters'],
            ['name' => 'Pizzas'],
            ['name' => 'Breakfast'],
        ]);
    }
}
