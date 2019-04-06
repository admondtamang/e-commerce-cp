<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'goldstar',
            'description' => 'kathmadu',
            'price' => 500,
            'stock_quantity' => 52,
            'image' => 'cb0fce07b0c3570e6e04a7a5fdf93bde.jpg',
            'category_id' => 1,
            'store_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => 'addidas',
            'description' => 'kathmadu',
            'price' => 1000,
            'stock_quantity' => 52,
            'image' => 'ca17910a903b5edf87c726fc661b0027.jpg',
            'category_id' => 1,
            'store_id' => 2,
        ]);
    }
}
