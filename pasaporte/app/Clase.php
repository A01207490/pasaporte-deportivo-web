<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    use Sortable;
    protected $guarded = [];

    public $sortable = [
        'clase_nombre', 'clase_hora_inicio', 'clase_hora_fin',
    ];

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
        $minutes_tolerance = 120; //Minutos de toleracia en minutos.
        return DB::select(DB::raw("select * from clases c inner join clase_dia cd on cd.clase_id = c.id where dayofweek(current_date()) = dia_id and current_time between date_sub(clase_hora_fin, interval " . $minutes_tolerance . " minute) and date_add(clase_hora_fin, interval " . $minutes_tolerance . " minute)"));
    }

    static public function getAllClasses()
    {
        return DB::select(DB::raw("select clase_nombre, coach_nombre, clase_hora_inicio, clase_hora_fin, GROUP_CONCAT( dia_nombre separator ', ') as 'dias' FROM clases ca, coaches co, clase_dia cd, dias d where ca.coach_id = co.id and ca.id = cd.clase_id and cd.dia_id = d.id group by clase_nombre, coach_nombre, clase_hora_inicio, clase_hora_fin"));
    }
}
