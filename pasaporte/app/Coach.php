<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Coach extends Model
{
    use Sortable;

    protected $guarded = [];

    public $sortable = [
        'coach_nombre', 'coach_correo', 'coach_nomina',
    ];

    public function path()
    {
        return route('coaches.show', $this);
    }

    public function clases()
    {
        return $this->hasMany(Clase::class);
    }

    static public function getCoachExport()
    {
        return Coach::selectRaw('coach_nombre, coach_nomina, coach_correo')->orderBy('coach_nombre', 'asc')->get();
    }
}
