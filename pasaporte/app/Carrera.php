<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use Sortable;
    protected $guarded = [];

    public $sortable = [
        'carrera_nombre',
    ];


    public function users()
    {
        return $this->hasMany(User::class);
    }
}
