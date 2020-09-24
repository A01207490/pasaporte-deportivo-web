<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Anuncio;
use Faker\Generator as Faker;

$factory->define(Anuncio::class, function (Faker $faker) {
    return [
        'anuncio_titulo' => $faker->name,
        'anuncio_cuerpo' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true)
    ];
});
