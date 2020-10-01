<?php

use App\User;
use App\Carrera;
use Illuminate\Database\Seeder;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //User::truncate();
        //Carrera::truncate();
        Carrera::create(['carrera_nombre' => 'Arquitecto', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Licenciado en Urbanismo', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero Civil', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Licenciado en Economía', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Licenciado en Relaciones Internacionales', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Licenciado en Derecho', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Licenciado en Gobierno y Transformación Pública', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Licenciado en Comunicación', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Licenciado en Arte Digital', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Licenciado en Diseño', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero Civil', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero en Innovación y Desarrollo', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero Mecánico', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero en Electrónica', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero Industrial y de Sistemas', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero en Mecatrónica', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero en Robótica y Sistemas Digitales', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero en transformación digital de negocios', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero en biosistemas agroalimentarios', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero en Biotecnología', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero Químico', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero en Alimentos', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Ingeniero en Desarrollo Sustentable', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Bachelor in Global Business', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Licenciado en Finanzas', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Licenciado en Emprendimiento', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Licenciado en Estrategia y Transformación de Negocios', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Licenciado en Contaduría Pública y Finanzas', 'created_at' => NOW(), 'updated_at' => NOW()]);
        Carrera::create(['carrera_nombre' => 'Licenciado en Mercadotecnia', 'created_at' => NOW(), 'updated_at' => NOW()]);
    }
}
