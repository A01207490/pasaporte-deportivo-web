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

    static public function getAnnouncement()
    {
        return Anuncio::selectRaw('id, anuncio_titulo, anuncio_cuerpo, created_at fecha_registro')->orderBy('anuncios.created_at', 'desc');
    }

    static public function getAnnouncementExport()
    {
        return Anuncio::selectRaw('anuncio_titulo, anuncio_cuerpo, date_format(created_at, "%d-%M-%y") fecha_registro')->orderBy('anuncios.created_at', 'desc')->get();
    }
}
