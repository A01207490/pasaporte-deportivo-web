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

    static public function getClassCurrent()
    {
        $minutes_tolerance = 20;
        return DB::select(DB::raw("
        select c.id clase_id, coach_nombre, clase_nombre, clase_hora_inicio, clase_hora_fin
        from clases c 
        inner join coaches c2 on c2.id = c.coach_id
        where c.clase_nombre = 'Pista'
        union
        select c.id clase_id, coach_nombre, clase_nombre, clase_hora_inicio, clase_hora_fin
        from clases c 
        inner join coaches c2 on c2.id = c.coach_id
        where c.clase_nombre = 'Gimnasio'
        union
        (select clase_id, coach_nombre, clase_nombre, clase_hora_inicio, clase_hora_fin
        from clases c 
        inner join clase_dia cd on cd.clase_id = c.id 
        inner join coaches c2 on c2.id = c.coach_id 
        where dayofweek(current_date()) = dia_id 
        and current_time between date_sub(clase_hora_fin, interval " . $minutes_tolerance . " minute) 
        and date_add(clase_hora_fin, interval " . $minutes_tolerance . " minute)
        order by clase_nombre)"));
    }

    static public function getClass()
    {
        return DB::select(DB::raw("select clase_nombre, coach_nombre, date_format(clase_hora_inicio, '%h:%i %p') as clase_hora_inicio, date_format(clase_hora_fin, '%h:%i %p') as clase_hora_fin, GROUP_CONCAT(dia_nombre ORDER BY d.id ASC separator ', ') as 'dias' FROM clases ca, coaches co, clase_dia cd, dias d where ca.coach_id = co.id and ca.id = cd.clase_id and cd.dia_id = d.id group by clase_nombre, coach_nombre, clase_hora_inicio, clase_hora_fin"));
    }

    static public function getClassExport()
    {
        return Clase::select('clase_nombre')
            ->addSelect('coaches.coach_nombre as coach')
            ->join('coaches', 'coaches.id', '=', 'clases.coach_id')
            ->selectRaw('date_format(clase_hora_inicio, "%h:%i %p") as clase_hora_inicio, date_format(clase_hora_fin, "%h:%i %p") as clase_hora_fin, GROUP_CONCAT(dia_nombre ORDER BY dias.id ASC separator ", ") as "dias"')
            ->join('clase_dia', 'clase_dia.clase_id', '=', 'clases.id')
            ->join('dias', 'dias.id', '=', 'clase_dia.dia_id')
            ->groupByRaw('clase_nombre, coach_nombre, clase_hora_inicio, clase_hora_fin')->get();
    }

    static public function getClassOptgroup()
    {
        return DB::select(DB::raw("select distinct clase_nombre from clases order by clase_nombre"));
    }
}
