<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Clase;
use Faker\Generator as Faker;

$factory->define(Clase::class, function (Faker $faker) {
    return [
        'coach_id' => factory(\App\Coach::class),
        'clase_nombre' => $faker->name,
        'clase_hora_inicio' => $faker->time,
        'clase_hora_fin' => $faker->time,
        'clase_dias' => 'Martes',
    ];
});
