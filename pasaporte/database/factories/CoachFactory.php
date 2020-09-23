<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coach;
use Faker\Generator as Faker;

$factory->define(Coach::class, function (Faker $faker) {
    return [
        //
        'coach_nombre' => $faker->name,
        'coach_correo' => $faker->unique()->safeEmail,
    ];
});
