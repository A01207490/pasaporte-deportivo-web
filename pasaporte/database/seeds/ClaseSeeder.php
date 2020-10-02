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

        $fondo = Clase::create([
            'clase_nombre' => 'Tenis',
            'clase_hora_inicio' => NOW(),
            'clase_hora_fin' => NOW(),
            'coach_id' => '1'
        ]);

        $velocidad = Clase::create([
            'clase_nombre' => 'Atletismo',
            'clase_hora_inicio' => NOW(),
            'clase_hora_fin' => NOW(),
            'coach_id' => '2'
        ]);

        $fondo->dias()->attach($lunes);
        $fondo->dias()->attach($miercoles);
        $fondo->dias()->attach($viernes);

        $velocidad->dias()->attach($martes);
        $velocidad->dias()->attach($jueves);
    }
}
