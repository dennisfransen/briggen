<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Corporation;
use App\Models\Stamp;
use App\Models\User;
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

$factory->define(Stamp::class, function (Faker $faker) {
    return [
        "corporation_id" => function () {
            return factory(Corporation::class)->create()->id;
        },
        "user_id" => function () {
            return factory(User::class)->create()->id;
        },
        "count" => $faker->numberBetween(1, 10),
    ];
});
