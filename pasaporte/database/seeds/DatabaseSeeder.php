<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CarreraSeeder::class);
        $this->call(DiaSeeder::class);
        $this->call(CoachSeeder::class);
        $this->call(ClaseSeeder::class);
        $this->call(UserSeeder::class);
    }
}
