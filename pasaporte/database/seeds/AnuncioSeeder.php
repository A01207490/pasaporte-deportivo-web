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
            'anuncio_titulo' => $faker->name,
            'anuncio_cuerpo' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true)
        ]);
        Anuncio::create([
            'anuncio_titulo' => $faker->name,
            'anuncio_cuerpo' => $faker->paragraph($nbSentences = 10, $variableNbSentences = true)
        ]);
    }
}
