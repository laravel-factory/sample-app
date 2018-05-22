<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'content' => $faker->paragraph(),
        'customer_id' => function () {
            return factory(App\Customer::class)->create()->id;
        },
    ];
});
