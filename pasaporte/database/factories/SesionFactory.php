<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sesion;
use Faker\Generator as Faker;

$factory->define(Sesion::class, function (Faker $faker) {
    return [
        'clase_id' => factory(\App\Clase::class),
        'user_id' => factory(\App\User::class),
    ];
});
