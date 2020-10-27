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
            'coach_nomina' => 'L00000000',
            'coach_nombre' => 'Luis Eduardo Maravilla Chávez',
            'coach_correo' => 'lmaravil@tec.mx',
        ]);
        Coach::create([
            'coach_nomina' => 'L00000001',
            'coach_nombre' => 'Luis Adrián Landeros Domínguez',
            'coach_correo' => 'a.landeros.d@tec.mx',
        ]);
    }
}
