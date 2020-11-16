<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
        return Sesion::where('user_id', $user->id)->join('clases', 'clase_user.clase_id', '=', 'clases.id')->join('users', 'clase_user.user_id', '=', 'users.id')->join('coaches', 'clases.coach_id', '=', 'coaches.id')->selectRaw('clase_user.id, clase_user.created_at fecha_registro, users.name, users.email, clases.clase_nombre, date_format(clase_hora_inicio, "%h:%i %p") as clase_hora_inicio, date_format(clase_hora_fin, "%h:%i %p") as clase_hora_fin, coaches.coach_nombre, coaches.coach_nomina, coaches.coach_correo')->orderBy('clase_user.created_at', 'desc');
    }

    static public function getAllSesions()
    {
        return Sesion::join('clases', 'clase_user.clase_id', '=', 'clases.id')
            ->join('users', 'clase_user.user_id', '=', 'users.id')
            ->join('coaches', 'clases.coach_id', '=', 'coaches.id')
            ->select('clase_user.created_at', 'users.name', 'users.email', 'clases.clase_nombre', 'clases.clase_hora_inicio', 'clases.clase_hora_fin', 'coaches.coach_nombre', 'coaches.coach_nomina', 'coaches.coach_correo');
    }

    static public function getSesionExport()
    {
        return Sesion::join('clases', 'clase_user.clase_id', '=', 'clases.id')
            ->join('users', 'clase_user.user_id', '=', 'users.id')
            ->join('coaches', 'clases.coach_id', '=', 'coaches.id')
            ->selectRaw('date_format(clase_user.created_at, "%d-%M-%y") fecha_registro, users.name, users.email, clases.clase_nombre, date_format(clase_hora_inicio, "%h:%i %p"), date_format(clase_hora_fin, "%h:%i %p"), coaches.coach_nombre, coaches.coach_nomina, coaches.coach_correo');
    }

    static public function getSessionClassCount(String $clase_nombre, int $user_id)
    {
        $sessions_count = DB::select(DB::raw("
        select count(*) sessions_count
        from clase_user cu
        inner join clases c on c.id = cu.clase_id
        where user_id = " . $user_id . "
        and clase_nombre = '" . $clase_nombre . "'"));
        return $sessions_count[0]->sessions_count;
    }
}
