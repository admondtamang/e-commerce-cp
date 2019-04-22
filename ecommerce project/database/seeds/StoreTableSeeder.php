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
            'name' => 'gold',
            'email' => 'gold@gmail.com',
            'password' => Hash::make('gold@gmail.com'),
            'address' => 'kathmadu',
            'status' => 1,
            'phone' => Str::random(10),
        ]);
        DB::table('stores')->insert([
            'name' => 'sold',
            'email' => 'sold@gmail.com',
            'password' => Hash::make('sold@gmail.com'),
            'address' => 'kathmadu',
            'status' => 1,
            'phone' => Str::random(10),
        ]);
        DB::table('stores')->insert([
            'name' => Str::random(10),
            'email' => 'ram@gmail.com',
            'password' => Hash::make('ram@gmail.com'),
            'address' => 'kathmadu',
            'status' => 0,
            'phone' => Str::random(10),
        ]);
        DB::table('stores')->insert([
            'name' => Str::random(10),
            'email' => 'hari@gmail.com',
            'password' => Hash::make('hari@gmail.com'),
            'address' => 'kathmadu',
            'status' => 0,
            'phone' => Str::random(10),
        ]);
    }
}
