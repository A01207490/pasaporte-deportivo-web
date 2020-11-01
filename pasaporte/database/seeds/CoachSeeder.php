<?php

use App\Coach;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coach::create([
            'coach_nomina' => 'L00000001',
            'coach_nombre' => 'Luis Eduardo Maravilla Chávez',
            'coach_correo' => 'lmaravil@tec.mx',
        ]);
        Coach::create([
            'coach_nomina' => 'L00000002',
            'coach_nombre' => 'Luis Adrián Landeros Domínguez',
            'coach_correo' => 'a.landeros.d@tec.mx',
        ]);
        Coach::create([
            'coach_nomina' => 'L00000003',
            'coach_nombre' => 'Gonzalo Erazo Anaya',
            'coach_correo' => 'gerazo@tec.mx',
        ]);
        Coach::create([
            'coach_nomina' => 'L00000004',
            'coach_nombre' => 'Francisco Torres Escobar',
            'coach_correo' => 'ftorrese@tec.mx',
        ]);
        Coach::create([
            'coach_nomina' => 'L00000005',
            'coach_nombre' => 'Juan Manuel Rivas Vázquez',
            'coach_correo' => 'jmrivas@tec.mx',
        ]);
        Coach::create([
            'coach_nomina' => 'L00000006',
            'coach_nombre' => 'Hernán David Fernández Barboza',
            'coach_correo' => 'hernan.fernandez@tec.mx',
        ]);
    }
}
