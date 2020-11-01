<?php

use App\Dia;
use App\Clase;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ClaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lunes = Dia::where('dia_nombre', 'Lunes')->first();
        $martes = Dia::where('dia_nombre', 'Martes')->first();
        $miercoles = Dia::where('dia_nombre', 'Miércoles')->first();
        $jueves = Dia::where('dia_nombre', 'Jueves')->first();
        $viernes = Dia::where('dia_nombre', 'Viernes')->first();

        $tenis = Clase::create([
            'clase_nombre' => 'Tenis',
            'clase_hora_inicio' => NOW(),
            'clase_hora_fin' => NOW(),
            'coach_id' => '1'
        ]);

        $atletismo = Clase::create([
            'clase_nombre' => 'Atletismo',
            'clase_hora_inicio' => NOW(),
            'clase_hora_fin' => NOW(),
            'coach_id' => '2'
        ]);

        $natacion = Clase::create([
            'clase_nombre' => 'Natación',
            'clase_hora_inicio' => NOW(),
            'clase_hora_fin' => NOW(),
            'coach_id' => '3'
        ]);

        $futbol = Clase::create([
            'clase_nombre' => 'Futbol',
            'clase_hora_inicio' => NOW(),
            'clase_hora_fin' => NOW(),
            'coach_id' => '4'
        ]);

        $gimnasio = Clase::create([
            'clase_nombre' => 'Gimnasio',
            'clase_hora_inicio' => NOW(),
            'clase_hora_fin' => NOW(),
            'coach_id' => '5'
        ]);

        $baloncesto = Clase::create([
            'clase_nombre' => 'Baloncesto',
            'clase_hora_inicio' => NOW(),
            'clase_hora_fin' => NOW(),
            'coach_id' => '6'
        ]);

        $tenis->dias()->attach($lunes);
        $tenis->dias()->attach($miercoles);
        $tenis->dias()->attach($viernes);

        $atletismo->dias()->attach($martes);
        $atletismo->dias()->attach($jueves);

        $natacion->dias()->attach($lunes);
        $natacion->dias()->attach($miercoles);
        $natacion->dias()->attach($viernes);

        $futbol->dias()->attach($martes);
        $futbol->dias()->attach($jueves);

        $gimnasio->dias()->attach($lunes);
        $gimnasio->dias()->attach($miercoles);
        $gimnasio->dias()->attach($viernes);

        $baloncesto->dias()->attach($martes);
        $baloncesto->dias()->attach($jueves);
    }
}
