<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Corporation;
use App\Models\Voucher;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Voucher::class, function (Faker $faker) {
    return [
        "corporation_id" => function () {
            return factory(Corporation::class)->create()->id;
        },
        "code" => $faker->randomElements(["abcdefghijklmnopqrstuvwxyz"], 20),
        "value" => $faker->numberBetween(1, 10),
        "uses" => $faker->numberBetween(1, 10),
    ];
});
