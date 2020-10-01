<?php

use App\Dia;
use Illuminate\Database\Seeder;

class DiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Dia::truncate();
        Dia::create(['dia_nombre' => 'Lunes', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Dia::create(['dia_nombre' => 'Martes', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Dia::create(['dia_nombre' => 'Miércoles', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Dia::create(['dia_nombre' => 'Jueves', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Dia::create(['dia_nombre' => 'Viernes', 'created_at' => NOW(), 'updated_at' => NOW()]);
    }
}
