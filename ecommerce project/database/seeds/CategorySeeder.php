<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category' => 'Mens',
            'parent_id' => 0,
            'url' => 'mens'

        ]);
        DB::table('categories')->insert([
            'category' => 'Womens',
            'parent_id' => 0,
            'url' => 'womens'

        ]);
    }
}
