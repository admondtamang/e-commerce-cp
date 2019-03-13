<?php

use Illuminate\Database\Seeder;

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
            'email' => 'admondtamang@gmail.com',
            'password' => Hash::make('password'),
            'gender' => 'male',
            'phone' => Str::random(10),
        ]);
    }
}
