<?php

use App\Clase;
use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'Administrador')->first();
        $studentRole = Role::where('name', 'Alumno')->first();
        $tenis = Clase::where('clase_nombre', 'Tenis')->first();
        $atletismo = Clase::where('clase_nombre', 'Atletismo')->first();
        $natacion = Clase::where('clase_nombre', 'Natación')->first();
        $futbol = Clase::where('clase_nombre', 'Futbol')->first();
        $gimnasio = Clase::where('clase_nombre', 'Gimnasio')->first();
        $baloncesto = Clase::where('clase_nombre', 'Baloncesto')->first();

        $admin1 = User::create([
            'name' => 'Pablo Gómez Pérez',
            'email' => 'pgomezp@tec.mx',
            'password' => bcrypt('pgomezp'),
            'semestre' => "N/A",
            'carrera_id' => 47
        ]);

        $admin2 = User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'semestre' => "N/A",
            'carrera_id' => 47
        ]);

        $student1 = User::create([
            'name' => 'student1',
            'email' => '1',
            'password' => bcrypt('1'),
            'semestre' => 1,
            'carrera_id' => 1
        ]);

        $student2 = User::create([
            'name' => 'student2',
            'email' => 'A00000002@itesm.mx',
            'password' => bcrypt('student2'),
            'semestre' => 2,
            'carrera_id' => 2
        ]);

        $student3 = User::create([
            'name' => 'student3',
            'email' => 'A00000003@itesm.mx',
            'password' => bcrypt('student2'),
            'semestre' => 3,
            'carrera_id' => 3
        ]);

        $student4 = User::create([
            'name' => 'student4',
            'email' => 'A00000004@itesm.mx',
            'password' => bcrypt('student4'),
            'semestre' => 4,
            'carrera_id' => 4
        ]);

        $student5 = User::create([
            'name' => 'student5',
            'email' => 'A00000005@itesm.mx',
            'password' => bcrypt('student5'),
            'semestre' => 5,
            'carrera_id' => 5
        ]);

        $student6 = User::create([
            'name' => 'student6',
            'email' => 'A00000006@itesm.mx',
            'password' => bcrypt('student6'),
            'semestre' => 6,
            'carrera_id' => 6
        ]);

        $admin1->roles()->attach($adminRole);
        $admin2->roles()->attach($adminRole);
        $student1->roles()->attach($studentRole);
        $student1->clases()->attach($tenis);
        $student1->clases()->attach($atletismo);
        $student1->clases()->attach($natacion);
        $student1->clases()->attach($baloncesto);
        $student1->clases()->attach($gimnasio);
        $student1->clases()->attach($futbol);

        $student2->roles()->attach($studentRole);
        $student2->clases()->attach($tenis);
        $student2->clases()->attach($atletismo);
        $student2->clases()->attach($natacion);
        $student2->clases()->attach($baloncesto);
        $student2->clases()->attach($gimnasio);
        $student2->clases()->attach($futbol);

        $student3->roles()->attach($studentRole);
        $student3->clases()->attach($tenis);
        $student3->clases()->attach($atletismo);
        $student3->clases()->attach($natacion);
        $student3->clases()->attach($baloncesto);
        $student3->clases()->attach($gimnasio);
        $student3->clases()->attach($futbol);

        $student4->roles()->attach($studentRole);
        $student4->clases()->attach($tenis);
        $student4->clases()->attach($atletismo);
        $student4->clases()->attach($natacion);
        $student4->clases()->attach($baloncesto);
        $student4->clases()->attach($gimnasio);
        $student4->clases()->attach($futbol);

        $student5->roles()->attach($studentRole);
        $student5->clases()->attach($tenis);
        $student5->clases()->attach($atletismo);
        $student5->clases()->attach($natacion);
        $student5->clases()->attach($baloncesto);
        $student5->clases()->attach($gimnasio);
        $student5->clases()->attach($futbol);

        $student6->roles()->attach($studentRole);
        $student6->clases()->attach($tenis);
        $student6->clases()->attach($atletismo);
        $student6->clases()->attach($natacion);
        $student6->clases()->attach($baloncesto);
        $student6->clases()->attach($gimnasio);
        $student6->clases()->attach($futbol);
    }
}
