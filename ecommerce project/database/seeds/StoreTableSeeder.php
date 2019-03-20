<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            'name' => Str::random(10),
            'email' => 'gold@gmail.com',
            'password' => Hash::make('gold@gmail.com'),
            'address' => 'kathmadu',
            'phone' => Str::random(10),
        ]);
    }
}
