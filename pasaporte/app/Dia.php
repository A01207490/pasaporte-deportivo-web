<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dia extends Model
{
    public function clases()
    {
        return $this->belongsToMany(Clase::class);
    }
}
