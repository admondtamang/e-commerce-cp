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
            'name' => Str::random(10),
            'description' => 'kathmadu',
            'price' => 5254,
            'stock_quantity' => 52,
            'image' => '4ea982cec8364788545bc4b8ba7a42ff.jpg',
            'category_id' => 1,
            'store_id' => 1,
        ]);
        DB::table('products')->insert([
            'name' => Str::random(10),
            'description' => 'kathmadu',
            'price' => 2222,
            'stock_quantity' => 52,
            'image' => '4ea982cec8364788545bc4b8ba7a42ff.jpg',
            'category_id' => 1,
            'store_id' => 1,
        ]);
    }
}
