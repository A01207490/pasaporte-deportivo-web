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
        //User::truncate();
        $adminRole = Role::where('name', 'admin')->first();
        $studentRole = Role::where('name', 'student')->first();
        $userRole = Role::where('name', 'user')->first();
        $tenis = Clase::where('clase_nombre', 'Tenis')->first();
        $atletismo = Clase::where('clase_nombre', 'Atletismo')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
        ]);

        $student = User::create([
            'name' => 'Student',
            'email' => 'student@student.com',
            'password' => bcrypt('student'),
            'semestre' => 1,
            'carrera_id' => 1
        ]);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user')
        ]);

        $admin->roles()->attach($adminRole);
        $student->roles()->attach($studentRole);
        $user->roles()->attach($userRole);
        $student->clases()->attach($tenis);
        $student->clases()->attach($atletismo);
        $student->clases()->attach($atletismo);
        $student->clases()->attach($atletismo);
        $student->clases()->attach($atletismo);
        $student->clases()->attach($atletismo);
    }
}
