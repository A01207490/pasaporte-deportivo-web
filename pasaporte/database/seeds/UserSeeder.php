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
        $adminRole = Role::where('name', 'admin')->first();
        $studentRole = Role::where('name', 'student')->first();
        $tenis = Clase::where('clase_nombre', 'Tenis')->first();
        $atletismo = Clase::where('clase_nombre', 'Atletismo')->first();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        $student1 = User::create([
            'name' => 'student1',
            'email' => 'A00000000@itesm.mx',
            'password' => bcrypt('student1'),
            'semestre' => 1,
            'carrera_id' => 1
        ]);

        $student2 = User::create([
            'name' => 'student2',
            'email' => 'A00000001@itesm.mx',
            'password' => bcrypt('student2'),
            'semestre' => 2,
            'carrera_id' => 2
        ]);

        $admin->roles()->attach($adminRole);
        $student1->roles()->attach($studentRole);
        $student1->clases()->attach($tenis);
        $student1->clases()->attach($atletismo);

        $admin->roles()->attach($adminRole);
        $student2->roles()->attach($studentRole);
        $student2->clases()->attach($tenis);
        $student2->clases()->attach($atletismo);
    }
}
