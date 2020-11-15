<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $guarded = [];
    protected $table = 'clase_user';
    /*
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    */
    /*
    public function clase()
    {
        return $this->belongsTo(Clase::class);
    }
    */

    static public function getSession(User $user)
    {
        return Sesion::where('user_id', $user->id)->join('clases', 'clase_user.clase_id', '=', 'clases.id')->join('users', 'clase_user.user_id', '=', 'users.id')->join('coaches', 'clases.coach_id', '=', 'coaches.id')->selectRaw('clase_user.id, clase_user.created_at fecha_registro, users.name, users.email, clases.clase_nombre, date_format(clase_hora_inicio, "%h:%i %p") as clase_hora_inicio, date_format(clase_hora_fin, "%h:%i %p") as clase_hora_fin, coaches.coach_nombre, coaches.coach_nomina, coaches.coach_correo');
    }

    static public function getAllSesions()
    {
        return Sesion::join('clases', 'clase_user.clase_id', '=', 'clases.id')
            ->join('users', 'clase_user.user_id', '=', 'users.id')
            ->join('coaches', 'clases.coach_id', '=', 'coaches.id')
            ->select('clase_user.created_at', 'users.name', 'users.email', 'clases.clase_nombre', 'clases.clase_hora_inicio', 'clases.clase_hora_fin', 'coaches.coach_nombre', 'coaches.coach_nomina', 'coaches.coach_correo');
    }
}
