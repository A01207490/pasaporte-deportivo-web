<?php

use App\Role;
use App\User;

$adminRole = Role::where('name', 'admin')->first();
//Defina el nombre de usuario, su correo electrónico y contraseña.
$nombre_de_usuario = "Nombre";
$correo = "correo@tec.mx";
$contrasena = "password ";
$admin = User::create([
    'name' => $nombre_de_usuario,
    'email' => $correo,
    'password' => $contrasena,
]);
$admin->roles()->attach($adminRole);
echo "El usuario: \nNombre: " . $admin->name . "\nCorreo: " .  $admin->email . "\nContraseña: " .  $admin->email . "\n¡Se creo exitosamente!";
