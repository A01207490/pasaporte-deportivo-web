<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $guarded = [];

    public function coach()
    {
        return $this->belongsTo(Coach::class);
    }

    public function dias()
    {
        return $this->belongsToMany(Dia::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();;
    }
    /*
    public function sesions()
    {
        return $this->belongsToMany(Sesion::class);
    }
    */

    static public function getCurrentClasses()
    {
        return Clase::where('role_id', 2)
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('carreras', 'users.carrera_id', '=', 'carreras.id')
            ->join('roles', 'role_user.role_id', '=', 'roles.id')
            ->select('users.id', 'roles.name', 'users.name', 'users.email', 'users.semestre', 'carreras.carrera_nombre');
    }
}
