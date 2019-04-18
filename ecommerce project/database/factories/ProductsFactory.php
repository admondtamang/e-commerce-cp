<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => 'adidas',
        'description' => $faker->name,
        'price' => $faker->name,
        'image' => $faker->name,
        'stock_quantity' => $faker->name,
        'remember_token' => str_random(10),
    ];
});
