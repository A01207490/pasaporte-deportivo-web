<?php

use App\Anuncio;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AnuncioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        Anuncio::create([
            'anuncio_titulo' => "Festival de Atletismo y Borrego Plateado",
            'anuncio_cuerpo' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true)
        ]);
        Anuncio::create([
            'anuncio_titulo' => "Registro Torneo Interno Fut 7",
            'anuncio_cuerpo' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true)
        ]);

        Anuncio::create([
            'anuncio_titulo' => "Ecoas",
            'anuncio_cuerpo' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true)
        ]);

        Anuncio::create([
            'anuncio_titulo' => "Pruebas físicas",
            'anuncio_cuerpo' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true)
        ]);

        Anuncio::create([
            'anuncio_titulo' => "Cierre de semestre",
            'anuncio_cuerpo' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true)
        ]);

        Anuncio::create([
            'anuncio_titulo' => "Futbol con causa",
            'anuncio_cuerpo' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true)
        ]);
    }
}
