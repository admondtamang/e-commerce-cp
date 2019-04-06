<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'admond@gmail.com',
            'password' => Hash::make('admond@gmail.com'),
            'gender' => 'male',
            'phone' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'kiran@gmail.com',
            'password' => Hash::make('kiran@gmail.com'),
            'gender' => 'male',
            'phone' => Str::random(10),
        ]);
    }
}
