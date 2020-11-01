<?php

namespace App;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{
    use Sortable;
    public $sortable = [
        'anuncio_titulo', 'created_at', 'clase_hora_fin',
    ];
    protected $guarded = [];
}
