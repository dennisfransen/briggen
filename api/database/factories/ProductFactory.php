<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Corporation;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        "corporation_id" => function () {
            return factory(Corporation::class)->create()->id;
        },
        "title" => $faker->streetName,
        "description" => $faker->sentence(10),
        "image_url" => "plate2",
        "star_value" => $faker->randomFloat(1, 0.0, 5.0),
        "price" => $faker->randomFloat(1, 10.00, 900.00),
    ];
});
